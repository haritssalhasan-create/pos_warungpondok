<?php

include '../connection.php';


if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];
    if ($aksi == 'insert') {
        $nama = $_POST['nama_product'];
        $harga = $_POST['price'];
        $deskripsi = $_POST['deskripsi'];
        $stock = $_POST['stok'];
        $category = $_POST['id_category'];
        $image = $_FILES['image_product'];
        if ($image) {
            
            $targetFolder = "image_product/";
            $filename = basename($image['name']);
            $targetFileFolder = $targetFolder . $filename;

            if (move_uploaded_file($image['tmp_name'], $targetFileFolder)) {
                echo $filename;
            } else {
                echo "image gagal diupload";
            }

            insertProduct($conn, $nama, $harga, $deskripsi, $filename, $stock, $category);
        } else {
            insertProduct($conn, $nama, $harga, $deskripsi, '', $stock, $category);
        }
    } else if ($aksi == 'edit') {
        $id = $_GET['id'];
        $data = showDataEditProduct($conn, $id)->fetch_assoc();
    } else if ($aksi == 'update') {
        $id = $_POST['id'];
        $nama = $_POST['nama_product'];
        $harga = $_POST['harga_product'];
        $stock = $_POST['stock_product'];
        $image = $_POST['image_product'];
        $category = $_POST['category_product'];
        updateProduct($conn, $id, $nama, $harga, $stock, $image, $category);
    } else if ($aksi == 'delete') {
        $id = $_GET['id'];
        deleteProduct($conn, $id);
    }
}

function readProduct($con)
{
    $query = "select product.id, product.nama, product.harga, product.image, product.stok, category.nama as nama_category from product join category on product.id_category = category.id";
    $result = $con->execute_query($query);
    return $result;
}

function showDataCategory($con)
{
    $query = 'select * from category';
    $result = $con->execute_query($query);
    return $result;
}

function insertProduct($con, $nama, $harga, $deskripsi, $image, $stock, $category)
{
    $query = "insert into product (nama, harga, deskripsi, image, stok, id_category) values ('$nama', '$harga', '$deskripsi', '$image', '$stock', '$category')";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal Menambahkan Role";
    }
}

function showDataEditProduct($con, $id)
{
    $query = "select * from product where id = $id";
    $result = $con->execute_query($query);
    return $result;
}

function updateProduct($con, $id, $nama, $harga, $stock, $image, $category)
{
    $query = "update product set name = '$nama', harga = '$harga', stock = '$stock', image = '$image', category = '$category' where id = $id";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal Mengupdate Role";
    }
}

function deleteProduct($con, $id)
{
    $query = "delete from product where id = $id";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal Menghapus Role";
    }
}