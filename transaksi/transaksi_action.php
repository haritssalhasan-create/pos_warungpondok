<?php

include '../koneksi.php';


if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];
    if ($aksi == 'insert') {
        $id_user = $_POST['id_user'];
        $total_pembelian = $_POST['total_pembelian'];
        $tgl_transaksi = $_POST['tgl_transaksi'];
        insertTransaksi($con, $id_user, $total_pembelian, $tgl_transaksi);
    } else if ($aksi == 'edit') {
        $id = $_GET['id'];
        $data = showDataEditTransaksi($con, $id)->fetch_assoc();
    } else if ($aksi == 'update') {
        $id = $_POST['id'];
        $id_user = $_POST['id_user'];
        $total_pembelian = $_POST['total_pembelian'];
        $tgl_transaksi = $_POST['tgl_transaksi'];
        updateTransaksi($con, $id, $id_user, $total_pembelian, $tgl_transaksi);
    } else if ($aksi == 'delete') {
        $id = $_GET['id'];
        deleteTransaksi($con, $id);
    }
}

function readTransaksi($con)
{
    $query = "select transaksi.*, user.nama as nama_user from transaksi join user on transaksi.id_user = user.id";
    $result = $con->execute_query($query);
    return $result;
}

function insertTransaksi($con, $id_user, $total_pembelian, $tgl_transaksi)
{
    $query = "insert into transaksi (id_user, total_pembelian, tgl_transaksi) values ('$id_user', '$total_pembelian', '$tgl_transaksi')";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal Menambahkan Transaksi";
    }
}

function showDataEditTransaksi($con, $id)
{
    $query = "select * from transaksi where id = $id";
    $result = $con->execute_query($query);
    return $result;
}

function updateTransaksi($con, $id, $id_user, $total_pembelian, $tgl_transaksi)
{
    $query = "update transaksi set id_user = '$id_user', total_pembelian = '$total_pembelian', tgl_transaksi = '$tgl_transaksi' where id = $id";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal Mengupdate Transaksi";
    }
}

function deleteTransaksi($con, $id)
{
    $query = "delete from transaksi where id = $id";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal Menghapus Transaksi";
    }
}

function showDataUser($con)
{
    $query = "select * from user";
    $result = $con->execute_query($query);
    return $result;
}