<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Product</title>
</head>

<body>
    <h1>Tambah Data Product</h1>
    <form action="product_action.php?aksi=insert" method="post" enctype="multipart/form-data">
        <label for="nama_product">Nama Product</label>
        <input type="text" name="nama_product" id="nama_product">
        <br>
        <label for="harga">Harga</label>
        <input type="text" name="harga" id="harga">
        <br>
        <label for="deskripsi">deskripsi</label>
        <input type="text" name="deskripsi" id="deskripsi">
        <br>
        <label for="id_category">Category</label>
        <select name="id_category">
            <?php
            include './product_action.php';

            $data = readCategory($conn)
            while ($row = mysqli_fetch_assoc($data)) {
            ?>
                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
            <?php
            }

            ?>
        </select>
        <br>
        <button type="submit">Tambah</button>
    </form>

</body>

</html>