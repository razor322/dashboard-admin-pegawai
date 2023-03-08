<?php
include 'koneksi.php';
if ($_GET['aksi'] == 'create') {
    //insert
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $alamat = $_POST['alamat'];
        $kode = $_POST['kode'];
        $kota = $_POST['kota'];


        //query
        $sql = mysqli_query($con, "INSERT INTO lokasi
                            VALUES ('$id','$alamat','$kode', '$kota')
                        ");
        if ($sql) {
            echo "
        <script>
            //document.location.href = 'index.php?p=lokasi&msg=ok';
            window.location = 'index.php?p=lokasi&msg=ok';
        </script>";
        } else {
            echo "
        <script>
            // alert('data gagal  disimpan !');
            window.location = 'index.php?p=lokasi&msg=gagal';
        </script>";
        }
    }
} elseif ($_GET['aksi'] == 'update') {
    //update
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $alamat = $_POST['alamat'];
        $kode = $_POST['kode'];
        $kota = $_POST['kota'];

        //query
        $sql = mysqli_query($con, "UPDATE  lokasi  SET
                id = '$id', 
                alamat = '$alamat',
                kode_pos = '$kode', 
                kota_id = '$kota'
                WHERE id = '$id'");


        if ($sql) {
            echo "
        <script>
             window.location = 'index.php?p=lokasi&msg=ubah';
        </script>";
        } else {
            echo "
        <script>
            //alert('Data Gagal Diubah!');
            window.location = 'index.php?p=lokasi&msg=gagal';
        </script>";
        }
    }
} elseif ($_GET['aksi'] == 'delete') {
    //delete


    $hapus = mysqli_query($con, "DELETE FROM lokasi WHERE id ='$_GET[id_hps]'");

    if ($hapus) {
        # code...
        echo "
            <script>
                document.location.href = 'index.php?p=lokasi&msg=hapus';
            </script>";
    }
}
