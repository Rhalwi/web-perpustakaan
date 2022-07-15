<?php 
    session_start();
    if(!isset($_SESSION["Login"])){
        header("Location: ../../login.php");
    }
    require "func_anggota.php";

    $id_anggota = $_SESSION["id_anggota"];

    $anggota = query("SELECT * FROM anggota WHERE id_anggota = '$id_anggota'")[0];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<div class="position-absolute top-50 start-50 translate-middle p-2 bg-light border">
    <div>
        <h3 class="card-title">SISTEM INFORMASI PERPUSTAKAAN</h3>
    </div>
   <table>
    <tr >
        <td rowspan="4" colspan="4" class="m-2 p-2" width="75%">
            
            
                NAMA            : <?= $anggota['nama'] ?> <br>
                NOMOR ANGGOTA   : <?= $anggota['id_anggota'] ?> <br>
                JENIS KELAMIN   : <?= $anggota['jenkel'] ?><br>
                NOMOR TELEPHONE : <?= $anggota['telepon'] ?><br>
                ALAMAT          : <?= $anggota['alamat'] ?>

            
        </td>
        <td colspan="" rowspan="2">
            <img src="../../gambar/potoAnggota/<?= $anggota["foto"]; ?>"  alt=""style="height:auto;width:100px;">
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            
        </td>
    </tr>
   </table>
</div> 

  
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script>
             $( document ).ready(function() {
                window.print();
                console.log( "ready!" );
                    });
            </script>
</body>
</html>