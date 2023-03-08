<?php
include 'koneksi.php';
if ($_GET['aksi'] == 'create') {
    //insert
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $tgl_lahir = $_POST['th'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
        $jekel = $_POST['jekel'];
        $alamat = $_POST['alamat'];
        $pekerjaan = $_POST['divisi'];
        $manager = $_POST['manager'];
        $kantor = $_POST['kantor'];

        //query
        $sql = mysqli_query($con, "INSERT INTO pegawai
                            VALUES ('$id','$nama','$email', '$tgl_lahir','$jekel','$alamat','$pekerjaan','$manager','$kantor')
                        ");
        if ($sql) {
            echo "
        <script>
            //document.location.href = 'index.php?p=pgw&msg=ok';
            window.location = 'index.php?p=pgw&msg=ok';
        </script>";
        } else {
            echo "
        <script>
            // alert('data gagal  disimpan !');
            window.location = 'index.php?p=pgw&msg=gagal';
        </script>";
        }
    }
} elseif ($_GET['aksi'] == 'update') {
    //update
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $tgl_lahir = $_POST['th'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
        $jekel = $_POST['jekel'];
        $alamat = $_POST['alamat'];
        $pekerjaan = $_POST['divisi'];
        $manager = $_POST['manager'];
        $kantor = $_POST['kantor'];

        //query
        $sql = mysqli_query($con, "UPDATE  pegawai  SET
                id_pegawai = '$id', 
                nama = '$nama', 
                email = '$email',
                tgl_lahir = '$tgl_lahir', 
                jekel = '$jekel',
                alamat = '$alamat',
                pekerjaan_id = '$pekerjaan',
                manager_id = '$manager',
                kantor_id = '$kantor' 
                WHERE id_pegawai = '$id'");


        if ($sql) {
            echo "
        <script>
             window.location = 'index.php?p=pgw&msg=ubah';
        </script>";
        } else {
            echo "
        <script>
            //alert('Data Gagal Diubah!');
            window.location = 'index.php?p=pgw&msg=gagal';
        </script>";
        }
    }
} elseif ($_GET['aksi'] == 'delete') {
    //delete


    $hapus = mysqli_query($con, "DELETE FROM pegawai WHERE id_pegawai ='$_GET[id_hps]'");

    if ($hapus) {
        # code...
        echo "
            <script>
                document.location.href = 'index.php?p=pgw&msg=hapus';
            </script>";
    }
}
