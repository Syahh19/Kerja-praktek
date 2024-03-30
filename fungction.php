<?php 
session_start();
//koneksi
$conn =mysqli_connect('localhost','root','','kasir');

//login
if(isset($_POST['login'])){
    //variable
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password'");
    $hitung =mysqli_num_rows($check);

  // fungction.php
$result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password'");
if ($result) {
    $rowcount = mysqli_num_rows($result);
} else {
    die("Query gagal dijalankan: " . mysqli_error($conn));
}


    if($hitung>0){
        //berhasil login

        $_SESSION['login']= 'True';
        header('location:index.php');

    } else {
        //gagal login
        echo'
        <script>
        alert("Username atau password salah");
        window.location.href="login.php"
        </script>
        ';

    }
}

?>