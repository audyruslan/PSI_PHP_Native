<?php
$title = "Administrator - Preference Selection Index (PSI)";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
require 'functions.php';
$sqlChart = mysqli_query($conn, "SELECT * FROM tb_ranking");
$totChart = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_ranking"));
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="callout callout-danger">
            <h5>
              <i class="fas fa-bullhorn"></i> Sistem Pendukung Keputusan dengan Metode Preference Selection Index (PSI)!
            </h5>

            <p>Sistem ini dapat membantu dalam menyeleksi dan memberikan pendukung terhadap suatu keputusan yang akan diambil, sistem ini juga bertujuan untuk menyediakan informasi, membimbing, memberikan prediksi serta mengarahkan kepada pengguna informasi agar dapat melakukan pengambilan keputusan dengan lebih baik.</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Tingakat Kepuasan Pelayanan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <table id="kepuasanTable" class="table table-bordered table-hover">
                      <thead class="text-center">
                          <tr>
                            <th>No.</th>
                            <th>Keterangan</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Administrasi</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Kenyamanan Pelayanan</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Fasilitas Pelayanan</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Kinerja Petugas</td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>Harga/Biaya</td>
                        </tr>
                      </tbody>
                  </table>
              </div>
          </div>
        </div>
        <div class="col-md-6">
          <!-- DONUT CHART -->
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Diagram Tingkat Kepuasan Pelayanan</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?php
require 'layouts/footer.php';
?>