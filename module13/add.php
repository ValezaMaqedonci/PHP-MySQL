
<?php

include_once("config.php");

if (isset($_POST['submit'])) {

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $quantity = (int) $_POST['quantity'];
    $price = (float) $_POST['price'];

    if ($name === '' || $description === '' ||
        $quantity < 0 || $price < 0) {

        die("Invalid product information!");

    }

    $sql = "INSERT INTO products
            (name, description, quantity, price)
            VALUES
            (:name, :description, :quantity, :price)";

    $query = $conn->prepare($sql);

    $query->execute([
        ':name' => $name,
        ':description' => $description,
        ':quantity' => $quantity,
        ':price' => $price
    ]);

    header("Location: dashboard.php");
    exit();

}

header("Location: index.php");
exit();

?>
