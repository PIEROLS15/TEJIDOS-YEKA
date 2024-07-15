const nuevo = document.querySelector("#nuevo_registro");
const frm = document.querySelector("#frmRegistro");
const titleModal = document.querySelector("#titleModal");
const btnAccion = document.querySelector("#btnAccion");
let tblCategorias;

// Ver Modal Nuevo usuario
const myModal = new bootstrap.Modal(document.getElementById("nuevoModal"));

document.addEventListener("DOMContentLoaded", function () {
  //Cargar datos pendientes con Datatables
  tblCategorias = $("#tblCategorias").DataTable({
    ajax: {
      url: base_url + "categorias/listar",
      dataSrc: "",
    },
    columns: [
      { data: "id" },
      { data: "categoria" },
      { data: "imagen" },
      { data: "accion" },
    ],
    language,
    dom,
    buttons,
  });

  //Modal para registrar nuevas categorias
  nuevo.addEventListener("click", function () {
    document.querySelector("#id").value = "";
    document.querySelector("#imagen_actual").value = "";
    document.querySelector("#imagen").value = "";
    titleModal.textContent = "NUEVA CATEGORIA";
    frm.reset();
    myModal.show();
  });

  //
  frm.addEventListener("submit", function (e) {
    e.preventDefault();
    let data = new FormData(this);
    const url = base_url + "categorias/registrar";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(data);
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        const res = JSON.parse(this.responseText);
        if (res.icono == "success") {
          myModal.hide();
          tblCategorias.ajax.reload();
          document.querySelector("#imagen").value = "";
        }
        Swal.fire("Aviso", res.msg.toUpperCase(), res.icono);
      }
    };
  });
});

//Funcion para eliminar categorias en el admin
function eliminarCat(idCat) {
  Swal.fire({
    title: "Eliminar Categoria",
    text: "¿Estas seguro de eliminar esta categoria?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "categorias/delete/" + idCat;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          const res = JSON.parse(this.responseText);
          if (res.icono == "success") {
            tblCategorias.ajax.reload();
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

//Funcion para editar categorias en el admin
function editCat(idCat) {
  const url = base_url + "categorias/edit/" + idCat;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      document.querySelector("#id").value = res.id;
      document.querySelector("#categoria").value = res.categoria;
      document.querySelector("#imagen_actual").value = res.imagen;
      btnAccion.textContent = "Actualizar";
      titleModal.textContent = "MODIFICAR CATEGORIA";
      myModal.show();
    }
  };
}
