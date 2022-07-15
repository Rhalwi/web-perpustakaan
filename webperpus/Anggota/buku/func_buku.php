<?php 
$koneksi = mysqli_connect("localhost","root","","perpus");

function query($query){
    global $koneksi;

    $hasil = mysqli_query($koneksi, $query);
    $datas=[];
    while($data = mysqli_fetch_assoc($hasil)){
        $datas[] = $data;
    }
    return $datas;
}
function cari($keyword){
    $query = "SELECT * FROM buku
                    WHERE
                isbn LIKE '%$keyword%' OR
                judul LIKE '%$keyword%' OR
                penerbit LIKE '%$keyword%' OR
                tahun_buku LIKE '%$keyword%' OR
                tanggal_masuk LIKE '%$keyword%' 
                ";
    return query($query);
}

?>