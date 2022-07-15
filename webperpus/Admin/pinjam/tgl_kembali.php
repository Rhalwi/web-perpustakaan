<?php 
require 'func_pinjam.php';


$id= $_GET["id"];

if( tanggal($id) > 0){
    echo "
        <script>
        alert('buku telah dikembalikan');
        document.location.href = 'kembali.php';
        </script>
        ";
}else{
    echo "
        <script>
        alert('data gagal diproses');
        document.location.href = 'peminjaman.php';
        </script>
        ";
}
