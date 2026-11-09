
<?php

include_once("config.php");

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("Invalid product ID!");
}

$id = (int) $_GET['id'];

$sql = "SELECT * FROM products WHERE id = :id";
$query = $conn->prepare($sql);
$query->execute([':id' => $id]);

$product = $query->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    die("Product not found!");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
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
            <strong>Update Product</strong>
            <span>Welcome, Admin</span>
        </div>

        <div class="content">

            <h1>Update Product</h1>

            <p class="subtitle">
                Change the information of your product.
            </p>

            <div class="card form-card">

                <form action="update.php" method="POST">

                    <input type="hidden"
                           name="id"
                           value="<?= (int)$product['id'] ?>">

                    <div class="form-group">
                        <label>Product Name</label>

                        <input type="text"
                               name="name"
                               value="<?= htmlspecialchars($product['name']) ?>"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>

                        <textarea name="description"
                                  required><?= htmlspecialchars($product['description']) ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>

                        <input type="number"
                               name="quantity"
                               min="0"
                               value="<?= htmlspecialchars($product['quantity']) ?>"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Price (€)</label>

                        <input type="number"
                               name="price"
                               step="0.01"
                               min="0"
                               value="<?= htmlspecialchars($product['price']) ?>"
                               required>
                    </div>

                    <button type="submit"
                            name="update"
                            class="btn btn-primary">
                        Save Changes
                    </button>

                    <a href="edit_products.php"
                       class="btn btn-danger">
                        Cancel
                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>
