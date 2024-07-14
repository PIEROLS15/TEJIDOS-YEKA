const tableLista = document.querySelector("#tableListaProductos tbody");
const tblPendientes = document.querySelector("#tblPendientes");

document.addEventListener("DOMContentLoaded", function () {
  if (tableLista) {
    getListaProductos();
  }
  //Cargar datos peidos pendientes con Datatables
  $("#tblPendientes").DataTable({
    ajax: {
      url: base_url + "clientes/listarPendientes",
      dataSrc: "",
    },
    columns: [
      { data: "id_transaccion" },
      { data: "monto" },
      { data: "fecha" },
      { data: "accion" },
    ],
    language,
    dom,
    buttons,
  });
});

function getListaProductos() {
  const url = base_url + "principal/listaProductos";
  const http = new XMLHttpRequest();

  // Preparar los datos a enviar (listaCarrito asume que está definido fuera de este fragmento de código)
  http.open("POST", url, true);
  http.setRequestHeader("Content-Type", "application/json");

  // Convertir listaCarrito a JSON y enviar la solicitud
  http.send(JSON.stringify(listaCarrito));

  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      let html = "";

      if (res.productos.length === 0) {
        html = `
          <tr>
            <td colspan='5' class='text-center empty-cart'>
              <div class="empty-cart-content">
              <br>
              <br>
                <i class="fas fa-shopping-cart" style="font-size: 80px; color: #ccc;"></i>
                <br>
                <br>
                <p>Tu carrito está vacío.</p>
              </div>
            </td>
          </tr>`;
      } else {
        // Construir el HTML para la tabla de productos
        res.productos.forEach((producto) => {
          html += `<tr>
                    <td>
                      <a href="${base_url}principal/detail/${producto.id}">
                        <img class="img-thumbnail rounded-circle" src="${producto.imagen}" alt="" width="80">
                      </a>
                    </td>
                    <td>${producto.nombre}</td>
                    <td><span class="badge bg-success">${res.moneda} ${producto.precio}</span></td>
                    <td>${producto.cantidad}</td>
                    <td>${producto.subTotal}</td>
                  </tr>`;
        });

        // Calcular el total en USD
        const totalPEN = res.totalPaypal; // Total en soles
        const tasaCambio = obtenerTasaDeCambio(); // Función para obtener la tasa de cambio actual (debes implementarla)

        // Convertir PEN a USD
        const totalUSD = totalPEN / tasaCambio;

        // Redondear el total a dos decimales
        const totalUSDFormatted = totalUSD.toFixed(2);

        // Actualizar el total a pagar mostrado solo soles
        document.querySelector("#totalProducto").textContent =
          "Total a pagar : " + res.moneda + " " + totalPEN.toFixed(2);
        // Actualizar el total a pagar mostrado con el dolar
        //document.querySelector("#totalProducto").textContent = "TOTAL A PAGAR: " + res.moneda + " " + totalPEN.toFixed(2) + " (USD " + totalUSDFormatted + ")";

        // Asociar eventos a los botones u otras acciones necesarias
        btnEliminarCarrito();
        botonPaypal(totalUSDFormatted); // Llama a la función para configurar el botón de PayPal con el total en USD
      }

      // Actualizar la tabla con los productos o mensaje de carrito vacío
      tableLista.innerHTML = html;
    }
  };
}

function botonPaypal(totalUSD) {
  // Configuración del botón de PayPal
  paypal
    .Buttons({
      createOrder: (data, actions) => {
        return actions.order.create({
          purchase_units: [
            {
              amount: {
                value: totalUSD, // Usar el valor en USD
              },
            },
          ],
        });
      },
      onApprove: (data, actions) => {
        return actions.order.capture().then(function (orderData) {
          registrarPedido(orderData);
        });
      },
    })
    .render("#paypal-button-container"); // Renderiza el botón de PayPal en el contenedor especificado
}

function registrarPedido(datos) {
  const url = base_url + "clientes/registrarPedido";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.setRequestHeader("Content-Type", "application/json");
  http.send(
    JSON.stringify({
      pedidos: datos,
      productos: listaCarrito,
    })
  );
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      Swal.fire({
        title: "Aviso",
        text: res.msg,
        icon: res.icono,
      });
      if (res.icono == "success") {
        localStorage.removeItem("listaCarrito");
        setTimeout(() => {
          window.location.reload();
        }, 2000);
      }
    }
  };
}

// Función ficticia para obtener la tasa de cambio PEN a USD
function obtenerTasaDeCambio() {
  // Debes implementar la lógica para obtener la tasa de cambio actualizada
  // Puedes hacer una solicitud a una API de conversión de moneda o utilizar datos de tu sistema
  // Este es solo un ejemplo
  const tasaCambio = 3.8; // Ejemplo: 1 PEN = 0.2632 USD
  return tasaCambio;
}

function verPedido(idPedido) {
  //Ver
  const mPedido = new bootstrap.Modal(document.getElementById("modalPedido"));
  const url = base_url + 'clientes/verPedido/' + idPedido;
  const http = new XMLHttpRequest();
  http.open('GET', url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      let html = "";
      res.productos.forEach((row) => {
        let subTotal = parseFloat(row.precio) * parseInt(row.cantidad);
        html += `<tr>
                  <td>${row.producto}</td>
                  <td><span class="badge bg-success">${
                    res.moneda + " " + row.precio
                  }</span></td>
                  <td>${row.cantidad}</td>
                  <td><span class="badge bg-success">${res.moneda + " " + subTotal}</span></td>
                </tr>`;
      });
      document.querySelector('#tablePedidos tbody').innerHTML = html;
      mPedido.show();
    }
  };
}
