<?php

include 'koneksi.php';

$itungcust = mysqli_query($con, "SELECT count(id_pegawai) as peg FROM pegawai");
$itungcust2 = mysqli_fetch_assoc($itungcust);
$itungcust3 = $itungcust2['peg'];

$itungorder = mysqli_query($con, "SELECT count(job_id) as job FROM pekerjaan ");
$itungorder2 = mysqli_fetch_assoc($itungorder);
$itungorder3 = $itungorder2['job'];

$itungtrans = mysqli_query($con, "SELECT count(kantor_id) as kantor FROM kantor");
$itungtrans2 = mysqli_fetch_assoc($itungtrans);
$itungtrans3 = $itungtrans2['kantor'];

$lvl = ($_SESSION['level'] == 'admin') ? '' : 'hidden';
$lvl2 = ($_SESSION['level'] == 'user') ? '' : 'hidden';

?>


<div class="sales-report-area mt-5 mb-5">
    <div class="row">
        <div class="col-md-4">
            <div class="single-report mb-xs-30">
                <div class="s-report-inner pr--20 pt--30 mb-3">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="s-report-title d-flex justify-content-between">
                        <h4 class="header-title mb-0">Pegawai</h4>

                    </div>
                    <div class="d-flex justify-content-between pb-2">
                        <h2><?php echo $itungcust3 ?></h2>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="single-report mb-xs-30">
                <div class="s-report-inner pr--20 pt--30 mb-3">
                    <div class="icon"><i class="fa fa-briefcase"></i></div>
                    <div class="s-report-title d-flex justify-content-between">
                        <h4 class="header-title mb-0">Pekerjaan</h4>

                    </div>
                    <div class="d-flex justify-content-between pb-2">
                        <h2><?php echo $itungorder3 ?></h2>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="single-report">
                <div class="s-report-inner pr--20 pt--30 mb-3">
                    <div class="icon"><i class="fa fa-building"></i></div>
                    <div class="s-report-title d-flex justify-content-between">
                        <h4 class="header-title mb-0">Kantor</h4>

                    </div>
                    <div class="d-flex justify-content-between pb-2">
                        <h2><?php echo $itungtrans3 ?></h2>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row mt-5 mb-5">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-center">
                    <h2>Selamat Datang</h2>
                </div>
                <div class="market-status-table mt-4">
                    <!-- <?php echo $_SESSION['username'] ?> -->

                    Anda masuk sebagai <strong><?= ($_SESSION['level']) ?></strong>
                    <br>
                    <p <?= $lvl; ?>>Pada halaman admin, Anda dapat menambah, mengelola,
                        mengelola user dan admin</p>
                    <p <?= $lvl2; ?>>Pada halaman ini, Anda dapat melihat semua data yang ada pada database</p>
                </div>
            </div>
        </div>
    </div>
</div>