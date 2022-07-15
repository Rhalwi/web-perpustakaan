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

    $nama = htmlspecialchars($data["nama"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $level = htmlspecialchars( $data["level"]);  
    $telepon = htmlspecialchars($data["telepon"]);
    $jenkel = htmlspecialchars( $data["jenkel"]);  
    $email = htmlspecialchars( $data["email"]);  
    $alamat = htmlspecialchars( $data["alamat"]);

    $foto = upload();
    if(!$foto){
        return false;
    }
   


    $query = "INSERT INTO anggota
                VALUE
            ('','$foto','$nama','$username','$password','$jenkel','$telepon','$level','$alamat','$tempat_lahir','$tanggal_lahir','$email')
                ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function upload(){
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];
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
    move_uploaded_file($tmpName,'../../gambar/potoAnggota/' . $namaFileBaru);

    return $namaFileBaru;
}


function hapus($id_anggota){
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota= $id_anggota");
    return mysqli_affected_rows($koneksi);
}

function edit($data){
    global $koneksi;

    $id_anggota = $data["id_anggota"];
    $nama = htmlspecialchars($data["nama"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $level = htmlspecialchars( $data["level"]);  
    $telepon = htmlspecialchars($data["telepon"]);
    $jenkel = htmlspecialchars( $data["jenkel"]);  
    $email = htmlspecialchars( $data["email"]);  
    $fotoLama = htmlspecialchars($data["foto"]);
    $alamat = htmlspecialchars( $data["alamat"]);  

    if($_FILES['foto']['error'] === 4){
        $foto = $fotoLama;
    }else{
        $foto = upload();
    }
    $query = "UPDATE anggota SET
                foto = '$foto',
                nama = '$nama',
                username = '$username',
                password = '$password',
                jenkel = '$jenkel',
                telepon = '$telepon',
                level = '$level',
                alamat = '$alamat',
                tempat_lahir = '$tempat_lahir',
                tanggal_lahir = '$tanggal_lahir',
                email = '$email'
             WHERE id_anggota = $id_anggota
                ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function cari($keyword){
    $query = "SELECT * FROM anggota
                    WHERE
                nama LIKE '%$keyword%' OR
                level LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%' OR
                tempat_lahir LIKE '%$keyword%' 
                ";
    return query($query);
}


?>