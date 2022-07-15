<?php 
session_start();
if(!isset($_SESSION["Login"])){
    header("Location: ../../login.php");
}
 require 'func_buku.php' ;

 $id = $_GET["id"];

 $buku = query("SELECT * FROM buku WHERE id_buku = $id")[0];

if( isset($_POST["submit"]) ){

    // cek apakah berhasil diubah atau tidak
    if( edit($_POST) > 0){
        echo "
        <script>
        alert('data berhasil diubah');
        document.location.href = 'buku.php';
        </script>
        ";
    }else{
        echo "
        <script>
        alert('data gagal diubah');
        document.location.href = 'buku.php';
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
            <input type="hidden" name="id_buku" value="<?= $buku["id_buku"] ?>">
            <input type="hidden" name="sampulLama" value="<?= $buku["sampul"] ?>">

            <div class="pt-0 px-2 pb-2">
                <label for="sampul">Sampul</label><br>
                <img src="../../gambar/sampulBuku/<?= $buku['sampul'] ?>" width="70"><br>
                <input type="file" class="form-control" placeholder="Sampul" name="sampul" id="sampul" value="<?= $buku["sampul"] ?>">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" placeholder="ISBN" name="isbn" id="isbn" value="<?= $buku["isbn"] ?>">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" placeholder="Judul" name="judul" id="judul" value="<?= $buku["judul"] ?>">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="penerbit">Penerbit</label>
                <input type="text" class="form-control" placeholder="Penerbit" name="penerbit" id="penerbit" value="<?= $buku["penerbit"] ?>">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="tahun_buku">Tahun Buku</label>
                <input type="text" class="form-control" placeholder="Tahun Buku" name="tahun_buku" id="tahun_buku" value="<?= $buku["tahun_buku"] ?>">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="stok_buku">Stok Buku</label>
                <input type="text" class="form-control" placeholder="Stok Buku" name="stok_buku" id="stok_buku" value="<?= $buku["stok_buku"] ?>">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="dipinjam">Dipinjam</label>
                <input type="text" class="form-control" placeholder="Dipinjam" name="dipinjam" id="dipinjam" value="<?= $buku["dipinjam"] ?>">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="tanggal_masuk">Tanggal Masuk</label>
                <input type="text" class="form-control" placeholder="Tanggal Masuk" name="tanggal_masuk" id="tanggal_masuk" value="<?= $buku["tanggal_masuk"] ?>">
            </div>
            <div>
                <button class="btn btn-outline-success" type="submit" name="submit">submit</button>
            </div>
        </div>
    </form>
    
</body>
</html>