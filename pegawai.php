<?php
include 'koneksi.php';

$mhs = mysqli_query($con, "SELECT * FROM  pekerjaan JOIN pegawai ON pekerjaan.job_id = pegawai.pekerjaan_id JOIN kantor ON pegawai.id_pegawai = kantor.kantor_id");


$page = isset($_GET['page']) ? $_GET['page'] : 'list';
$lvl = ($_SESSION['level'] == 'admin') ? '' : 'hidden';

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
                            <h2>Daftar Pegawai</h2>
                            <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2" <?= $lvl; ?>>Tambah Data</button>

                        </div>
                        <!-- <div class="market-status-table mt-4"> -->
                        <div class="data-tables datatable-dark">
                            <table id="dataTable3" class="display" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Divisi</th>
                                        <th>Manager</th>
                                        <th>Kantor</th>
                                        <th <?= $lvl; ?>>Aksi</th>
                                    </tr>
                                </thead>
                                <?php $i = 1 ?>
                                <?php
                                $mhs = mysqli_query($con, "SELECT p.nama nama,j.job_nama job_nama,m.nama nama_manager,k.kantor_nama kantor_nama, p.id_pegawai id FROM  pegawai p LEFT JOIN pegawai m ON p.manager_id = m.id_pegawai JOIN pekerjaan j ON p.pekerjaan_id = j.job_id  JOIN kantor k ON p.kantor_id = k.kantor_id");
                                // $data_mhs = mysqli_fetch_array($mhs);
                                foreach ($mhs as $row) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td> <?= $row['job_nama']; ?></td>
                                        <td><?= $row['nama_manager']; ?></td>
                                        <td><?= $row['kantor_nama']; ?></td>
                                        <td <?= $lvl; ?>>
                                            <a href="index.php?p=pgw&page=edit&id_edt=<?= $row["id"]; ?>" class="  btn btn-warning "><i class="ti-pencil"></i></a>
                                            <a href=" proses_pegawai.php?aksi=delete&id_hps=<?= $row["id"]; ?>" onclick="return confirm('Yakin hapus data ?');" class="btn btn-danger"><i class="ti-trash"></i></a>
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
                        <form action="proses_pegawai.php?aksi=create" method="post">
                            <div class="mb-3">
                                <label class="form-label">Id </label>
                                <input type="text" class="form-control" name="id" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama </label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email </label>
                                <input type="email" class="form-control" name="email">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <div class="row g-2">
                                    <!-- tanggal -->
                                    <div class="col-md-4">
                                        <select name="tgl" id="" class="form-control">
                                            <option value="">DD</option>
                                            <?php
                                            for ($i = 1; $i < 32; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- bulan -->
                                    <div class="col-md-4">
                                        <select name="bln" id="" class="form-control">
                                            <option value="">MM</option>
                                            <?php
                                            $bulan = [1 => "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agus", "Sept", "Okt", "Nov", "Des"];
                                            foreach ($bulan as $key => $nmbulan) {
                                                echo "<option value=" . $key . "> $nmbulan </option>";
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <!-- tahun -->
                                    <div class="col-md-4">
                                        <select name="th" id="" class="form-control">
                                            <option value="">YYYY</option>
                                            <?php
                                            // for ($i = 2022; $i > 1975; $i--) {
                                            $i = 2022;
                                            while ($i >= 1975) {
                                                echo "<option value=$i> $i </option>";
                                                $i--;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jekel" id="jekel1" value="L" checked>
                                    <label class="form-check-label" for="jekel">
                                        Laki - Laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jekel" id="jekel1" value="P">
                                    <label class="form-check-label" for="jekel">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea rows="3" name="alamat" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Divisi </label>
                                <div class="col-md-12">
                                    <select name="divisi" id="" class="form-control form-control-lg">

                                        <option value="">--Pilih Divisi--</option>

                                        <?php
                                        $divisi = mysqli_query($con, "SELECT * FROM pekerjaan");
                                        while ($data_divisi = mysqli_fetch_array($divisi)) {
                                        ?>
                                            <option value="<?= $data_divisi['job_id']; ?>"><?= $data_divisi['job_nama']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Manager </label>
                                <div class="col-md-12">
                                    <select name="manager" id="" class="form-control form-control-lg">

                                        <option value="">--Pilih Manager--</option>

                                        <?php
                                        $manager = mysqli_query($con, "SELECT * FROM pegawai");
                                        while ($data_manager = mysqli_fetch_array($manager)) {
                                        ?>
                                            <option value="<?= $data_manager['id_pegawai']; ?>"><?= $data_manager['nama']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kantor </label>
                                <div class="col-md-12">
                                    <select name="kantor" id="" class="form-control form-control-lg">

                                        <option value="">--Pilih Kantor--</option>

                                        <?php
                                        $kantor = mysqli_query($con, "SELECT * FROM kantor");
                                        while ($data_kantor = mysqli_fetch_array($kantor)) {
                                        ?>
                                            <option value="<?= $data_kantor['kantor_id']; ?>"><?= $data_kantor['kantor_nama']; ?>
                                            </option>
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
        <div id="modalEdit<?php echo $row['id']; ?>" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data</h4>
                    </div>
                    <div class="modal-body">

                        <form action="proses_pegawai.php?aksi=create" method="post">
                            <div class="mb-3">
                                <label class="form-label">Id </label>
                                <input type="text" class="form-control" name="id" value="<?= $data['id_pegawai']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama </label>
                                <input type="text" class="form-control" name="nama" value="<?= $data['nama']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email </label>
                                <input type="email" class="form-control" name="email" value="<?= $data['email']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <div class="row g-2">
                                    <!-- tanggal -->
                                    <div class="col-md-4">
                                        <select name="tgl" id="" class="form-control">
                                            <option value="<?= $tgl_lahir[2] ?>"><?= $tgl_lahir[2] ?></option>
                                            <?php
                                            for ($i = 1; $i < 32; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- bulan -->
                                    <div class="col-md-4">
                                        <select name="bln" id="" class="form-control">
                                            <option value="<?= $tgl_lahir[1] ?>"><?= $tgl_lahir[1] ?></option>
                                            <?php
                                            $bulan = [1 => "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agus", "Sept", "Okt", "Nov", "Des"];
                                            foreach ($bulan as $key => $nmbulan) {
                                                echo "<option value=" . $key . "> $nmbulan </option>";
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <!-- tahun -->
                                    <div class="col-md-4">
                                        <select name="th" id="" class="form-control">
                                            <option value="<?= $tgl_lahir[0] ?>"><?= $tgl_lahir[0] ?></option>
                                            <?php
                                            // for ($i = 2022; $i > 1975; $i--) {
                                            $i = 2022;
                                            while ($i >= 1975) {
                                                echo "<option value=$i> $i </option>";
                                                $i--;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jekel" id="jekel1" value="L" <?php if ($data['jekel'] == 'L') echo 'checked' ?>>
                                    <label class="form-check-label" for="jekel">
                                        Laki - Laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jekel" id="jekel1" value="P" <?php if ($data['jekel'] == 'P') echo 'checked' ?>>
                                    <label class="form-check-label" for="jekel">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea rows="3" name="alamat" class="form-control"><?= $data['alamat']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Divisi </label>
                                <div class="col-md-12">
                                    <select name="divisi" id="" class="form-control">

                                        <option value="">--Pilih Divisi--</option>

                                        <?php
                                        $divisi = mysqli_query($con, "SELECT * FROM pekerjaan");
                                        while ($data_divisi = mysqli_fetch_array($divisi)) {
                                            $terpilih = ($data['pekerjaan_id'] == $data_divisi['job_id']) ? 'selected' : '';
                                        ?>
                                            <option value="<?= $data_divisi['job_id']; ?>" <?= $terpilih; ?>><?= $data_divisi['job_nama']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Manager </label>
                                <div class="col-md-12">
                                    <select name="manager" id="" class="form-control">

                                        <option value="">--Pilih Manager--</option>

                                        <?php
                                        $manager = mysqli_query($con, "SELECT * FROM pegawai");
                                        while ($data_manager = mysqli_fetch_array($manager)) {
                                            $terpilih = ($data['manager_id'] == $data_manager['nama']) ? 'selected' : '';
                                        ?>
                                            <option value="<?= $data_manager['id_pegawai']; ?>" <?= $terpilih; ?>><?= $data_manager['nama']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kantor </label>
                                <div class="col-md-12">
                                    <select name="kantor" id="" class="form-control">

                                        <option value="">--Pilih Kantor--</option>

                                        <?php
                                        $kantor = mysqli_query($con, "SELECT * FROM kantor");
                                        while ($data_kantor = mysqli_fetch_array($kantor)) {
                                            $terpilih = ($data['kantor_id'] == $data_kantor['kantor_id']) ? 'selected' : '';
                                        ?>
                                            <option value="<?= $data_kantor['kantor_id']; ?>"><?= $data_kantor['kantor_nama']; ?>
                                            </option>
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

                            $edit = mysqli_query($con, "SELECT * FROM pegawai WHERE id_pegawai='$_GET[id_edt]'");
                            $data = mysqli_fetch_array($edit);
                            $tgl_lahir = explode("-", $data['tgl_lahir']);

                            ?>
                            <h2>Form Edit Pegawai</h2>
                        </div>
                        <form action="proses_pegawai.php?aksi=update" method="post">
                            <div class="mb-3">
                                <label class="form-label">Id </label>
                                <input type="text" class="form-control" name="id" value="<?= $data['id_pegawai']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama </label>
                                <input type="text" class="form-control" name="nama" value="<?= $data['nama']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email </label>
                                <input type="email" class="form-control" name="email" value="<?= $data['email']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <div class="row g-2">
                                    <!-- tanggal -->
                                    <div class="col-md-4">
                                        <select name="tgl" id="" class="form-control">
                                            <option value="<?= $tgl_lahir[2] ?>"><?= $tgl_lahir[2] ?></option>
                                            <?php
                                            for ($i = 1; $i < 32; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- bulan -->
                                    <div class="col-md-4">
                                        <select name="bln" id="" class="form-control">
                                            <option value="<?= $tgl_lahir[1] ?>"><?= $tgl_lahir[1] ?></option>
                                            <?php
                                            $bulan = [1 => "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agus", "Sept", "Okt", "Nov", "Des"];
                                            foreach ($bulan as $key => $nmbulan) {
                                                echo "<option value=" . $key . "> $nmbulan </option>";
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <!-- tahun -->
                                    <div class="col-md-4">
                                        <select name="th" id="" class="form-control">
                                            <option value="<?= $tgl_lahir[0] ?>"><?= $tgl_lahir[0] ?></option>
                                            <?php
                                            // for ($i = 2022; $i > 1975; $i--) {
                                            $i = 2022;
                                            while ($i >= 1975) {
                                                echo "<option value=$i> $i </option>";
                                                $i--;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jekel" id="jekel1" value="L" <?php if ($data['jekel'] == 'L') echo 'checked' ?>>
                                    <label class="form-check-label" for="jekel">
                                        Laki - Laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jekel" id="jekel1" value="P" <?php if ($data['jekel'] == 'P') echo 'checked' ?>>
                                    <label class="form-check-label" for="jekel">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea rows="3" name="alamat" class="form-control"><?= $data['alamat']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Divisi </label>
                                <div class="col-md-12">
                                    <select name="divisi" id="" class="form-control form-control-lg">

                                        <option value="">--Pilih Divisi--</option>

                                        <?php
                                        $divisi = mysqli_query($con, "SELECT * FROM pekerjaan");
                                        while ($data_divisi = mysqli_fetch_array($divisi)) {
                                            $terpilih = ($data['pekerjaan_id'] == $data_divisi['job_id']) ? 'selected' : '';
                                        ?>
                                            <option value="<?= $data_divisi['job_id']; ?>" <?= $terpilih; ?>><?= $data_divisi['job_nama']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Manager </label>
                                <div class="col-md-12">
                                    <select name="manager" id="" class="form-control form-control-lg">

                                        <option value="">--Pilih Manager--</option>

                                        <?php
                                        $manager = mysqli_query($con, "SELECT * FROM pegawai");
                                        while ($data_manager = mysqli_fetch_array($manager)) {
                                            $terpilih = ($data['manager_id'] == $data_manager['id_pegawai']) ? 'selected' : '';
                                        ?>
                                            <option value="<?= $data_manager['id_pegawai']; ?>" <?= $terpilih; ?>><?= $data_manager['nama']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kantor </label>
                                <div class="col-md-12">
                                    <select name="kantor" id="" class="form-control form-control-lg">

                                        <option value="">--Pilih Kantor--</option>

                                        <?php
                                        $kantor = mysqli_query($con, "SELECT * FROM kantor");
                                        while ($data_kantor = mysqli_fetch_array($kantor)) {
                                            $terpilih = ($data['kantor_id'] == $data_kantor['kantor_id']) ? 'selected' : '';
                                        ?>
                                            <option value="<?= $data_kantor['kantor_id']; ?>" <?= $terpilih; ?>><?= $data_kantor['kantor_nama']; ?>
                                            </option>
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