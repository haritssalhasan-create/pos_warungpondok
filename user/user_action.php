<?php

include '../koneksi.php';


if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];
    if ($aksi == 'insert') {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id_role = $_POST['id_role'];
        insertUser($con, $nama, $alamat, $no_hp, $username, $password, $id_role);
    } else if ($aksi == 'edit') {
        $id = $_GET['id'];
        $data = showDataEditUser($con, $id)->fetch_assoc();
    } else if ($aksi == 'update') {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id_role = $_POST['id_role'];
        updateUser($con, $id, $nama, $alamat, $no_hp, $username, $password, $id_role);
    } else if ($aksi == 'delete') {
        $id = $_GET['id'];
        deleteUser($con, $id);
    }
}

function readUser($con)
{
    $query = "select user.*, role.nama as nama_role from user join role on user.id_role = role.id";
    $result = $con->execute_query($query);
    return $result;
}

function insertUser($con, $nama, $alamat, $no_hp, $username, $password, $id_role)
{
    $query = "insert into user (nama, alamat, no_hp, username, password, id_role) values ('$nama', '$alamat', '$no_hp', '$username', '$password', '$id_role')";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal Menambahkan User";
    }
}

function showDataEditUser($con, $id)
{
    $query = "select * from user where id = $id";
    $result = $con->execute_query($query);
    return $result;
}

function updateUser($con, $id, $nama, $alamat, $no_hp, $username, $password, $id_role)
{
    $query = "update user set nama = '$nama', alamat = '$alamat', no_hp = '$no_hp', username = '$username', password = '$password', id_role = '$id_role' where id = $id";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal Mengupdate User";
    }
}

function deleteUser($con, $id)
{
    $query = "delete from user where id = $id";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal Menghapus User";
    }
}

function showDataRole($con)
{
    $query = "select * from role";
    $result = $con->execute_query($query);
    return $result;
}