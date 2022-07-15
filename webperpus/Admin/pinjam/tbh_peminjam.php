<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("Location: ../../login.php");
}
 require "func_pinjam.php";

 if( isset($_POST["submit"]) ){

    // $pinjam = $_POST['pinjam'];
    // $tgl_kembali = strtotime("+7 day", strtotime($pinjam)); // +7 hari dari tgl peminjaman
    // $tgl_kembali = date('Y-m-d', $tgl_kembali);

   

    // cek apakah berhasil ditambahkan atau tidak
    if( tambah($_POST) > 0){
        echo "
        <script>
        alert('data berhasil ditambahkan');
        document.location.href = 'peminjaman.php';
        </script>
        ";
    }else{
        echo "
        <script>
        alert('data gagal ditambahkan');
        document.location.href = 'peminjaman.php';
        </script>
        ";
    }}
?>
<html lang="en">
<head>
    <title>TAMBAH PEMINJAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
</head>
<body class="bg-success bg-opacity-25">
    <form action="" method="post" >
       
        <div class="m-5 p-3 bg-white">
     
            <div class="pt-0 px-2 pb-2">
                <label for="id_buku">ID Buku</label>
                <input type="text" class="form-control" placeholder="id_buku" name="id_buku" id="id_buku">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="id_anggota">ID Anggota</label>
                <input type="text" class="form-control" placeholder="id_anggota" name="id_anggota" id="id_anggota">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="nama">Nama Anggota</label>
                <input type="text" class="form-control" placeholder="nama" name="nama" id="nama">
            </div>
            <div class="pt-0 px-2 pb-2">
                <label for="pinjam">Pinjam</label>
                <input type="date" class="form-control" placeholder="Pinjam" name="pinjam" id="pinjam">
            </div>
            <!-- <div class="pt-0 px-2 pb-2">
                <label for="kembali">Kembali</label>
                <input type="text" class="form-control" placeholder="kembali" name="kembali" id="kembali">
            </div> -->
            <!-- <div class="pt-0 px-2 pb-2">
                <label for="status">Status</label>
                <input type="text" class="form-control" placeholder="status" name="status" id="status">
            </div> -->
            <!-- <div class="pt-0 px-2 pb-2">
                <label for="denda">Denda</label>
                <input type="text" class="form-control" placeholder="denda" name="denda" id="denda">
            </div> -->
            <div>
                <button class="btn btn-outline-success" type="submit" name="submit">submit</button>
            </div>
        </div>
    </form>
    
</body>
</html>