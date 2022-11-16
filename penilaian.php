<?php
session_start();
$title = "Penilaian - Preference Selection Index (PSI)";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
require 'functions.php';

if (isset($_POST['simpan'])) {
    $stambuk = $_POST['stambuk'];
    $status_perkawinan = $_POST['status_perkawinan'];
    $Nama = '';
    $alamat = $_POST['alamat'];
    $pengalaman_kerja = $_POST['pengalaman_kerja'];
    $pendidikan = $_POST['pendidikan'];
    $usia = $_POST['usia'];
    if ($status_perkawinan == "") {
        echo "<script>
    alert('masih ada data yang kosong !');
    </script>";
    } else {
        $sql = "SELECT*FROM tb_penilaian WHERE stambuk='$stambuk'";
        $hasil = $conn->query($sql);
        if ($hasil->num_rows > 0) {
            $row = $hasil->fetch_row();
            echo "<script>
    alert('id $stambuk sudah ada !');
    </script>";
        } else {
            //get name
            $sql = "SELECT*FROM tb_alternatif WHERE stambuk='$stambuk'";
            $hasil = $conn->query($sql);
            $row = $hasil->fetch_row();
            $nama = $row[1];
            //insert name
            $sql = "INSERT INTO tb_penilaian(stambuk,nama,pengalaman_kerja,pendidikan,usia,status_perkawinan,alamat)
    values ('" . $stambuk . "','" . $nama . "','" . $pengalaman_kerja . "','" . $pendidikan . "','" . $usia . "',
      '" . $status_perkawinan . "','" . $alamat . "')";
            $hasil = $conn->query($sql);
            echo "<script>
    alert('berhasil di inputkan !');
    </script>";
        }
    }
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Penilaian</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Penilaian</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="stambuk">Stambuk</label>
                            <select class="form-control" name="stambuk" id="stambuk">
                                <option>--Silahkan Pilih--</option>
                                <?php
                                //load stambuk
                                $id = $_GET['id'];
                                $sql = "SELECT*FROM tb_alternatif";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                ?>
                                    <?php while ($row = mysqli_fetch_array($hasil)) :; {
                                        } ?>
                                        <option><?php echo $row[0]; ?></option>
                                    <?php endwhile; ?>
                            </select>
                        <?php } ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="pengalaman_kerja">Pengalaman Kerja</label>
                            <input type="text" class="form-control" name="pengalaman_kerja" id="pengalaman_kerja" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input type="text" class="form-control" name="pendidikan" id="pendidikan" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-4">
                    <div class="form-group">
                            <label for="usia">Usia</label>
                            <input type="text" class="form-control" name="usia" id="usia" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="status_perkawinan">Status Perkawinan</label>
                            <input type="text" class="form-control" name="status_perkawinan" id="status_perkawinan" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" autocomplete="off">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            </form>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Penilaian</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="dataMahasiswa" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Stambuk</th>
                                        <th>Nama Lengkap</th>
                                        <th>Pengalaman Kerja</th>
                                        <th>Pendidikan</th>
                                        <th>Usia</th>
                                        <th>Status Perkawinan</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                $sql = mysqli_query($conn, "SELECT * FROM tb_penilaian");
                                while ($row = mysqli_fetch_row($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row[0]; ?></td>
                                        <td><?= $row[1]; ?></td>
                                        <td><?= $row[2]; ?></td>
                                        <td><?= $row[3]; ?></td>
                                        <td><?= $row[4]; ?></td>
                                        <td><?= $row[5]; ?></td>
                                        <td><?= $row[6]; ?></td>
                                        <td>
                                            <a class=" btn btn-danger btn-sm hapus_penilaian" href="hapus_penilaian.php?stambuk=<?= $row[0]; ?>"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>

                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php
require 'layouts/footer.php';
?>