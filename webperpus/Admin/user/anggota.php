<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("Location: ../../login.php");
}
require 'func_anggota.php' ;

$anggota = query("SELECT * FROM anggota");

if(isset($_POST["cari"])){
    $anggota = cari($_POST["keyword"]);
}
?>
<html>
    <head>
        <title>Daftar Anggota</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body class="p-2">
        <!-- header -->
        <section class="content-header">
            <h1><i class="fa fa-edit" style="color:green"> </i>  Daftar Data User</h1>
            <ol class="breadcrumb">
			<li><a href="../dashboard.php"><button class="btn btn-danger"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</button></a></li>
			<li class="active"><i class="fa fa-file-text"></i>&nbsp; Daftar Data User</li>
            </ol>
        </section>
        <!-- aside bar -->
        <div class="bg-light p-3">
        <!-- tambah anggota -->
            <div class="box-header with-border">
                <a href="tbhanggota.php"><button class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah User</button></a>
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
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Jenis kelamin</th>
                        <th>Telepon</th>
                        <th>Level</th>
                        <!-- <th>Tempat, Tanggal Lahir</th> -->
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <?php $i = 1; ?>
                <?php foreach($anggota as $angg) : ?>
                <tbody>
                
                    <tr>
                        <td><?= $i; ?></td>
                            <td><?= $angg["id_anggota"]; ?></td>
                            <td>
                                <img src="../../gambar/potoAnggota/<?= $angg["foto"]; ?>" alt="#" class="img-responsive" style="height:auto;width:100px;"/>
                                <i class="fa fa-user fa-3x" style="color:#333;"></i> 
                            </td>
                            <td><?= $angg["nama"]; ?></td>
                            <td><?= $angg["jenkel"]; ?></td>
                            <td><?= $angg["telepon"]; ?></td>
                            <td><?= $angg["level"]; ?></td>
                            
                            <td><?= $angg["alamat"]; ?></td>
                            <td style="width:20%;">
                                <a href="edit.php?id=<?= $angg['id_anggota']; ?>">
                                    <button class="btn btn-success">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                </a>
                                <a href="hapus.php?id=<?= $angg['id_anggota']; ?>" onclick = "return confirm('yakin?');">
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </a>
                                <a href="./id-card.php?id=<?= $angg['id_anggota']; ?>" target="_blank">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-print"></i> Cetak Kartu
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