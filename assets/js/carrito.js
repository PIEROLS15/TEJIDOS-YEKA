const btnAddDeseo = document.querySelectorAll(".btnAddDeseo");
const btnAddcarrito = document.querySelectorAll(".btnAddcarrito");
const btnDeseo = document.querySelector("#btnCantidadDeseo");
const btnCarrito = document.querySelector("#btnCantidadCarrito");
const verCarrito = document.querySelector("#verCarrito");
const tableListaCarrito = document.querySelector("#tableListaCarrito tbody");
// Ver carrito
const myModal = new bootstrap.Modal(document.getElementById("myModal"));

let listaDeseo = [],
  listaCarrito = [];

document.addEventListener("DOMContentLoaded", function () {
  if (localStorage.getItem("listaDeseo") != null) {
    listaDeseo = JSON.parse(localStorage.getItem("listaDeseo"));
  }
  if (localStorage.getItem("listaCarrito") != null) {
    listaCarrito = JSON.parse(localStorage.getItem("listaCarrito"));
  }

  for (let i = 0; i < btnAddDeseo.length; i++) {
    btnAddDeseo[i].addEventListener("click", function () {
      let idProducto = btnAddDeseo[i].getAttribute("prod");
      agregarDeseo(idProducto);
    });
  }
  for (let i = 0; i < btnAddcarrito.length; i++) {
    btnAddcarrito[i].addEventListener("click", function () {
      let idProducto = btnAddcarrito[i].getAttribute("prod");
      agregarCarrito(idProducto, 1);
    });
  }
  cantidadDeseo();
  cantidadCarrito();
  verCarrito.addEventListener("click", function () {
    getListaCarrito();
    myModal.show();
  });
});

// Para agregar productos a la lista de deseos
function agregarDeseo(idProducto) {
  if (localStorage.getItem("listaDeseo") == null) {
    listaDeseo = [];
  } else {
    listaDeseo = JSON.parse(localStorage.getItem("listaDeseo"));
    for (let i = 0; i < listaDeseo.length; i++) {
      if (listaDeseo[i]["idProducto"] == idProducto) {
        Swal.fire({
          title: "Aviso",
          text: "EL PRODUCTO YA ESTÁ EN TU LISTA DE DESEOS",
          icon: "warning",
        });
        return;
      }
    }
  }

  listaDeseo.push({
    idProducto: idProducto,
    cantidad: 1,
  });
  localStorage.setItem("listaDeseo", JSON.stringify(listaDeseo));
  Swal.fire({
    title: "Aviso",
    text: "PRODUCTO AGREGADO A LA LISTA DE DESEOS",
    icon: "success",
  });
  cantidadDeseo();
}

// Para obtener el número de cantidad en la lista de deseos
function cantidadDeseo() {
  let listas = JSON.parse(localStorage.getItem("listaDeseo"));
  if (listas != null) {
    btnDeseo.textContent = listas.length;
  } else {
    btnDeseo.textContent = 0;
  }
}

// Para agregar productos al carrito
function agregarCarrito(idProducto, cantidad, accion = false) {
  if (localStorage.getItem("listaCarrito") == null) {
    listaCarrito = [];
  } else {
    listaCarrito = JSON.parse(localStorage.getItem("listaCarrito"));
    for (let i = 0; i < listaCarrito.length; i++) {
      if (accion) {
        eliminarListaDeseo(idProducto);
      }
      if (listaCarrito[i]["idProducto"] == idProducto) {
        Swal.fire({
          title: "Aviso",
          text: "EL PRODUCTO YA ESTÁ AGREGADO",
          icon: "warning",
        });
        return;
      }
    }
  }

  listaCarrito.push({
    idProducto: idProducto,
    cantidad: cantidad,
  });
  localStorage.setItem("listaCarrito", JSON.stringify(listaCarrito));
  Swal.fire({
    title: "Aviso",
    text: "PRODUCTO AGREGADO AL CARRITO",
    icon: "success",
  });
  cantidadCarrito();
}

// Para obtener el número de cantidad en el carrito
function cantidadCarrito() {
  let listas = JSON.parse(localStorage.getItem("listaCarrito"));
  if (listas != null) {
    btnCarrito.textContent = listas.length;
  } else {
    btnCarrito.textContent = 0;
  }
}

//Ver carrito
function getListaCarrito() {
  const url = base_url + "principal/listaProductos";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(JSON.stringify(listaCarrito));
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      let html = "";
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
                  <td>${producto.subTotal}</td>
                  <td><button class="btn btn-danger btnDeletecart" type="button" prod="${
                    producto.id
                  }"><i class="fas fa-trash"></i></button>
                </tr>`;
      });
      tableListaCarrito.innerHTML = html;
      document.querySelector("#totalGeneral").textContent = "Total: " + res.total;
      btnEliminarCarrito();
    }
  };
}

//Funcion para eliminar producto del carrito
function btnEliminarCarrito() {
  let listaEliminar = document.querySelectorAll(".btnDeletecart");
  for (let i = 0; i < listaEliminar.length; i++) {
    listaEliminar[i].addEventListener("click", function () {
      let idProducto = listaEliminar[i].getAttribute("prod");
      eliminarListaCarrito(idProducto);
    });
  }
}

//Aviso de producto eliminado
function eliminarListaCarrito(idProducto) {
  for (let i = 0; i < listaCarrito.length; i++) {
    if (listaCarrito[i]["idProducto"] == idProducto) {
      listaCarrito.splice(i, 1);
    }
  }
  localStorage.setItem("listaCarrito", JSON.stringify(listaCarrito));
  getListaCarrito();
  cantidadCarrito();
  Swal.fire({
    title: "Aviso",
    text: "PRODUCTO ELIMINADO DEL CARRITO",
    icon: "success",
  });
}
