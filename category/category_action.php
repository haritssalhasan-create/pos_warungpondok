<?php

include '../koneksi.php';


if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];
    if ($aksi == 'insert') {
        $nama = $_POST['nama_category'];
        insertCategory($con, $nama);
    } else if ($aksi == 'edit') {
        $id = $_GET['id'];
        $data = showDataEditCategory($con, $id)->fetch_assoc();
    } else if ($aksi == 'update') {
        $id = $_POST['id'];
        $nama = $_POST['nama_category'];
        updateCategory($con, $id, $nama);
    } else if ($aksi == 'delete') {
        $id = $_GET['id'];
        deleteCategory($con, $id);
    }
}

function readCategory($con)
{
    $query = "select * from category";
    $result = $con->execute_query($query);
    return $result;
}

function insertCategory($con, $nama)
{
    $query = "insert into category (nama) values ('$nama')";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal Menambahkan Category";
    }
}

function showDataEditCategory($con, $id)
{
    $query = "select * from category where id = $id";
    $result = $con->execute_query($query);
    return $result;
}

function updateCategory($con, $id, $nama)
{
    $query = "update category set nama = '$nama' where id = $id";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal Mengupdate Category";
    }
}

function deleteCategory($con, $id)
{
    $query = "delete from category where id = $id";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal Menghapus Category";
    }
}