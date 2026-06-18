<?php

include '../koneksi.php';

if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];
    if ($aksi == 'insertCart') {
        $id_user = $_GET['id_user'];
        $id_product = $_GET['id_product'];
        insertProductToCart($con, $id_user, $id_product);
    } else if ($aksi == 'deleteCart') {
        $id_user = $_GET['id_user'];
        $id_product = $_GET['id_product'];
        deleteDataCart($con, $id_user, $id_product);
    } else if ($aksi == 'deleteAllCart') {
        $id_user = $_GET['id_user'];
        deleteAllDataCart($con, $id_user);
    } else if ($aksi == 'checkout'){
        $id_user = $_GET['id_user'];
        checkout($con, $id_user);
    }
}

function showDataCategory($con)
{
    $query = 'select * from category';
    $result = $con->execute_query($query);
    return $result;
}

function readProduk($con)
{
    $query = "select product.id, product.nama, product.harga, product.image, product.stock, category.nama as nama_category from product join category on product.id_category = category.id";
    $result = $con->execute_query($query);
    return $result;
}

function insertProductToCart($con, $id_user, $id_product)
{
    $query = "insert into cart (id_user, id_product) values ('$id_user', '$id_product')";
    $result = $con->execute_query($query);

    if ($result) {
        header('Location: index.php');
    } else {
        echo "Gagal Insert";
    }
}

function showDataCart($con, $id_user)
{
    $query = "SELECT cart.id_product, product.nama AS nama_product, product.harga, product.image, COUNT(*) AS qty
              FROM cart
              JOIN product ON cart.id_product = product.id
              WHERE cart.id_user = '$id_user'
              GROUP BY cart.id_product, product.nama, product.harga, product.image";
    $result = $con->execute_query($query);
    return $result;
}

function deleteDataCart($con, $id_user, $id_product)
{
    $query = "DELETE FROM cart WHERE id_user = '$id_user' AND id_product = '$id_product' limit 1";
    $result = $con->execute_query($query);
    if ($result) {
        header('Location: index.php');
    } else {
        echo "Gagal Delete";
    }
}

function deleteAllDataCart($con, $id_user)
{
    $query = "DELETE FROM cart WHERE id_user='$id_user'";
    $result = $con->execute_query($query);
    if ($result) {
        header('Location: index.php');
    } else {
        echo "Gagal Delete";
    }
}

function showTotalCart($con, $id_user)
{
    $query = "select sum(product.harga) as total 
    from cart join product on cart.id_product =
    product.id where id_user='$id_user'";
    $result = $con->execute_query($query);
    return $result->fetch_assoc();
}

function checkOut($con, $id_user){
    $resultCekCart = showDataCart($con, $id_user);

    if($resultCekCart->num_rows > 0){
        // create to table transaction
        $total_pembelian = showTotalCart($con, $id_user);
        $tgl_pembelian = date('Y-m-d H:i:s');
        $queryInsertTransaction = "insert into transaksi (id_user, total_pembelian, tgl_transaksi) values ('$id_user', '$total_pembelian[total]', '$tgl_pembelian')";
        $resultInsertTransaction = $con->execute_query($queryInsertTransaction);

        if($resultInsertTransaction){
            $id_transaksi = $con->insert_id;

            // create to table transaction detail
            while($rowCart = $resultCekCart->fetch_assoc()){
                $id_product = $rowCart['id_product'];
                $jumlah = $rowCart['qty'];
                $total_jumlah = $rowCart['harga'] * $jumlah;
                $queryInsertTransactionDetail = "insert into detail_transaksi (id_transaksi, id_product, jumlah, total_jumlah) values ('$id_transaksi', '$id_product', '$jumlah', '$total_jumlah')";
                $resultInsertTransactionDetail = $con->execute_query($queryInsertTransactionDetail);
            }

            // delete data cart
            deleteAllDataCart($con, $id_user);
            header('Location: index.php');
        }else{
            echo "Gagal Check Out";
        }
    }

}