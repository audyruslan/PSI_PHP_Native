<?php
session_start();
$title = "Proses Algoritma - Preference Selection Index (PSI)";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
require 'functions.php';


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Proses Preference Selection Index (PSI)</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Proses Preference Selection Index (PSI)</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Matriks X -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Matriks X</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>Pengalaman Kerja</th>
                                        <th>Pendidikan</th>
                                        <th>Usia</th>
                                        <th>Status Perkawinan</th>
                                        <th>Alamat</th>

                                    </tr>
                                </thead>
                                <?php
                                $b = 0;
                                $sql = "SELECT*FROM tb_penilaian ORDER BY stambuk ASC";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                ?>
                                        <tr>
                                            <td align="center"><?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td align="center"><?= $row[2] ?></td>
                                            <td align="center"><?= $row[3] ?></td>
                                            <td align="center"><?= $row[4] ?></td>
                                            <td align="center"><?= $row[5] ?></td>
                                            <td align="center"><?= $row[6] ?></td>
                                        </tr>
                                <?php }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Matriks Ternomalisasi -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Matriks Ternomalisasi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>Pengalaman Kerja</th>
                                        <th>Pendidikan</th>
                                        <th>Usia</th>
                                        <th>Status Perkawinan</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <?php
                                $b = 0;
                                $C1 = '';
                                $C2 = '';
                                $C3 = '';
                                $C4 = '';
                                $C5 = '';
                                
                                $A1 = null;
                                $A2 = null;
                                $A3 = null;
                                $A4 = null;
                                $A5 = null;

                                //Keuntungan (Benefit)
                                $sql = "SELECT*FROM tb_penilaian ORDER BY pengalaman_kerja DESC";
                                $hasil = $conn->query($sql);
                                $row = $hasil->fetch_row();
                                $C1 = $row[2];

                                $sql = "SELECT*FROM tb_penilaian ORDER BY pendidikan DESC";
                                $hasil = $conn->query($sql);
                                $row = $hasil->fetch_row();
                                $C2 = $row[3];

                                $sql = "SELECT*FROM tb_penilaian ORDER BY usia DESC";
                                $hasil = $conn->query($sql);
                                $row = $hasil->fetch_row();
                                $C3 = $row[4];

                                //Biaya (Cost)
                                $sql = "SELECT*FROM tb_penilaian ORDER BY status_perkawinan ASC";
                                $hasil = $conn->query($sql);
                                $row = $hasil->fetch_row();
                                $C4 = $row[5];

                                $sql = "SELECT*FROM tb_penilaian ORDER BY alamat ASC";
                                $hasil = $conn->query($sql);
                                $row = $hasil->fetch_row();
                                $C5 = $row[6];

                                $sql = "SELECT*FROM tb_penilaian";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                        $A1 += round($row[2] / $C1, 3);
                                        $A2 += round($row[3] / $C2, 3);
                                        $A3 += round($row[4] / $C3, 3);
                                        $A4 += round($C4 / $row[5], 3);
                                        $A5 += round($C5 / $row[6], 3);
                                ?>
                                        <tr>
                                            <td align="center"><?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td align="center"><?= round($row[2] / $C1, 3) ?></td>
                                            <td align="center"><?= round($row[3] / $C2, 3) ?></td>
                                            <td align="center"><?= round($row[4] / $C3, 3) ?></td>
                                            <td align="center"><?= round($C4 / $row[5], 3) ?></td>
                                            <td align="center"><?= round($C5 / $row[6], 3) ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center" colspan="2">Total</th>
                                            <th class="text-center"><?= $A1; ?></th>
                                            <th class="text-center"><?= $A2; ?></th>
                                            <th class="text-center"><?= $A3; ?></th>
                                            <th class="text-center"><?= $A4; ?></th>
                                            <th class="text-center"><?= $A5; ?></th>
                                        </tr>
                                    </tfoot>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Penentuan Nilai Rata-rata Kinerja -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Penentuan Nilai Rata-rata Kinerja</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <tbody>
                                    <?php 
                                        $sql = "SELECT*FROM tb_alternatif";
                                        $hasil = $conn->query($sql);
                                        $n = mysqli_num_rows($hasil);
                                    ?>
                                    <tr>
                                        <th class="text-center"><?= (1/$n)*$A1;  ?></th>
                                        <th class="text-center"><?= (1/$n)*$A2;  ?></th>
                                        <th class="text-center"><?= (1/$n)*$A3;  ?></th>
                                        <th class="text-center"><?= (1/$n)*$A4;  ?></th>
                                        <th class="text-center"><?= (1/$n)*$A5;  ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Penentuan Nilai Variasi Preferensi -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Penentuan Nilai Variasi Preferensi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>Pengalaman Kerja</th>
                                        <th>Pendidikan</th>
                                        <th>Usia</th>
                                        <th>Status Perkawinan</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <?php
                                $K1 = null;
                                $K2 = null;
                                $K3 = null;
                                $K4 = null;
                                $K5 = null;

                                $P1 = null;
                                $P2 = null;
                                $P3 = null;
                                $P4 = null;
                                $P5 = null;

                                $sql = "SELECT*FROM tb_penilaian";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {

                                        // Nilai Rata-rata Kinerja
                                        $K1 = (1/$n)*$A1;
                                        $K2 = (1/$n)*$A2;
                                        $K3 = (1/$n)*$A3;
                                        $K4 = (1/$n)*$A4;
                                        $K5 = (1/$n)*$A5;

                                        // Nilai Preferensi
                                        $P1 += round(pow(round($row[2] / $C1, 2) - $K1, 2), 3);
                                        $P2 += round(pow(round($row[3] / $C2, 2) - $K2, 2), 3);
                                        $P3 += round(pow(round($row[4] / $C3, 2) - $K3, 2), 3);
                                        $P4 += round(pow(round($C4 / $row[5], 2) - $K4, 2), 3);
                                        $P5 += round(pow(round($C5 / $row[6], 2) - $K5, 2), 3);
                                ?>
                                        <tr>
                                            <td align="center"><?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td align="center"><?= round(pow(round($row[2] / $C1, 2) - $K1, 2), 3) ?></td>
                                            <td align="center"><?= round(pow(round($row[3] / $C2, 2) - $K2, 2), 3) ?></td>
                                            <td align="center"><?= round(pow(round($row[4] / $C3, 2) - $K3, 2), 3) ?></td>
                                            <td align="center"><?= round(pow(round($C4 / $row[5], 2) - $K4, 2), 3) ?></td>
                                            <td align="center"><?= round(pow(round($C5 / $row[6], 2) - $K5, 2), 3) ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center" colspan="2">Total</th>
                                            <th class="text-center"><?= $P1; ?></th>
                                            <th class="text-center"><?= $P2; ?></th>
                                            <th class="text-center"><?= $P3; ?></th>
                                            <th class="text-center"><?= $P4; ?></th>
                                            <th class="text-center"><?= $P5; ?></th>
                                        </tr>
                                    </tfoot>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Penentuan Deviasi Nilai Preferensi -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Penentuan Deviasi Nilai Preferensi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <tbody>
                                    <?php 
                                        $sql = "SELECT*FROM tb_alternatif";
                                        $hasil = $conn->query($sql);
                                        $n = mysqli_num_rows($hasil);
                                    ?>
                                    <tr>
                                        <th class="text-center"><?= 1-$P1;  ?></th>
                                        <th class="text-center"><?= 1-$P2;  ?></th>
                                        <th class="text-center"><?= 1-$P3;  ?></th>
                                        <th class="text-center"><?= 1-$P4;  ?></th>
                                        <th class="text-center"><?= 1-$P5;  ?></th>
                                        <th class="text-center bg-warning"><?= $totDev = (1-$P1)+(1-$P2)+(1-$P3)+(1-$P4)+(1-$P5);  ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Penentuan Bobot Kriteria -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Penentuan Bobot Kriteria</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th class="text-center"><?= round((1-$P1)/$totDev, 3);  ?></th>
                                        <th class="text-center"><?= round((1-$P2)/$totDev, 3);  ?></th>
                                        <th class="text-center"><?= round((1-$P3)/$totDev, 3);  ?></th>
                                        <th class="text-center"><?= round((1-$P4)/$totDev, 3);  ?></th>
                                        <th class="text-center"><?= round((1-$P5)/$totDev, 3);  ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hitung PSI -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hitung PSI</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>Pengalaman Kerja</th>
                                        <th>Pendidikan</th>
                                        <th>Usia</th>
                                        <th>Status Perkawinan</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <?php
                                $b = 0;
                                $C1 = '';
                                $C2 = '';
                                $C3 = '';
                                $C4 = '';
                                $C5 = '';
                                
                                $A1 = null;
                                $A2 = null;
                                $A3 = null;
                                $A4 = null;
                                $A5 = null;

                                $B1 = null;
                                $B2 = null;
                                $B3 = null;
                                $B4 = null;
                                $B5 = null;

                                $B1 = round((1-$P1)/$totDev, 3);
                                $B2 = round((1-$P2)/$totDev, 3);
                                $B3 = round((1-$P3)/$totDev, 3);
                                $B4 = round((1-$P4)/$totDev, 3);
                                $B5 = round((1-$P5)/$totDev, 3);

                                //Keuntungan (Benefit)
                                $sql = "SELECT*FROM tb_penilaian ORDER BY pengalaman_kerja DESC";
                                $hasil = $conn->query($sql);
                                $row = $hasil->fetch_row();
                                $C1 = $row[2];

                                $sql = "SELECT*FROM tb_penilaian ORDER BY pendidikan DESC";
                                $hasil = $conn->query($sql);
                                $row = $hasil->fetch_row();
                                $C2 = $row[3];

                                $sql = "SELECT*FROM tb_penilaian ORDER BY usia DESC";
                                $hasil = $conn->query($sql);
                                $row = $hasil->fetch_row();
                                $C3 = $row[4];

                                //Biaya (Cost)
                                $sql = "SELECT*FROM tb_penilaian ORDER BY status_perkawinan ASC";
                                $hasil = $conn->query($sql);
                                $row = $hasil->fetch_row();
                                $C4 = $row[5];

                                $sql = "SELECT*FROM tb_penilaian ORDER BY alamat ASC";
                                $hasil = $conn->query($sql);
                                $row = $hasil->fetch_row();
                                $C5 = $row[6];

                                $sql = "SELECT*FROM tb_penilaian";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                ?>
                                        <tr>
                                            <td align="center"><?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td align="center"><?= round(round($row[2] / $C1, 3), 3) * $B1 ?></td>
                                            <td align="center"><?= round(round($row[3] / $C2, 3), 3) * $B2 ?></td>
                                            <td align="center"><?= round(round($row[4] / $C3, 3), 3) * $B3 ?></td>
                                            <td align="center"><?= round(round($C4 / $row[5], 3), 3) * $B4 ?></td>
                                            <td align="center"><?= round(round($C5 / $row[6], 3), 2) * $B5 ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Hitung Nilai PSI -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Nilai PSI</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>Nilai</th>

                                    </tr>
                                </thead>
                                <?php
                                $b = 0;
                                $nilai = null;
                                $nama = null;
                                $x = 0;

                                $sql = "truncate table tb_ranking";
                                $hasil = $conn->query($sql);

                                $sql = "SELECT*FROM tb_penilaian";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                        $nilai = round(round(round($row[2] / $C1, 3), 3) * $B1 +
                                            round(round($row[3] / $C2, 3), 3) * $B2 +
                                            round(round($row[4] / $C3, 3), 3) * $B3 +
                                            round(round($C4 / $row[5], 3), 3) * $B4 +
                                            round(round($C5 / $row[6], 3), 2) * $B5, 3);
                                        $nama = $row[1];
                                        $sql1 = "INSERT INTO tb_ranking(nama,nilai_akhir) values ('" . $nama . "','" . $nilai . "')";
                                        $hasil1 = $conn->query($sql1);
                                    }
                                }
                                $sql = "SELECT*FROM tb_ranking";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                ?>
                                        <tr>
                                            <td>&nbsp&nbsp <?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td><?= $row[2] ?></td>
                                        </tr>
                                <?php }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Perangkingan -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Perangkingan Alternatif</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Alternatif</th>
                                        <th class="text-center">Rangking</th>

                                    </tr>
                                </thead>
                                <?php
                                $b = 0;
                                $sql = "SELECT*FROM tb_ranking ORDER BY nilai_akhir DESC";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                ?>
                                        <tr>
                                            <td><?= $row[1] ?></td>
                                            <td class="text-center"><span><?php echo $b = $b + 1; ?></span></td>
                                        </tr>
                                <?php }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                <?php 
                    $sql = "SELECT*FROM tb_ranking ORDER BY nilai_akhir DESC";
                    $hasil = $conn->query($sql);
                    $data = $hasil->fetch_row();
                ?>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>

<?php
require 'layouts/footer.php';
?>