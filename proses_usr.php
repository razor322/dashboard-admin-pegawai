<?php
include 'koneksi.php';
if ($_GET['aksi'] == 'create') {
    //insert
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password1 = $_POST['pass1'];
        $level = $_POST['level'];


        $password = mysqli_real_escape_string($con, $_POST['pass1']);
        $password2 = mysqli_real_escape_string($con, $_POST['pass2']);

        if ($password !== $password2) {
            echo "
                                <script>                                    
                                    window.location = 'index.php?p=usr&msg=gagal';
                                </script>";
            return false;
        }
        $password1 = md5($password1);

        //query
        $sql = mysqli_query($con, "INSERT INTO user (username,password,level)
        VALUES ('$username','$password1','$level')");



        if ($sql) {
            echo "
            <script>
                window.location = 'index.php?p=usr&msg=ok';
            </script>";
        } else {
            echo "
            <script>
            window.location = 'index.php?p=usr&msg=gagal';
            </script>";
        }
    }
} elseif ($_GET['aksi'] == 'update') {
    //update
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $username = $_POST['nama'];
        $password1 = $_POST['pass1'];

        $edit = mysqli_query($con, "SELECT * FROM user WHERE id = '$id'");
        $data = mysqli_fetch_array($edit);
        if ($password1 == $data['password']) {
            $sql1 = mysqli_query($con, "UPDATE  user  SET 
            password = '$password1' WHERE id = '$id'");
        }

        $password = mysqli_real_escape_string($con, $_POST['pass1']);
        $password2 = mysqli_real_escape_string($con, $_POST['pass2']);

        if ($password !== $password2) {
            echo "
                                <script>      
                                    window.location = 'index.php?p=usr&msg=gagal';
                                </script>";
            return false;
        }
        $password1 = md5($password1);

        //query
        $sql = mysqli_query($con, "UPDATE  user  SET 
        username = '$username',
        password = '$password1' WHERE id = '$id'");

        if ($sql || $sql1) {
            echo "
            <script>
                window.location = 'index.php?p=usr&msg=ok';
            </script>";
        } else {
            echo "
            <script>
            window.location = 'index.php?p=usr&msg=gagal';
            </script>";
        }
    }
} elseif ($_GET['aksi'] == 'delete') {
    //delete


    $hapus = mysqli_query($con, "DELETE FROM user WHERE id ='$_GET[id_hps]'");

    if ($hapus) {
        echo "
        <script>
            document.location.href = 'index.php?p=usr&msg=hapus';
        </script>";
    }
}
