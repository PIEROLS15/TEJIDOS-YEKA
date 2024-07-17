productosMinimos();
topProductos();

function productosMinimos() {
  const url = base_url + "admin/productosMinimos";
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      let nombre = [];
      let cantidad = [];

      for (let i = 0; i < res.length; i++) {
        nombre.push(res[i]['nombre'])
        cantidad.push(res[i]['cantidad'])
      }

      var ctx = document.getElementById("myChart").getContext("2d");
      var myChart = new Chart(ctx, {
        type: "pie", // Tipo de gráfico circular en forma de pastel
        data: {
          labels: nombre,
          datasets: [
            {
              label: "Datos de ejemplo",
              data: cantidad, // Datos numéricos
              backgroundColor: ["#007bff", "#28a745", "#ffc107", "#dc3545"],
              borderWidth: 1,
            },
          ],
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: "top",
            },
            tooltip: {
              callbacks: {
                label: function (tooltipItem) {
                  return (
                    tooltipItem.label + ": " + tooltipItem.raw.toFixed(2) + "%"
                  );
                },
              },
            },
          },
        },
      });
    }
  };
}

function topProductos() {
  const url = base_url + "admin/topProductos";
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      let nombre = [];
      let cantidad = [];

      for (let i = 0; i < res.length; i++) {
        nombre.push(res[i]['producto'])
        cantidad.push(res[i]['total'])
      }

      var ctx = document.getElementById("topProductos").getContext("2d");
      var myChart = new Chart(ctx, {
        type: "pie", // Tipo de gráfico circular en forma de pastel
        data: {
          labels: nombre,
          datasets: [
            {
              label: "Datos de ejemplo",
              data: cantidad, // Datos numéricos
              backgroundColor: ["#6f42c1", "#fd7e14", "#17a2b8", "#343a40"],
              borderWidth: 1,
            },
          ],
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: "top",
            },
            tooltip: {
              callbacks: {
                label: function (tooltipItem) {
                  return (
                    tooltipItem.label + ": " + tooltipItem.raw.toFixed(2) + "%"
                  );
                },
              },
            },
          },
        },
      });
    }
  };
}