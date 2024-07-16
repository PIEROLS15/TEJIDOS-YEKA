let tblPendientes, tblFinalizado, tblProceso;

// Ver Modal Nuevo usuario
const myModal = new bootstrap.Modal(document.getElementById("modalPedidos"));

document.addEventListener("DOMContentLoaded", function () {
  //Cargar datos pendientes con Datatables
  tblPendientes = $("#tblPendientes").DataTable({
    ajax: {
      url: base_url + "pedidos/listarPedidos",
      dataSrc: "",
    },
    columns: [
      { data: "id_transaccion" },
      { data: "monto" },
      { data: "estado" },
      { data: "fecha" },
      { data: "email" },
      { data: "nombre" },
      { data: "apellido" },
      { data: "direccion" },
      { data: "accion" },
    ],
    language,
    dom,
    buttons,
  });

  tblFinalizado = $("#tblFinalizado").DataTable({
    ajax: {
      url: base_url + "pedidos/listarFinalizados",
      dataSrc: "",
    },
    columns: [
      { data: "id_transaccion" },
      { data: "monto" },
      { data: "estado" },
      { data: "fecha" },
      { data: "email_user" },
      { data: "nombre" },
      { data: "apellido" },
      { data: "direccion" },
      { data: "accion" },
    ],
    language,
    dom,
    buttons,
  });

  tblProceso = $("#tblProceso").DataTable({
    ajax: {
      url: base_url + "pedidos/listarProceso",
      dataSrc: "",
    },
    columns: [
      { data: "id_transaccion" },
      { data: "monto" },
      { data: "estado" },
      { data: "fecha" },
      { data: "email" },
      { data: "nombre" },
      { data: "apellido" },
      { data: "direccion" },
      { data: "accion" },
    ],
    language,
    dom,
    buttons,
  });
});

//Funcion para eliminar categorias en el admin
function cambiarProceso(idPedido, proceso) {
  Swal.fire({
    title: "Cambiar Estado",
    text: "¿Estas seguro de cambiar el estado?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, cambiar!",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "pedidos/update/" + idPedido + "/" + proceso;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          const res = JSON.parse(this.responseText);
          if (res.icono == "success") {
            tblPendientes.ajax.reload();
            tblFinalizado.ajax.reload();
            tblProceso.ajax.reload();
          }
          Swal.fire("Aviso", res.msg.toUpperCase(), res.icono);
        }
      };
      Swal.fire({
        title: "Pedido Actualizado!",
        text: "Pedido actualizado correctamente",
        icon: "success",
      });
    }
  });
}

function verPedido(idPedido) {
  const url = base_url + "clientes/verPedido/" + idPedido;
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
      myModal.show();
    }
  };
}
