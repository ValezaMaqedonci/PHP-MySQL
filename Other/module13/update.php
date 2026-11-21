
<?php

include_once("config.php");

if (isset($_POST['update'])) {

    $id = (int) $_POST['id'];
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $quantity = (int) $_POST['quantity'];
    $price = (float) $_POST['price'];

    if ($id <= 0 || $name === '' || $description === '' ||
        $quantity < 0 || $price < 0) {

        die("Invalid product information!");

    }

    $sql = "UPDATE products
            SET name = :name,
                description = :description,
                quantity = :quantity,
                price = :price
            WHERE id = :id";

    $query = $conn->prepare($sql);

    $query->execute([
        ':name' => $name,
        ':description' => $description,
        ':quantity' => $quantity,
        ':price' => $price,
        ':id' => $id
    ]);

    header("Location: edit_products.php");
    exit();

}

header("Location: edit_products.php");
exit();

?>
