<?php
include 'koneksi.php';
$lvl = ($_SESSION['level'] == 'admin') ? '' : 'hidden';
/*  <?= $lvl; ?>*/


$mhs = mysqli_query($con, "SELECT * FROM  pekerjaan JOIN pegawai ON pekerjaan.job_id = pegawai.pekerjaan_id JOIN kantor ON pegawai.id_pegawai = kantor.kantor_id");


$page = isset($_GET['page']) ? $_GET['page'] : 'list';


switch ($page) {
    case 'list':
?>
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <?php
                include 'pesan.php';
                ?>
                <div class="card">

                    <div class="card-body">

                        <div class="d-sm-flex justify-content-between align-items-center">
                            <h2>Daftar Kota</h2>
                            <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2" <?= $lvl; ?>>Tambah Data</button>

                        </div>
                        <!-- <div class="market-status-table mt-4"> -->
                        <div class="data-tables datatable-dark">
                            <table id="dataTable3" class="display" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Kota</th>
                                        <th <?= $lvl; ?>>Aksi</th>
                                    </tr>
                                </thead>
                                <?php $i = 1 ?>
                                <?php
                                $mhs = mysqli_query($con, "SELECT * FROM kota");
                                foreach ($mhs as $row) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row['id']; ?></td>
                                        <td> <?= $row['nama_kota']; ?></td>
                                        <td <?= $lvl; ?>>
                                            <a href="index.php?p=kota&page=edit&id_edt=<?= $row["id"]; ?>" class="  btn btn-warning "><i class="ti-pencil"></i></a>
                                            <a href=" proses_kota.php?aksi=delete&id_hps=<?= $row["id"]; ?>" onclick="return confirm('Yakin hapus data ?');" class="btn btn-danger"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal input -->
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data</h4>
                    </div>
                    <div class="modal-body">
                        <form action="proses_kota.php?aksi=create" method="post">
                            <div class="mb-3">
                                <label class="form-label">Id </label>
                                <input type="text" class="form-control" name="id">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama </label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                <input type="reset" class="btn btn-secondary" name="reset" value="Reset">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal edit -->
    <?php
        break;
    case 'edit':
    ?>

        <div class="row mt-5 mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <?php
                            include 'koneksi.php';

                            $edit = mysqli_query($con, "SELECT * FROM kota WHERE id ='$_GET[id_edt]'");
                            $data = mysqli_fetch_array($edit);

                            ?>
                            <h2>Form Edit Kota</h2>
                        </div>
                        <form action="proses_kota.php?aksi=update" method="post">
                            <div class="mb-3">
                                <label class="form-label">Id </label>
                                <input type="text" class="form-control" name="id" value="<?= $data['id']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama </label>
                                <input type="text" class="form-control" name="nama" value="<?= $data['nama_kota']; ?>">
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                <input type="reset" class="btn btn-secondary" name="reset" value="Reset">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#dataTable3').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'print'
                    ]
                });
            });
        </script>
<?php
        break;
} ?>