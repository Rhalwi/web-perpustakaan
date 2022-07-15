<?php 
require 'func_pinjam.php';
$id = $_GET['id'];
$query= query("SELECT * FROM pinjam WHERE no_pinjam = '$id'")[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detail Peminjaman</title>
</head>
<body>
    <form action="">
        <table>
            <tr>
                <td>Nomor Pinjam :</td>
                <td><?= $query['no_pinjam']; ?></td>
            </tr>
            <tr>
                <td>Nama :</td>
                <td><?= $query['nama']; ?></td>
            </tr>
            <tr>
                <td>ID Anggota :</td>
                <td><?= $query['id_anggota']; ?></td>
            </tr>
            <tr>
                <td>ID Buku :</td>
                <td><?= $query['id_buku']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Peminjaman :</td>
                <td><?= $query['pinjam']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Kembali :</td>
                <td><?= $query['kembali']; ?></td>
            </tr>
            <tr>
                <td>Status :</td>
                <td><?= $query['status']; ?></td>
            </tr>
            <tr>
                <td>Denda :</td>
                <td>Rp<?= $query['denda']; ?>,-</td>
            </tr>
        </table>
    </form>
    
</body>
</html>