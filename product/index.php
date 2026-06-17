<?php include './product_action.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>

<body>
    <h1>Product</h1>
     </form>
    <a href="insert.php">Tambah Data</a>

    <table border="1">
        <thead>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>deskripsi</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
            $data = readProduct($conn);
            $no = 1;
            while ($row = mysqli_fetch_assoc($data)) {

            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama_product'] ?></td>
                    <td><?= $row['harga'] ?></td>
                    <td><?= $row['deskripsi'] ?></td>
                    <td><?= $row['nama_category'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>">Delete</a>
                    </td>
                </tr>

            <?php

            }

            ?>

        </tbody>
    </table>

</body>

</html>