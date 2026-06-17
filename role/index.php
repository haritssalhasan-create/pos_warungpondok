<?php
include 'role_action.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="edit_role.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Role</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>

<h1>role</h1>
<a href="insert.php"></a>
<table border="1">
<thead>
    <th>nama</th>
    <th>aksi</th>
</thead>
<tbody>
    <?php
    $data = readProduct($con);
    $no = 1;
    while ($row = mysqli_fetch_array($data)) {

    ?>

    r>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama'] ?></td>
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