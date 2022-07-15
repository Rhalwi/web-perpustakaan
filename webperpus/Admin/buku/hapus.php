<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("Location: ../../login.php");
}
require 'func_buku.php';

$id_buku= $_GET["id"];

// echo mysqli_affected_rows($conn);
if( hapus ($id_buku) > 0){
    echo "
        <script>
        alert('data berhasil dihapus');
        document.location.href = 'buku.php';
        </script>
        ";
}else{
    echo "
        <script>
        alert('data gagal dihapus');
        document.location.href = 'buku.php';
        </script>
        ";
}


?>