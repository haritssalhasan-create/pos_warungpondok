<?php

include '../koneksi.php';


if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];
    if ($aksi == 'insert') {
        $nama = $_POST['nama_role'];
        insertRole($con, $nama);
    } else if ($aksi == 'edit') {
        $id = $_GET['id'];
        $data = showDataEditRole($con, $id)->fetch_assoc();
    } else if ($aksi == 'update') {
        $id = $_POST['id'];
        $nama = $_POST['nama_role'];
        updateRole($con, $id, $nama);
    } else if ($aksi == 'delete') {
        $id = $_GET['id'];
        deleteRole($con, $id);
    }
}

function readRole($con)
{
    $query = "select * from role";
    $result = $con->execute_query($query);
    return $result;
}

function insertRole($con, $nama)
{
    $query = "insert into role (nama) values ('$nama')";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal Menambahkan Role";
    }
}

function showDataEditRole($con, $id)
{
    $query = "select * from role where id = $id";
    $result = $con->execute_query($query);
    return $result;
}

function updateRole($con, $id, $nama)
{
    $query = "update role set nama = '$nama' where id = $id";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal Mengupdate Role";
    }
}

function deleteRole($con, $id)
{
    $query = "delete from role where id = $id";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal Menghapus Role";
    }
}