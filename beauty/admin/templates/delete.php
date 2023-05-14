<?php
include_once "database.php";

if (isset($_GET['id'])) {
    $delete = mysqli_query($conn, "DELETE FROM product_type WHERE id = '" . $_GET['id'] . "' ");
    echo '<script>window.location="../tables.php"</script>';
}

if (isset($_GET['id'])) {
    $product = mysqli_query($conn, "SELECT picture FROM product WHERE id = '" . $_GET['id'] . "'");
    $p = mysqli_fetch_object($product);

    unlink('../assets/img/' . $p->picture);
    $delete = mysqli_query($conn, "DELETE FROM product WHERE id = '" . $_GET['id'] . "' ");
    echo '<script>window.location="../tables.php"</script>';
}
?>