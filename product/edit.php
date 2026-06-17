<?php include 'product_action.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>

<body>
    <h1>Edit Data Product</h1>
    <form action="product_action.php?aksi=update" method="post">
        <?php
        $dataProduct = showDataEditProduct($_GET['id'], $conn);


        ?>
        <input type="hidden" name="id" id="id" value="<?= $_GET['id'] ?>">
        <label for="nama_product">Nama Product</label>
        <input type="text" name="edit_nama_product" id="edit_nama_product" value="<?= $dataProduct['nama'] ?>">
        <br>
        <label for="harga">Harga</label>
        <input type="text" name="edit_harga" id="edit_harga" value="<?= $dataProduct['harga'] ?>">
        <br>
        <label for="id_category">Category</label>
        <select name="id_category">
            <?php

            $data = readCategory($conn);
            while ($row = $data->fetch_assoc()) {
            ?>
                <option value="<?= $row['id'] ?>" <?= $dataProduct['id_category'] == $row['id'] ? 'selected' : '' ?>><?= $row['nama'] ?></option>

            <?php
            }

            ?>
        </select>
        <br>
        <button type="submit">Edit</button>
    </form>

</body>

</html>
