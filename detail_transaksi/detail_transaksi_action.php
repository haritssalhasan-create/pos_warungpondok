<?php

include '../koneksi.php';


if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];
    if ($aksi == 'insert') {
        $id_transaksi = $_POST['id_transaksi'];
        $id_product = $_POST['id_product'];
        $jumlah = $_POST['jumlah'];
        $total_jumlah = $_POST['total_jumlah'];
        insertDetailTransaksi($con, $id_transaksi, $id_product, $jumlah, $total_jumlah);
    } else if ($aksi == 'edit') {
        $id = $_GET['id'];
        $data = showDataEditDetailTransaksi($con, $id)->fetch_assoc();
    } else if ($aksi == 'update') {
        $id = $_POST['id'];
        $id_transaksi = $_POST['id_transaksi'];
        $id_product = $_POST['id_product'];
        $jumlah = $_POST['jumlah'];
        $total_jumlah = $_POST['total_jumlah'];
        updateDetailTransaksi($con, $id, $id_transaksi, $id_product, $jumlah, $total_jumlah);
    } else if ($aksi == 'delete') {
        $id = $_GET['id'];
        deleteDetailTransaksi($con, $id);
    }
}

function readDetailTransaksi($con)
{
    $query = "select detail_transaksi.*, product.nama as nama_product from detail_transaksi join product on detail_transaksi.id_product = product.id";
    $result = $con->execute_query($query);
    return $result;
}

function insertDetailTransaksi($con, $id_transaksi, $id_product, $jumlah, $total_jumlah)
{
    $query = "insert into detail_transaksi (id_transaksi, id_product, jumlah, total_jumlah) values ('$id_transaksi', '$id_product', '$jumlah', '$total_jumlah')";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal Menambahkan Detail Transaksi";
    }
}

function showDataEditDetailTransaksi($con, $id)
{
    $query = "select * from detail_transaksi where id = $id";
    $result = $con->execute_query($query);
    return $result;
}

function updateDetailTransaksi($con, $id, $id_transaksi, $id_product, $jumlah, $total_jumlah)
{
    $query = "update detail_transaksi set id_transaksi = '$id_transaksi', id_product = '$id_product', jumlah = '$jumlah', total_jumlah = '$total_jumlah' where id = $id";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal Mengupdate Detail Transaksi";
    }
}

function deleteDetailTransaksi($con, $id)
{
    $query = "delete from detail_transaksi where id = $id";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal Menghapus Detail Transaksi";
    }
}

function showDataTransaksi($con)
{
    $query = "select * from transaksi";
    $result = $con->execute_query($query);
    return $result;
}

function showDataProduct($con)
{
    $query = "select * from product";
    $result = $con->execute_query($query);
    return $result;
}