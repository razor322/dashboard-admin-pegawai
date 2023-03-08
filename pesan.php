<?php
$pesan = isset($_GET['msg']) ? $_GET['msg'] : '';
if ($pesan == 'ok') {
?>
    <div class="alert alert-success  alert-dismissible fade show" role="alert">
        <strong>Data berhasil Dimasukkan!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
$pesan = isset($_GET['msg']) ? $_GET['msg'] : '';
if ($pesan == 'ubah') {
?>
    <div class="alert alert-success  alert-dismissible fade show" role="alert">
        <strong>Data berhasil Diubah!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
$pesan = isset($_GET['msg']) ? $_GET['msg'] : '';
if ($pesan == 'hapus') {
?>
    <div class="alert alert-danger  alert-dismissible fade show" role="alert">
        <strong>Data berhasil Dihapus!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
$pesan = isset($_GET['msg']) ? $_GET['msg'] : '';
if ($pesan == 'gagal') {
?>
    <div class="alert alert-danger  alert-dismissible fade show" role="alert">
        <strong> Password Tidak Sesuai!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>