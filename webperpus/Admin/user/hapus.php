<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("Location: ../../login.php");
}
require 'func_anggota.php';

$id_anggota = $_GET["id"];

// echo mysqli_affected_rows($conn);
if( hapus ($id_anggota ) > 0){
    echo "
        <script>
        alert('data berhasil dihapus');
        document.location.href = 'anggota.php';
        </script>
        ";
}else{
    echo "
        <script>
        alert('data gagal dihapus');
        document.location.href = 'anggota.php';
        </script>
        ";
}


?>