<?php 
session_start();
if(!isset($_SESSION["Login"])){
    header("Location: ../../login.php");
}
require 'func_buku.php' ;

$bukus = query("SELECT * FROM buku");
if(isset($_POST["cari"])){
    $bukus= cari($_POST["keyword"]);
}
?>
<html>
    <head>
        <title>Daftar Buku</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body class="p-2" >
        <!-- header -->
        <section class="content-header">
            <h1><i class="fa fa-edit" style="color:green"> </i>  Daftar Buku</h1>
            <ol class="breadcrumb">
			<li><a href="../dashboard.php"><button class="btn btn-danger"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</button></a></li>
            </ol>
        </section>
        
        <!-- aside bar -->
        <div class="bg-light p-3">
        <!-- tambah buku -->
            <div class="box-header with-border">
                <a href="tbh_buku.php"><button class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah Buku</button></a>
            </div>
            <form action="" method="post">
                <input type="text" name="keyword" placeholder="Masukkan kata kunci" autofocus autocomplete="off" >
                <button type="submit" name="cari">Cari</button>
            </form>
        <!-- tabel -->
            <table id="example1" class="table table-bordered table-striped table" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Sampul</th>
                        <th>ISBN</th>
                        <th>Judul</th>
                        <th>Penerbit</th>
                        <th>Tahun Buku</th>
                        <th>Stok Buku</th>
                        <th>Dipinjam</th>
                        <th>Tanggal Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php $i = 1; ?>
                <?php foreach($bukus as $buku) : ?>
                <tbody>
                    <tr>
                        <td><?= $i; ?></td>
                            <td><?= $buku["id_buku"] ?></td>
                            <td>
                                <img src="../../gambar/sampulBuku/<?= $buku["sampul"] ?>" alt="#" class="img-responsive" style="height:auto;width:100px;"/>
                                <i class="fa fa-user fa-3x" style="color:#333;"></i> 
                            </td>
                            <td><?= $buku["isbn"] ?></td>
                            <td><?= $buku["judul"] ?></td>
                            <td><?= $buku["penerbit"] ?></td>
                            <td><?= $buku["tahun_buku"] ?></td>
                            <td><?= $buku["stok_buku"] ?></td>
                            <td><?= $buku["dipinjam"] ?></td>
                            <td><?= $buku["tanggal_masuk"] ?></td>
                            <td style="width:20%;">
                                <a href="edit.php?id=<?= $buku['id_buku']; ?>">
                                    <button class="btn btn-success">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                </a>
                                <a href="hapus.php?id=<?= $buku['id_buku']; ?>" onclick = "return confirm('yakin?');">
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </a>
                                <a href="detail.php?id=<?= $buku['id_buku']; ?>" target="_blank">
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