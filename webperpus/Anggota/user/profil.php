<?php
 session_start();
    if(!isset($_SESSION["Login"])){
        header("Location: ../../login.php");
    }
 require 'func_anggota.php' ;

 $id_anggota = $_SESSION["id_anggota"];

 $anggota = query("SELECT * FROM anggota WHERE id_anggota = '$id_anggota'")[0];
 if( isset($_POST["submit"]) ){

    

    // cek apakah berhasil diubah atau tidak
    if( edit($_POST) > 0){
        echo "
        <script>
        alert('data berhasil diubah');
        document.location.href = 'profil.php';
        </script>
        ";
    }else{
        echo "
        <script>
        alert('data gagal diubah');
        document.location.href = 'profil.php';
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
    <section class="content-header">
            <h1><i class="fa fa-edit" style="color:green"> </i> Profil</h1>
            <ol class="breadcrumb">
			<li><a href="../dashboard.php"><button class="btn btn-danger"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</button></a></li>
            </ol>
    </section>
    <form action="" method="post" enctype="multipart/form-data">
       
        <div class="m-5 p-3 bg-white">
            <input type="hidden" name="id_anggota" value="<?= $anggota["id_anggota"] ?>">
            <input type="hidden" name="fotoLama" value="<?= $anggota["foto"] ?>">

            <div class="pt-0 px-2 pb-2">
                <label for="nama">Nama Pengguna</label>
                <input type="text" class="form-control" placeholder="Nama Pengguna" name="nama" id="nama" value="<?= $anggota["nama"] ?>">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" id="tempat_lahir" value="<?= $anggota["tempat_lahir"] ?>">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" id="tanggal_lahir" value="<?= $anggota["tanggal_lahir"] ?>">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="username" name="username" id="username" value="<?= $anggota["username"] ?>">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="password">Password</label>
                <input type="text" class="form-control" placeholder="Password" name="password" id="password" value="<?= $anggota["password"] ?>">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="telepon">Telephone</label>
                <input type="text" class="form-control" placeholder="Telephone" name="telepon" id="telepon" value="<?= $anggota["telepon"] ?>">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="jenkel">Jenis Kelamin</label>
                <input type="text" class="form-control" placeholder="Jenis Kelamin" name="jenkel" id="jenkel" value="<?= $anggota["jenkel"] ?>">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" placeholder="E-mail" name="email" id="email" value="<?= $anggota["email"] ?>">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="foto">pas poto</label><br>
                <img src="../../gambar/potoAnggota/<?= $anggota['foto'] ?>" width="70"><br>
                <input type="file" class="form-control" placeholder="foto.jpg" name="foto" id="foto" >
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" name="alamat" id="alamat" value="<?= $anggota["alamat"] ?>">
            </div>
            <div>
                <button class="btn btn-outline-success" type="submit" name="submit">submit</button>
            </div>
        </div>
    </form>
    
</body>
</html>