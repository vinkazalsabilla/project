<?php
include_once "database.php";

$table = <<<HTML
<table id="datatablesSimple" border="1" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Category</th>
            <th>Name</th>
            <th>Price</th>
            <th>Picture</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
HTML;

echo $table;

$no = 1;
$product = mysqli_query($conn, "SELECT product.*, product_type.name AS category_name FROM product JOIN product_type ON product.product_type_id = product_type.id ORDER BY product.id ASC");
if (mysqli_num_rows($product)) {
    while ($row = mysqli_fetch_array($product)) {
        echo '<tr>';
        echo '<td>' . $no++ . '</td>';
        echo '<td>' . $row['category_name'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>Rp.' . number_format($row['sell_price']) . '</td>';
        echo '<td><a href="assets/img/' . $row['picture'] . '" target="_blank" ><img src="assets/img/' . $row['picture'] . '" width="40px" alt=""></a></td>';
        echo '<td>' . $row['stock'] . '</td>';
        echo '<td>';
        echo '<a class="btn btn-warning" href="update.php?id=' . $row['id'] . '">Edit</a>';
        echo ' | | ';
        echo '<a class="btn btn-danger" href="templates/delete.php?id=' . $row['id'] . '" onclick="return confirm(\'You sure want to delete this product?\')">Delete</a>';
        echo '</td>';
        echo '</tr>';
    }
}

echo '</tbody>';
echo '</table>';
?>
<a href="create.php"><input style="margin-top:5px;" type="submit" name="submit" value="Add Product" class="btn btn-primary"><br></a>