const btnRegister = document.querySelector("#btnRegister");
const btnLogin = document.querySelector("#btnLogin");
const frmLogin = document.querySelector("#frmLogin");
const frmRegister = document.querySelector("#frmRegister");
const registrarse = document.querySelector("#registrarse");
const login = document.querySelector("#login");

const nombreRegistro = document.querySelector("#nombreRegistro");
const correoRegistro = document.querySelector("#correoRegistro");
const claveRegistro = document.querySelector("#claveRegistro");

const correoLogin = document.querySelector("#correoLogin");
const claveLogin = document.querySelector("#claveLogin");

const inputBusqueda = document.querySelector("#inputModalSearch");

const modalLogin = new bootstrap.Modal(document.getElementById("modalLogin"));

document.addEventListener("DOMContentLoaded", function () {
  btnRegister.addEventListener("click", function () {
    frmLogin.classList.add("d-none");
    frmRegister.classList.remove("d-none");
  });
  btnLogin.addEventListener("click", function () {
    frmRegister.classList.add("d-none");
    frmLogin.classList.remove("d-none");
  });
  //Registro (obteniendo los datos ingresados)
  registrarse.addEventListener("click", function () {
    //Verifica que los campos no esten vacios
    if (
      nombreRegistro.value == "" ||
      correoRegistro.value == "" ||
      claveRegistro.value == ""
    ) {
      Swal.fire({
        title: "Aviso",
        text: "Todos los campos son requeridos",
        icon: "warning",
      });
    } else {
      let formData = new FormData();
      formData.append("nombre", nombreRegistro.value);
      formData.append("correo", correoRegistro.value);
      formData.append("clave", claveRegistro.value);
      const url = base_url + "clientes/registroDirecto";
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(formData);
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          Swal.fire({
            title: "Aviso",
            text: res.msg,
            icon: res.icono,
          });
          if (res.icono == "success") {
            setTimeout(() => {
              enviarCorreo(correoRegistro.value, res.token);
            }, 2000);
          }
        }
      };
    }
  });

  //Inicio de sesión
  login.addEventListener("click", function () {
    //Verifica que los campos no esten vacios
    if (correoLogin.value == "" || claveLogin.value == "") {
      Swal.fire({
        title: "Aviso",
        text: "Todos los campos son requeridos",
        icon: "warning",
      });
    } else {
      let formData = new FormData();
      formData.append("correoLogin", correoLogin.value);
      formData.append("claveLogin", claveLogin.value);
      const url = base_url + "clientes/loginDirecto";
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(formData);
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          Swal.fire({
            title: "Aviso",
            text: res.msg,
            icon: res.icono,
          });
          if (res.icono == "success") {
            setTimeout(() => {
              window.location.reload();
            }, 2000);
          }
        }
      };
    }
  });

  //Busqueda de productos
  inputBusqueda.addEventListener("keyup", function (e) {
    const url = base_url + "principal/busqueda/" + e.target.value;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        let html = "";
        res.forEach((producto) => {
          html += `<div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="${ base_url + 'principal/detail/'+ producto.id }">
                            <img src="${ producto.imagen }" class="card-img-top" alt="${ producto.nombre }">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">${res.moneda} ${ producto.precio }</li>
                            </ul>
                            <a href="${ base_url + 'principal/detail/'+ producto.id }" class="h2 text-decoration-none text-dark">${ producto.nombre }</a>
                            <p class="card-text">
                            ${ producto.descripcion }
                            </p>
                        </div>
                    </div>
                </div>`;
        });
        document.querySelector('#resultBusqueda').innerHTML = html;
      }
    };
  });
});

function enviarCorreo(correo, token) {
  let formData = new FormData();
  formData.append("token", token);
  formData.append("correo", correo);
  const url = base_url + "clientes/enviarCorreo";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(formData);
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      Swal.fire({
        title: "Aviso",
        text: res.msg,
        icon: res.icono,
      });
      if (res.icono == "success") {
        setTimeout(() => {
          window.location.reload();
        }, 2000);
      }
    }
  };
}

function abrirModalLogin() {
  myModal.hide();
  modalLogin.show();
}
