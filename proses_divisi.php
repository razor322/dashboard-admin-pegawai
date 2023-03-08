<?php
include 'koneksi.php';
if ($_GET['aksi'] == 'create') {
    //insert
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $gaji = $_POST['gaji'];
        //query
        $sql = mysqli_query($con, "INSERT INTO pekerjaan
                            VALUES ('$id','$nama','$gaji')
                        ");
        if ($sql) {
            echo "
        <script>
            window.location = 'index.php?p=divisi&msg=ok';
        </script>";
        } else {
            echo "
        <script>
            // alert('data gagal  disimpan !');
            window.location = 'index.php?p=divisi&msg=gagal';
        </script>";
        }
    }
} elseif ($_GET['aksi'] == 'update') {
    //update
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $gaji = $_POST['gaji'];


        //query
        $sql = mysqli_query($con, "UPDATE pekerjaan  SET
                job_id = '$id', 
                job_nama = '$nama',
                job_gaji = '$gaji' 
                WHERE job_id = '$id'");


        if ($sql) {
            echo "
        <script>
             window.location = 'index.php?p=divisi&msg=ubah';
        </script>";
        } else {
            echo "
        <script>
            //alert('Data Gagal Diubah!');
            window.location = 'index.php?p=divisi&msg=gagal';
        </script>";
        }
    }
} elseif ($_GET['aksi'] == 'delete') {
    //delete


    $hapus = mysqli_query($con, "DELETE FROM pekerjaan WHERE job_id ='$_GET[id_hps]'");

    if ($hapus) {
        # code...
        echo "
            <script>
                document.location.href = 'index.php?p=divisi&msg=hapus';
            </script>";
    }
}
