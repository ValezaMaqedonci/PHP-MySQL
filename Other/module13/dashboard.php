
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
    <title>Products Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="layout">

    <div class="sidebar">

        <div class="logo">Digital School</div>

        <h4>Main Menu</h4>

        <a href="dashboard.php" class="active">Dashboard</a>

        <h4>Management</h4>

        <a href="index.php">Add Product</a>

        <a href="edit_products.php">Edit</a>

    </div>

    <div class="main">

        <div class="topbar">
            <strong>Products Management</strong>
            <span>Welcome, Admin</span>
        </div>

        <div class="content">

            <h1>Products Dashboard</h1>

            <p class="subtitle">
                Manage and view all your products.
            </p>

            <div class="card">

                <h3>All Products</h3>

                <div class="table-container">

                    <table>

                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Price</th>
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

                            </tr>

                        <?php } ?>

                        <?php if(count($products) == 0) { ?>

                            <tr>
                                <td colspan="5">No products found.</td>
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
