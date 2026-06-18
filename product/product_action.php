<?php

include '../koneksi.php';

if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    if ($aksi == 'delete') {
        $id = $_GET['id'];
        deleteProduct($con, $id);
    } else if ($aksi == 'edit') {
        $id = $_GET['id'];
        editProduct($id);
    } else if ($aksi == 'update') {
        $id = $_POST['id'];
        $nama = $_POST['edit_nama'];
        $stok = $_POST['edit_stok'];
        $harga = $_POST['edit_harga'];
        $gambar = $_FILES['edit_gambar'];
        $deskripsi = $_POST['edit_deskripsi'];
        if ($gambar) {
            $targetFolder = "image/";
            $fileName = basename($gambar["name"]);
            $targetFileFolder = $targetFolder . $fileName;

            if (move_uploaded_file($gambar['tmp_name'], $targetFileFolder)) {
                echo "image berhasil di upload";
            } else {
                echo "image gagal di upload";
            }

            updateProduct($con, $id, $nama, $stok, $harga, $fileName, $deskripsi);
        } else {
            updateProdct($con, $id, $nama, $stok, $harga, '', $deskripsi);
        }
    } else if ($aksi == 'insert') {
        $nama = $_POST['nama'];
        $stok = $_POST['stock'];
        $harga = $_POST['harga'];
        $gambar = $_FILES['image'];
        $deskripsi = $_POST['deskripsi'];
        $category = $_POST['category_id'];
        if ($gambar) {
            $targetFolder = "image/";
            $fileName = basename($gambar["name"]);
            $targetFileFolder = $targetFolder . $fileName;

            if (move_uploaded_file($gambar['tmp_name'], $targetFileFolder)) {
                echo "image berhasil di upload";
            } else {
                echo "image gagal di upload";
            }

            insertProduct($con, $nama, $stok, $harga, $fileName, $deskripsi, $category);
        } else {
            insertProduct($con, $nama, $stok, $harga, '', $deskripsi, $category);
        }
    }
}

function readProduct($con)
{
    $query = "SELECT 
                product.id,
                product.nama,
                product.image,
                product.stock,
                product.deskripsi,
                product.harga,
                category.nama AS category
              FROM product
              JOIN category 
              ON product.id_category = category.id";

    $result = $con->execute_query($query);
    return $result;
}

function deleteProduct($con, $id)
{
    $query = "DELETE FROM product WHERE id='$id'";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "gagal";
    }
}

function editProduct($id)
{
    header("Location: edit.php?id=$id");
}

function updateProduct($con, $id, $nama, $stok, $harga, $gambar, $deskripsi)
{
    $query = '';

    if ($gambar == '') {
        $query = "UPDATE product SET  nama='$nama', stock='$stok', harga='$harga', image='$gambar', deskripsi='$deskripsi'  WHERE id='$id'";
    } else {
        $query = "UPDATE product SET  nama='$nama', stock='$stok', harga='$harga', image='$gambar', deskripsi='$deskripsi'  WHERE id='$id'";
    }

    $result = $con->execute_query($query);

    if ($result) {
        header("location: index.php");
    } else {
        echo "gagal";
    }
}

function showDataEditProduct($con, $id)
{
    $query = "SELECT * FROM product WHERE id='$id'";
    $result = $con->execute_query($query);
    return $result->fetch_assoc();
}

function insertProduct($con, $nama, $stok, $harga, $gambar, $deskripsi, $category)
{
    $query = "INSERT INTO product 
              (id_category, nama, stock, harga, image, deskripsi) 
              VALUES 
              ('$category','$nama','$stok','$harga','$gambar','$deskripsi')";

    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "gagal insert";
    }
}