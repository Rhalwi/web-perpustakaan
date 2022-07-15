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

function tambah($data){
    global $koneksi;

    $isbn = htmlspecialchars($data["isbn"]);
    $judul = htmlspecialchars($data["judul"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $dipinjam = htmlspecialchars( $data["dipinjam"]);  
    $stok_buku = htmlspecialchars($data["stok_buku"]);
    $tahun_buku = htmlspecialchars( $data["tahun_buku"]);  
    $sampul = htmlspecialchars($data["sampul"]);
    $tanggal_masuk = htmlspecialchars( $data["tanggal_masuk"]);
    
    $sampul = upload();
    if(!$sampul){
        return false;
    }

    $query = "INSERT INTO buku
                VALUE
            ('','$sampul','$isbn','$judul','$penerbit','$tahun_buku','$stok_buku','$dipinjam','$tanggal_masuk',)
                ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function upload(){
    $namaFile = $_FILES['sampul']['name'];
    $ukuranFile = $_FILES['sampul']['size'];
    $error = $_FILES['sampul']['error'];
    $tmpName = $_FILES['sampul']['tmp_name'];
    if($error === 4 ){
        echo " <script>
        alert('pilih gambar terlebih dahulu');
        </script>
        ";
    }
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
                </script>
                ";
    }

    if($ukuranFile> 1000000){
        echo "<script>
                alert('ukuran lebih dari 1 MB!');
                </script>
                ";
        
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName,'../../gambar/sampulBuku/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id_buku){
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku= '$id_buku'");
    return mysqli_affected_rows($koneksi);
}

function edit($data){
    global $koneksi;

    $id_buku = $data["id_buku"];
    $isbn = htmlspecialchars($data["isbn"]);
    $judul = htmlspecialchars($data["judul"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $dipinjam = htmlspecialchars( $data["dipinjam"]);  
    $stok_buku = htmlspecialchars($data["stok_buku"]);
    $tahun_buku = htmlspecialchars( $data["tahun_buku"]);
    $sampulLama = htmlspecialchars($data["sampul"]);
    $tanggal_masuk = htmlspecialchars( $data["tanggal_masuk"]);
    
    if($_FILES['sampul']['error'] === 4){
        $sampul = $sampulLama;
    }else{
        $sampul = upload();
    }

    $query = "UPDATE buku SET
                sampul = '$sampul',
                isbn = '$isbn',
                judul = '$judul',
                penerbit = '$penerbit',
                tahun_buku = '$tahun_buku',
                stok_buku = '$stok_buku',
                dipinjam = '$dipinjam',
                tanggal_masuk = '$tanggal_masuk'
             WHERE id_buku = $id_buku
                ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
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