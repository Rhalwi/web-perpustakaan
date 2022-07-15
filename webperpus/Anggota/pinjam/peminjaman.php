<?php 
 session_start();
 if(!isset($_SESSION["Login"])){
     header("Location: ../../login.php");
 }
    require "func_pinjam.php";

    $id_anggota = $_SESSION["id_anggota"];

    $pinjam = query("SELECT * FROM pinjam WHERE id_anggota = '$id_anggota'");
   
  
   
?>
<html>
    <head>
        <title>Daftar Peminjaman</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body class="p-2" >
        <!-- header -->
        <section class="content-header">
            <h1><i class="fa fa-edit" style="color:green"> </i>  Daftar Peminjaman</h1>
            <ol class="breadcrumb">
			<li><a href="../dashboard.php"><button class="btn btn-danger"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</button></a></li>
		
            </ol>
        </section>
        
        <!-- aside bar -->
        <div class="bg-light p-3">
        <!-- tambah buku -->
          
            <form action="" method="post">
                <input type="text" name="keyword" placeholder="Masukkan kata kunci" autofocus autocomplete="off" >
                <button type="submit" name="cari">Cari</button>
            </form>
        <!-- tabel -->
            <table id="example1" class="table table-bordered table-striped table" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Pinjam</th>
                        <th>ID Anggota</th>
                        <th>Nama</th>
                        <th>Pinjam</th>
                        <th>Kembali</th>
                        <th>Status</th>
                        <th>Denda</th>
                    </tr>
                </thead>
                <?php $i = 1; ?>
                <?php foreach($pinjam as $isi) : ?>
                <tbody>
                       <tr>
                            <td><?= $isi["no_pinjam"] ?></td>
                            <td><?= $isi["id_anggota"] ?></td>
                            <td><?= $isi["nama"] ?></td>
                            <td><?= $isi["pinjam"] ?></td>
                            <td><?= $isi["kembali"] ?></td>
                            <td><?= $isi["status"] ?></td>
                            <td><?= $isi["denda"]  ?></td>
                            <td><a href="detail.php?id=<?= $isi['no_pinjam']; ?>" target="_blank">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-print"></i> Detail
                                    </button>
                                </a>
                            </td>
                        </tr>
                </tbody>
                <?php $i++; ?>
                <?php endforeach ?>
            </table>
        </div>
    </body>
</html>

