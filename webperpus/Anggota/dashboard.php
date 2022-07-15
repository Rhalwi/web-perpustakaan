<?php 
session_start();
if(!isset($_SESSION["Login"])){
    header("Location: ../../login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Perpustakaan Daerah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
</head>
<body class="">
    <!-- header -->
    <div class="bg-primary p-3">
        <h4>Perpustakaan Daerah</h4>
        <div class="box-header with-border p-2">
            <a href="../logout.php"><button class="btn btn-danger"><i class="fa fa-plus"> </i> Log Out</button></a>
        </div>
    </div>
    <!-- aside bar -->
    <!-- link -->
    <div>
        <div class="box-header with-border p-2">
            <a href="user/profil.php"><button class="btn btn-success"><i class="fa fa-plus"> </i> Profil saya</button></a>
            <a href="buku/buku.php"><button class="btn btn-success"><i class="fa fa-plus"> </i>Data Buku</button></a>
            <a href="pinjam/peminjaman.php"><button class="btn btn-success"><i class="fa fa-plus"> </i> Data Peminjaman</button></a>
            <a href="user/idcard.php"><button class="btn btn-success"><i class="fa fa-plus"> </i> Cetak Kartu</button></a>
        </div>
        
    </div>

</body>
</html>