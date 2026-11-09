
<?php

include_once("config.php");

$sql = "SELECT * FROM products ORDER BY id DESC";
$query = $conn->prepare($sql);
$query->execute();

$products = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="layout">

    <div class="sidebar">

        <div class="logo">Digital School</div>

        <h4>Main Menu</h4>
        <a href="dashboard.php">Dashboard</a>

        <h4>Management</h4>
        <a href="index.php">Add Product</a>
        <a href="edit_products.php" class="active">Edit</a>

    </div>

    <div class="main">

        <div class="topbar">
            <strong>Products Management</strong>
            <span>Welcome, Admin</span>
        </div>

        <div class="content">

            <h1>Edit Products</h1>

            <p class="subtitle">
                Update or delete your products.
            </p>

            <div class="card">

                <div class="table-container">

                    <table>

                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>

                        </thead>

                        <tbody>

                        <?php foreach($products as $product) { ?>

                            <tr>

                                <td><?= htmlspecialchars($product['id']) ?></td>

                                <td><?= htmlspecialchars($product['name']) ?></td>

                                <td><?= htmlspecialchars($product['description']) ?></td>

                                <td><?= htmlspecialchars($product['quantity']) ?></td>

                                <td>
                                    <?= number_format((float)$product['price'], 2) ?> €
                                </td>

                                <td>

                                    <div class="actions">

                                        <a href="edit.php?id=<?= (int)$product['id'] ?>"
                                           class="btn btn-warning btn-small">
                                            Update
                                        </a>

                                        <form action="delete.php"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this product?');">

                                            <input type="hidden"
                                                   name="id"
                                                   value="<?= (int)$product['id'] ?>">

                                            <button type="submit"
                                                    class="btn btn-danger btn-small">
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        <?php } ?>

                        <?php if(count($products) == 0) { ?>

                            <tr>
                                <td colspan="6">No products found.</td>
                            </tr>

                        <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
