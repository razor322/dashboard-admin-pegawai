<?php
include 'koneksi.php';
if ($_GET['aksi'] == 'create') {
    //insert
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $manager = $_POST['manager'];
        $lokasi = $_POST['lokasi'];

        //query
        $sql = mysqli_query($con, "INSERT INTO kantor
                            VALUES ('$id','$nama','$manager','$lokasi')
                        ");
        if ($sql) {
            echo "
        <script>
            //document.location.href = 'index.php?p=mhs&msg=ok';
            window.location = 'index.php?p=kantor&msg=ok';
        </script>";
        } else {
            echo "
        <script>
            // alert('data gagal  disimpan !');
            window.location = 'index.php?p=kantor&msg=gagal';
        </script>";
        }
    }
} elseif ($_GET['aksi'] == 'update') {
    //update
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $manager = $_POST['manager'];
        $lokasi = $_POST['lokasi'];

        //query
        $sql = mysqli_query($con, "UPDATE  kantor  SET
                kantor_id = '$id', 
                kantor_nama = '$nama', 
                manager_id = '$manager',
                lokasi_id = '$lokasi'
                WHERE kantor_id = '$id'");


        if ($sql) {
            echo "
        <script>
             window.location = 'index.php?p=kantor&msg=ubah';
        </script>";
        } else {
            echo "
        <script>
            //alert('Data Gagal Diubah!');
            window.location = 'index.php?p=kantor&msg=gagal';
        </script>";
        }
    }
} elseif ($_GET['aksi'] == 'delete') {
    //delete


    $hapus = mysqli_query($con, "DELETE FROM kantor  WHERE kantor_id ='$_GET[id_hps]'");

    if ($hapus) {
        # code...
        echo "
            <script>
                document.location.href = 'index.php?p=kantor&msg=hapus';
            </script>";
    }
}
