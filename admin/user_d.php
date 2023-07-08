
<?php
    include "koneksi.php";

    $id = $_GET['id_user'];

    $sql = mysqli_query($conn, 'DELETE FROM user WHERE id_user="'.$id.'" ');

if($sql) {
    echo "<script>window.alert('Data berhasil dihapus');window.location.href='user.php';</script>";
} else {
    echo "<script>window.alert('Gagal tuk Hapus');window.close();</script>";
}
?>
