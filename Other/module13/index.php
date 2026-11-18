
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="layout">

    <div class="sidebar">

        <div class="logo">Digital School</div>

        <h4>Main Menu</h4>
        <a href="dashboard.php">Dashboard</a>

        <h4>Management</h4>
        <a href="index.php" class="active">Add Product</a>
        <a href="edit_products.php">Edit</a>

    </div>

    <div class="main">

        <div class="topbar">
            <strong>Add New Product</strong>
            <span>Welcome, Admin</span>
        </div>

        <div class="content">

            <h1>Add Product</h1>

            <p class="subtitle">
                Enter information for your new product.
            </p>

            <div class="card form-card">

                <form action="add.php" method="POST">

                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name="quantity"
                               min="0" required>
                    </div>

                    <div class="form-group">
                        <label>Price (€)</label>
                        <input type="number" name="price"
                               step="0.01" min="0" required>
                    </div>

                    <button type="submit" name="submit"
                            class="btn btn-primary">
                        Add Product
                    </button>

                    <a href="dashboard.php"
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
