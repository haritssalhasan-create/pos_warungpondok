<?php

include '../koneksi.php';


if(isset($_GET['aksi'])){
    $aksi = $_GET['aksi'];
    if($aksi == "register"){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        register($con, $nama, $alamat, $no_hp, $username, $password);
    } elseif($aksi == "login"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        login($con, $username, $password);
    } elseif($aksi == "logout"){
        logout();
    }
}

function cekIdCustomer($con){
    $query = "select * from role where nama = 'Customer'";
    $result = $con->execute_query($query);
    $row = $result->fetch_assoc();
    return $row['id'];
}

function register($con, $nama, $alamat, $no_hp, $username, $password){
    $id_role = cekIdCustomer($con);
    $query = "INSERT INTO user (nama, alamat, no_hp, username, password, id_role) VALUES ('$nama', '$alamat', '$no_hp', '$username', '$password', '$id_role')";
    $result = $con->execute_query($query);
    if($result){
        session_start();
        $_SESSION['id_user'] = $con->insert_id;
        $_SESSION['nama'] = $nama;
        $_SESSION['role'] = 'Customer';
        header("Location: ../customer/index.php");
    } else {
        echo "Error: " . $con->error;
    }
}

function login($con, $username, $password){
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $con->execute_query($query)->fetch_assoc();
    if($result){
        // session
        session_start();
        $_SESSION['id_user'] = $result['id'];
        $_SESSION['nama'] = $result['nama'];
        $_SESSION['role'] = $result['id_role'];
        if($_SESSION['role'] == 1){
            header("Location: ../product/index.php");
        } elseif($_SESSION['role'] == 4){
            header("Location: ../customer/index.php");
        }

    } else {
        echo "Invalid username or password.";
    }
}

function logout(){
    session_destroy();
    header("Location: ../authentication/login.php");
}




?>