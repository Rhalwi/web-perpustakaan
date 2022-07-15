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

function tambah($data){
    global $koneksi;

    $id_buku = htmlspecialchars($data["id_buku"]);
    $id_anggota = htmlspecialchars($data["id_anggota"]);
    $nama = htmlspecialchars($data["nama"]);
    $pinjam = htmlspecialchars( $data["pinjam"]);  
   
    // $kembali = strtotime("+7 day", strtotime($pinjam)); // +7 hari dari tgl peminjaman
    // $kembali = date('Y-m-d', $kembali);
    //     $tgl1 = strtotime($isi["pinjam"]); 
    //     $tgl2 = strtotime($isi["kembali"]);
        

    //                             $jarak = $tgl2 - $tgl1;
    //                             $hari = $jarak / 60 / 60 / 24;

    //                             $denda= $hari * 1000;
    //                             echo $denda;

        // $today = date('Y-m-d');
        // // untuk menghitung selisih hari terlambat
        // $t = date_create($kembali);
        // $n = date_create(date('Y-m-d'));
        // $terlambat = date_diff($t, $n);
        // $hari = $terlambat->format("%a");

        // $dikembalikan = date('Y-m-d',$terlambat)
   
        // menghitung denda
        // $denda = $hari * 1000;
       
    $query = "INSERT INTO pinjam
                VALUE
            ('', '$id_buku', '$id_anggota', '$nama', '$pinjam', '', 'dipinjam', '')
                ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapus($id){
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM pinjam WHERE no_pinjam= $id");
    return mysqli_affected_rows($koneksi);
}

function tanggal($id){
    global $koneksi ;
    
    $q = query("SELECT * FROM pinjam WHERE no_pinjam = '$id'")[0];
    
    $pinjam = $q['pinjam'];
    $kembali = strtotime("+7 day", strtotime($pinjam)); // +7 hari dari tgl peminjaman
    $kembali = strtotime(date('Y-m-d', $kembali));
    $today = date('Y-m-d');
    $kembalikan = strtotime(date('Y-m-d'));
    // $t = date_create($kembali);
    // $n = date_create(date('Y-m-d'));
    // $terlambat = date_diff($n, $t);
    // $hari = $terlambat->format("%a");

    //  // menghitung denda
    // $denda = $hari * 1000;
     
    // $tgl2 = strtotime($isi["kembali"]);

    $jarak = $kembalikan - $kembali;
    $hari = $jarak / 60 / 60 / 24;

    
    if($hari >0){
        $denda= $hari * 1000;
    }else{
        $denda = 0;
    }
    
    $query = "UPDATE pinjam SET
                kembali = '$today',
                status = 'kembali',
                denda = '$denda'
                
             WHERE no_pinjam = $id
                ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
    
//    $pinjam = $data["pinjam"];
//    $kembali =$data["kembali"];
   
//     $tgl1 = strtotime($pinjam); 
//     $tgl2 = strtotime($kembali);

//     $jarak = $tgl2 - $tgl1;
//     $hari = $jarak / 60 / 60 / 24;

//     $denda= $hari * 1000;
    // return mysqli_affected_rows($koneksi);
//  }





?>
