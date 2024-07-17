const tableLista = document.querySelector("#tableListaDeseo tbody");
document.addEventListener("DOMContentLoaded", function () {
  getListaDeseo();
});

function getListaDeseo() {
  const url = base_url + "principal/listaProductos";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(JSON.stringify(listaDeseo));
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
                <i class="fas fa-heart-broken" style="font-size: 80px; color: red;"></i>
                <br>
                <br>
                <p>Tu lista de deseo esta vacía.</p>
              </div>
            </td>
          </tr>`;
      } else {
        res.productos.forEach((producto) => {
          html += `<tr>
                    <td>
                    <a href="${base_url}principal/detail/${producto.id}">
                    <img class="img-thumbnail rounded-circle" src="${base_url+
                      producto.imagen
                    }" alt="" width="80">
                    </a>
                    </td>
                    <td>${producto.nombre}</td>
                    <td><span class="badge bg-success">${
                      res.moneda + " " + producto.precio
                    }</span></td>
                    <td>${producto.cantidad}</td>
                    <td><button class="btn btn-danger btnEliminarDeseo" type="button" prod="${
                      producto.id
                    }"><i class="fas fa-trash"></i></button>
                    <button class="btn btn-success btnAddCart" type="button" prod="${
                      producto.id
                    }"><i class="fas fa-cart-plus"></i></button></td>
                  </tr>`;
        });
      }
      tableLista.innerHTML = html;
      btnEliminarDeseo();
      btnAgregarProducto();
    }
  };
}

//Funcion para eliminar producto de la lista de deseo
function btnEliminarDeseo() {
  let listaEliminar = document.querySelectorAll(".btnEliminarDeseo");
  for (let i = 0; i < listaEliminar.length; i++) {
    listaEliminar[i].addEventListener("click", function () {
      let idProducto = listaEliminar[i].getAttribute("prod");
      eliminarListaDeseo(idProducto);
    });
  }
}

//Aviso de producto eliminado
function eliminarListaDeseo(idProducto) {
  for (let i = 0; i < listaDeseo.length; i++) {
    if (listaDeseo[i]["idProducto"] == idProducto) {
      listaDeseo.splice(i, 1);
    }
  }
  localStorage.setItem("listaDeseo", JSON.stringify(listaDeseo));
  getListaDeseo();
  cantidadDeseo();
  Swal.fire({
    title: "Aviso",
    text: "PRODUCTO ELIMINADO DE TU LISTA",
    icon: "success",
  });
}

//Agregar productos al carrito desde la lista de deseo
function btnAgregarProducto() {
  let listaAgregar = document.querySelectorAll(".btnAddCart");
  for (let i = 0; i < listaAgregar.length; i++) {
    listaAgregar[i].addEventListener("click", function () {
      let idProducto = listaAgregar[i].getAttribute("prod");
      agregarCarrito(idProducto, 1, true);
    });
  }
}
