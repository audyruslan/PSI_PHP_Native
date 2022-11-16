  <!-- /.content-wrapper -->
  <footer class="main-footer">
      <strong>Copyright &copy; <?= date("Y"); ?> <a href="https://instacode.epizy.com">InstaCode.epizy.com</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 0.1
      </div>
  </footer>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <!-- SwaetAlert2 -->
  <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>

  <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>
      <script>
          Swal.fire({
              title: '<?= $_SESSION['status'];  ?>',
              icon: '<?= $_SESSION['status_icon'];  ?>',
              text: '<?= $_SESSION['status_info'];  ?>'
          });
      </script>
  <?php
        unset($_SESSION['status']);
    }
    ?>

<script>
      // DataTable
      $(function() {
        // Tabel Alternatif
          $("#tableAlternatif").DataTable({
            "responsive": true,
            "autoWidth": false,
            "lengthChange": false,
            "language": {
              url: 'assets/json/id.json'
              }
          });

          // Tabel Penilaian
          $("#tablePenilaian").DataTable({
            "responsive": true,
            "autoWidth": false,
            "lengthChange": false,
            "language": {
              url: 'assets/json/id.json'
              }
          });
          
          // Tabel Matriks
          $("#tableMatriks").DataTable({
            "responsive": true,
            "autoWidth": false,
            "lengthChange": false,
            "paging": false,
            "searching": false,
            "info": false,
            "language": {
              url: 'assets/json/id.json'
              }
          });
          
          // Tabel Normalisasi
          $("#tableNormalisasi").DataTable({
            "responsive": true,
            "autoWidth": false,
            "lengthChange": false,
            "paging": false,
            "searching": false,
            "info": false,
            "language": {
              url: 'assets/json/id.json'
              }
          });

          // Tabel Preferensi
          $("#tablePreferensi").DataTable({
            "responsive": true,
            "autoWidth": false,
            "lengthChange": false,
            "paging": false,
            "searching": false,
            "info": false,
            "language": {
              url: 'assets/json/id.json'
              }
          });

          // Tabel PSI
          $("#tablePSI").DataTable({
            "responsive": true,
            "autoWidth": false,
            "lengthChange": false,
            "paging": false,
            "searching": false,
            "info": false,
            "language": {
              url: 'assets/json/id.json'
              }
          });
      });

      // Hapus Alternatif
      $(document).on('click', '.hapus_mhs', function(e) {

          e.preventDefault();
          var href = $(this).attr('href');

          Swal.fire({
              title: 'Apakah Anda Yakin?',
              text: "Data Alternatif!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus Data!'
          }).then((result) => {
              if (result.value) {
                  document.location.href = href;
              }

          })

      });

      // Hapus Penilaian
      $(document).on('click', '.hapus_penilaian', function(e) {

          e.preventDefault();
          var href = $(this).attr('href');

          Swal.fire({
              title: 'Apakah Anda Yakin?',
              text: "Data Penilaian!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus Data!'
          }).then((result) => {
              if (result.value) {
                  document.location.href = href;
              }

          })

      });

      // Hapus Bobot
      $(document).on('click', '.hapus_bobot', function(e) {

          e.preventDefault();
          var href = $(this).attr('href');

          Swal.fire({
              title: 'Apakah Anda Yakin?',
              text: "Data Bobot/Kriteria!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus Data!'
          }).then((result) => {
              if (result.value) {
                  document.location.href = href;
              }

          })

      });
  </script>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

       //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Administrasi',
          'Kenyamanan Pelayanan',
          'Fasilitast Pelayanan',
          'Kinerja Petugas',
          'Harga/Biaya',
      ],
      datasets: [
        {
          data: [<?php while($chart = mysqli_fetch_array($sqlChart)) { echo '"'.round($chart['nilai_akhir']/$totChart * 100, 2).'",'; } ?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

  })
</script>
  </body>

  </html>