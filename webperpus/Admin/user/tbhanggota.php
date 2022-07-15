<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("Location: ../../login.php");
}
 require 'func_anggota.php' ;

if( isset($_POST["submit"]) ){

    

    // cek apakah berhasil ditambahkan atau tidak
    if( tambah($_POST) > 0){
        echo "
        <script>
        alert('data berhasil ditambahkan');
        document.location.href = 'anggota.php';
        </script>
        ";
    }else{
        echo "
        <script>
        alert('data gagal ditambahkan');
        document.location.href = 'anggota.php';
        </script>
        ";
    }}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>TAMBAH ANGGOTA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
</head>
<body class="bg-success bg-opacity-25">
    <form action="" method="post" enctype="multipart/form-data">
       
        <div class="m-5 p-3 bg-white">
            
            <div class="pt-0 px-2 pb-2">
                <label for="nama">Nama Pengguna</label>
                <input type="text" class="form-control" placeholder="Nama Pengguna" name="nama" id="nama" autofocus>
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" id="tempat_lahir" autocomplete="off">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" id="tanggal_lahir">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="username" name="username" id="username" autocomplete="off">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="password">Password</label>
                <input type="text" class="form-control" placeholder="Password" name="password" id="password" autocomplete="off">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="level">Level</label>
                <input type="text" class="form-control" placeholder="Petugas atau Anggota" name="level" id="level" autocomplete="off">
                <!-- <input type="text" class="form-control" aria-label="Text input with dropdown button">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li class="dropdown-item" >Petugas</li>
                    <li class="dropdown-item" >anggota</li>
                    
                </ul> -->
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="telepon">Telephone</label>
                <input type="text" class="form-control" placeholder="Telephone" name="telepon" id="telepon" autocomplete="off">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="jenkel">Jenis Kelamin</label>
                <input type="text" class="form-control" placeholder="Jenis Kelamin" name="jenkel" id="jenkel" autocomplete="off">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" placeholder="E-mail" name="email" id="email" autocomplete="off">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="foto">pas poto</label>
                <input type="file" class="form-control" placeholder="foto.jpg" name="foto" id="foto">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" name="alamat" id="alamat">
            </div>
            <div>
                <button class="btn btn-outline-success" type="submit" name="submit">submit</button>
            </div>
        </div>
    </form>
    
</body>
</html>