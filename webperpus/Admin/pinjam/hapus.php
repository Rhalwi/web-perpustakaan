<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("Location: ../../login.php");
}
require 'func_pinjam.php';

$id= $_GET["id"];

// echo mysqli_affected_rows($conn);
if( hapus ($id) > 0){
    echo "
        <script>
        alert('data berhasil dihapus');
        document.location.href = 'peminjaman.php';
        </script>
        ";
}else{
    echo "
        <script>
        alert('data gagal dihapus');
        document.location.href = 'peminjaman.php';
        </script>
        ";
}


?>