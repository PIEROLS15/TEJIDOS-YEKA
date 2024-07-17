<?php headerAdmin($data); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?php echo $data['titulo'] ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><?php echo $data['title'] ?></li>
        </ol>
        <div class="row">
            <div class="col">
                <div class="card radius-10 border-start border-0 border-5 border-warning bg-gradient mb-4">
                    <div class="card-body shadow-sm">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Pedidos Pendientes</p>
                                <h4 class="my-1 text-warning"><?php echo $data['pendientes']['total']; ?></h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><span
                                    class="badge bg-gradient-warning p-3 rounded-circle d-flex align-items-center justify-content-center"><i
                                        class="fas fa-exclamation-circle text-white fa-2x"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10 border-start border-0 border-5 border-info bg-gradient mb-4">
                    <div class="card-body shadow-sm">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Pedidos en Proceso</p>
                                <h4 class="my-1 text-info"><?php echo $data['procesos']['total']; ?></h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><span
                                    class="badge bg-gradient-info p-3 rounded-circle d-flex align-items-center justify-content-center"><i
                                        class="fas fa-spinner text-white fa-2x"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10 border-start border-0 border-5 border-success bg-gradient mb-4">
                    <div class="card-body shadow-sm">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Pedidos Finalizados</p>
                                <h4 class="my-1 text-success"><?php echo $data['finalizados']['total']; ?></h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><span
                                    class="badge bg-gradient-success p-3 rounded-circle d-flex align-items-center justify-content-center"><i
                                        class="fas fa-check-circle text-white fa-2x"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10 border-start border-0  border-5 border-danger bg-gradient mb-4">
                    <div class="card-body shadow-sm">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary ">Total productos</p>
                                <h4 class="my-1 text-danger"><?php echo $data['productos']['total']; ?></h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><span
                                    class="badge bg-gradient-danger p-3 rounded-circle d-flex align-items-center justify-content-center"><i
                                        class="fas fa-check-circle text-white fa-2x"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-5">
                <div class="card shadow-sm mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">PEDIDOS</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                            Finalizados <span
                                class="badge bg-success roundend-pill fw-normal fs-6"><?php echo $data['finalizados']['total']; ?></span>
                        </li>
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                            Proceso <span
                                class="badge bg-info roundend-pill fw-normal fs-6"><?php echo $data['procesos']['total']; ?></span>
                        </li>
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                            Pendientes <span
                                class="badge bg-warning roundend-pill fw-normal fs-6"><?php echo $data['pendientes']['total']; ?></span>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="col-xl-6 col-lg-5">
                <div class="card shadow-sm mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">PRODUCTOS CON STOCK MINIMO</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-5">
                <div class="card shadow-sm mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">PRODUCTOS MAS VENDIDOS</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="topProductos"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <i class="fas fa-chart-area me-1"></i>
                        Area Chart Example
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Bar Chart Example
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php footerAdmin($data); ?>

<!-- scripts para pedido -->
<script>
// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Finalizados", "En Proceso", "Pendientes"],
    datasets: [{
      data: [<?php echo $data['finalizados']['total']; ?>, <?php echo $data['procesos']['total']; ?>, <?php echo $data['pendientes']['total']; ?>],
      backgroundColor: ['#198754', '#0dcaf0', '#ffc107'],
      hoverBackgroundColor: ['#0f5132', '#0072ff', '#ff9800'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
</script>

<!-- scripts para graficos -->
<script src="<?php echo BASE_URL . 'assets/js/Chart.min.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'assets/demo/chart-area-demo.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'assets/demo/chart-bar-demo.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'assets/demo/stock-minimo.js'; ?>"></script>