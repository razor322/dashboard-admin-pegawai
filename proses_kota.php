<?php
include 'koneksi.php';
if ($_GET['aksi'] == 'create') {
    //insert
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];

        //query
        $sql = mysqli_query($con, "INSERT INTO kota
                            VALUES ('$id','$nama')
                        ");
        if ($sql) {
            echo "
        <script>
            //document.location.href = 'index.php?p=kota&msg=ok';
            window.location = 'index.php?p=kota&msg=ok';
        </script>";
        } else {
            echo "
        <script>
            // alert('data gagal  disimpan !');
            window.location = 'index.php?p=kota&msg=gagal';
        </script>";
        }
    }
} elseif ($_GET['aksi'] == 'update') {
    //update
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];

        //query
        $sql = mysqli_query($con, "UPDATE  kota  SET
                id = '$id', 
                nama_kota = '$nama'  
                WHERE id = '$id'");


        if ($sql) {
            echo "
        <script>
             window.location = 'index.php?p=kota&msg=ubah';
        </script>";
        } else {
            echo "
        <script>
            //alert('Data Gagal Diubah!');
            window.location = 'index.php?p=kota&msg=gagal';
        </script>";
        }
    }
} elseif ($_GET['aksi'] == 'delete') {
    //delete


    $hapus = mysqli_query($con, "DELETE FROM kota WHERE id ='$_GET[id_hps]'");

    if ($hapus) {
        # code...
        echo "
            <script>
                document.location.href = 'index.php?p=kota&msg=hapus';
            </script>";
    }
}
