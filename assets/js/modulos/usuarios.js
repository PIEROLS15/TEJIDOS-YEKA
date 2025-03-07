const nuevo = document.querySelector("#nuevo_registro");
const frm = document.querySelector("#frmRegistro");
const titleModal = document.querySelector("#titleModal");
const btnAccion = document.querySelector("#btnAccion");
let tblUsuario;

// Ver Modal Nuevo usuario
const myModal = new bootstrap.Modal(document.getElementById("nuevoModal"));

document.addEventListener("DOMContentLoaded", function () {
  //Cargar datos pendientes con Datatables
  tblUsuario = $("#tblUsuarios").DataTable({
    ajax: {
      url: base_url + "usuarios/listar",
      dataSrc: "",
    },
    columns: [
      { data: "id" },
      { data: "nombre" },
      { data: "apellido" },
      { data: "correo" },
      { data: "perfil" },
      { data: "accion" },
    ],
    language,
    dom,
    buttons,
  });

  //Modal para registrar nuevos usuarios
  nuevo.addEventListener("click", function () {
    document.querySelector('#id').value = '';
    titleModal.textContent = 'NUEVO USUARIO';
    frm.reset();
    document.querySelector('#clave').removeAttribute('readonly');
    myModal.show();
  });

  //
  frm.addEventListener("submit", function (e) {
    e.preventDefault();
    let data = new FormData(this);
    const url = base_url + "usuarios/registrar";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(data);
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        const res = JSON.parse(this.responseText);
        if (res.icono == "success") {
          myModal.hide();
          tblUsuario.ajax.reload();
        }
        Swal.fire("Aviso", res.msg.toUpperCase(), res.icono);
      }
    };
  });
});

//Funcion para eliminar usuarios en el admin
function eliminarUser(idUser) {
  Swal.fire({
    title: "Eliminar Usuario",
    text: "¿Estas seguro de eliminar este usuario?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "usuarios/delete/" + idUser;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          const res = JSON.parse(this.responseText);
          if (res.icono == "success") {
            tblUsuario.ajax.reload();
          }
          Swal.fire("Aviso", res.msg.toUpperCase(), res.icono);
        }
      };
      Swal.fire({
        title: "Usuario Eliminado!",
        text: "El usuario se elimino correctamente",
        icon: "success",
      });
    }
  });
}

//Funcion para editar usuarios en el admin
function editUser(idUser) {
  const url = base_url + "usuarios/edit/" + idUser;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      document.querySelector('#id').value = res.id;
      document.querySelector('#nombre').value = res.nombre;
      document.querySelector('#apellido').value = res.apellido;
      document.querySelector('#correo').value = res.correo;
      document.querySelector('#clave').setAttribute('readonly', 'readonly');
      btnAccion.textContent = 'Actualizar';
      titleModal.textContent = 'MODIFICAR USUARIO';
      myModal.show();
    }
  };
}
