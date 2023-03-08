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
                            <h2>Daftar Lokasi</h2>
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
                                        <th>Alamat</th>
                                        <th>Kode POS</th>
                                        <th <?= $lvl; ?>>Aksi</th>
                                    </tr>
                                </thead>
                                <?php $i = 1 ?>
                                <?php
                                $mhs = mysqli_query($con, "SELECT l.id id, nama_kota, alamat, kode_pos FROM lokasi l JOIN kota k ON l.kota_id = k.id ");
                                // $data_mhs = mysqli_fetch_array($mhs);
                                foreach ($mhs as $row) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row['id']; ?></td>
                                        <td> <?= $row['nama_kota']; ?></td>
                                        <td><?= $row['alamat']; ?></td>
                                        <td><?= $row['kode_pos']; ?></td>
                                        <td <?= $lvl; ?>>
                                            <a href="index.php?p=lokasi&page=edit&id_edt=<?= $row["id"]; ?>" class="  btn btn-warning "><i class="ti-pencil"></i></a>
                                            <a href=" proses_lokasi.php?aksi=delete&id_hps=<?= $row["id"]; ?>" onclick="return confirm('Yakin hapus data ?');" class="btn btn-danger"><i class="ti-trash"></i></a>
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
                        <form action="proses_lokasi.php?aksi=create" method="post">
                            <div class="mb-3">
                                <label class="form-label">Id </label>
                                <input type="text" class="form-control" name="id">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kode POS </label>
                                <input type="text" class="form-control" name="kode">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea rows="3" name="alamat" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kota </label>
                                <div class="col-md-12">
                                    <select name="kota" id="" class="form-control">

                                        <option value="">--Pilih Kota--</option>

                                        <?php
                                        $kota = mysqli_query($con, "SELECT * FROM kota");
                                        while ($data_kota = mysqli_fetch_array($kota)) {
                                        ?>
                                            <option value="<?= $data_kota['id']; ?>"><?= $data_kota['nama_kota']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
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

                            $edit = mysqli_query($con, "SELECT l.id id, nama_kota, alamat,kota_id, kode_pos FROM lokasi l JOIN kota k ON l.kota_id = k.id  WHERE l.id ='$_GET[id_edt]'");
                            $data = mysqli_fetch_array($edit);

                            ?>
                            <h2>Form Edit Lokasi</h2>
                        </div>
                        <form action="proses_lokasi.php?aksi=update" method="post">
                            <div class="mb-3">
                                <label class="form-label">Id </label>
                                <input type="text" class="form-control" name="id" value="<?= $data['id']; ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kota </label>
                                <div class="col-md-12">
                                    <select name="kota" id="" class="form-control form-control-lg">

                                        <option value="">--Pilih Kota--</option>

                                        <?php
                                        $kota = mysqli_query($con, "SELECT * FROM kota");
                                        while ($data_kota = mysqli_fetch_array($kota)) {
                                            $terpilih = ($data['kota_id'] == $data_kota['id']) ? 'selected' : '';
                                        ?>
                                            <option value="<?= $data_kota['id']; ?>" <?= $terpilih; ?>><?= $data_kota['nama_kota']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kode POS </label>
                                <input type="text" class="form-control" name="kode" value="<?= $data['kode_pos']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea rows="3" name="alamat" class="form-control"><?= $data['alamat']; ?></textarea>
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