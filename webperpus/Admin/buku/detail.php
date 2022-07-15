<?php 
require 'func_buku.php';
$id = $_GET['id'];
$query= query("SELECT * FROM buku WHERE id_buku = '$id'")[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detail Buku</title>
</head>
<body>
    <form action="">
        <table>
            <tr>
                <td>ID Buku :</td>
                <td><?= $query['id_buku']; ?></td>
            </tr>
            <tr>
                <td>Sampul :</td>
                <td><img src="../../gambar/sampulBuku/<?= $query['sampul']; ?>" alt="" width="200"></td>
            </tr>
            <tr>
                <td>ISBN :</td>
                <td><?= $query['isbn']; ?></td>
            </tr>
            <tr>
                <td>Judul :</td>
                <td><?= $query['judul']; ?></td>
            </tr>
            <tr>
                <td>Penerbit :</td>
                <td><?= $query['penerbit']; ?></td>
            </tr>
            <tr>
                <td>Tahun Buku :</td>
                <td><?= $query['tahun_buku']; ?></td>
            </tr>
            <tr>
                <td>Stok Buku :</td>
                <td><?= $query['stok_buku']; ?></td>
            </tr>
            <tr>
                <td>Dipinjam :</td>
                <td><?= $query['dipinjam']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Masuk :</td>
                <td>Rp<?= $query['tanggal_masuk']; ?>,-</td>
            </tr>
        </table>
    </form>
    
</body>
</html>