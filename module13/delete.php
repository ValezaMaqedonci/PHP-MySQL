
<?php

include_once("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['id']) &&
    ctype_digit($_POST['id'])) {

    $id = (int) $_POST['id'];

    $sql = "DELETE FROM products WHERE id = :id";

    $query = $conn->prepare($sql);

    $query->execute([
        ':id' => $id
    ]);

}

header("Location: edit_products.php");
exit();

?>
