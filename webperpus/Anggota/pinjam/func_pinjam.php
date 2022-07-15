<?php 

$koneksi = mysqli_connect("localhost", "root", "", "perpus");

function query($query){
    global $koneksi;

    $hasil = mysqli_query($koneksi, $query);
    $datas =[];
    while($data = mysqli_fetch_assoc($hasil)){
        $datas[] = $data;
    }
    
    return $datas;
}





?>
