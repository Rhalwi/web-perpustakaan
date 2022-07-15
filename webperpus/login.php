<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "perpus");

if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id =$_COOKIE['id'];
    $key = $_COOKIE['key'];

    $hasil = mysqli_query($koneksi, "SELECT usename FROM anggota WHERE id_anggota = $id");
    $data = mysqli_fetch_assoc($hasil);

 if($key === hash('sha256', $row['username'])){
    $_SESSION['Login'] = true;
 }


}


if(isset($_SESSION["Login"])){

    if($_SESSION["level"]=="petugas"){
        header("Location: Admin/dashboard.php");
    }
    else{
        header("Location: Anggota/dashboard.php");
        }
    
}


if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];


    $query = "SELECT * FROM anggota WHERE username='$username' AND password ='$password'";
    

    $hasil = mysqli_query($koneksi, $query);
    

    if(mysqli_num_rows($hasil) === 1){
        $_SESSION["Login"]= true;
        $data = mysqli_fetch_assoc($hasil);

        if(isset($_POST['remember'])){
            $jam = 60 * 60;
            setcookie('id', $data['id_anggota'],time() + $jam);
            setcookie('key', hash('sha256', $data['username']),time() + $jam);
            setcookie('level', hash('sha256', $data['level']),time() + $jam);
        }
        

        $_SESSION["id_anggota"] = $data["id_anggota"];
        $_SESSION["nama"] = $data["nama"];
        $_SESSION["username"] = $data["username"];
        $_SESSION["password"] = $data["password"];
        $_SESSION["tempat_lahir"] = $data["tempat_lahir"];
        $_SESSION["tanggal_lahir"] = $data["tanggal_lahir"];
        $_SESSION["level"] =  $data["level"];  
        $_SESSION["telepon"] = $data["telepon"];
        $_SESSION["jenkel"] =  $data["jenkel"];  
        $_SESSION["email"] =  $data["email"];  
        $_SESSION["alamat"] =  $data["alamat"];
            

        if($data["level"]=="petugas"){
        header("Location: Admin/dashboard.php");
        }elseif($data["level"]=="anggota"){
        header("Location: Anggota/dashboard.php");
        }
       
    }

}
$error = true;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-success p-2 bg-opacity-25" >
    
    <div class="position-absolute top-50 start-50 translate-middle p-2 bg-light border">
    <div>
        <h3 class="card-title">SISTEM INFORMASI PERPUSTAKAAN</h3>
    </div>
    <form action="" method="post">
        <div class="p-2 bg-light border input-group flex-nowrap">
            <input type="text" class="form-control" placeholder="username" name="username" id="username">

            <input  type="password" class="form-control" placeholder="password" name="password" id="password">
        </div>
        <div >
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember Me</label>

            <button class="btn btn-outline-success" type="submit" name="login">Sign In</button>
        </div>
        
    </form>  

    </div>

   

</body>
</html>