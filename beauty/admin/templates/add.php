<?php
include_once "database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        .input-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .box {
            background-color: #fff;
            padding: 15px;
            box-sizing: border-box;
            margin: 10px 0 25px 0;
        }

        .box::after {
            content: "";
            display: block;
            clear: both;
        }
    </style>
</head>

<body>
    <div class="box">
        <form action="" method="POST" enctype="multipart/form-data">
            <select class="input-control" name="product_type" required>
                <option value="">Choose category</option>
                <?php
                $category = mysqli_query($conn, "SELECT * FROM product_type ORDER BY id ASC");
                while ($r = mysqli_fetch_array($category)) {
                    ?>
                    <option value="<?php echo $r['id'] ?>"><?php echo $r['name'] ?></option>
                <?php } ?>
            </select>
            <input type="text" name="name" placeholder="Product Name" class="input-control" required>
            <input type="text" name="purchase_price" placeholder="Purchase Price" class="input-control" required>
            <input type="text" name="sell_price" placeholder="Sell Price" class="input-control" required>
            <input type="text" name="stock" placeholder="Stock" class="input-control" required>
            <input type="text" name="min_stock" placeholder="Minimum Stock" class="input-control" required>
            <input type="text" name="restock_id" placeholder="Restock" class="input-control" required>
            <input type="file" name="picture" class="input-control" required>
            <textarea class="input-control" name="description" placeholder="Description"></textarea>
            <input type="submit" name="submit" value="Submit" class="btn btn-success">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            // Collect data from form
            $category = $_POST['product_type'];
            $name = $_POST['name'];
            $purchase_price = $_POST['purchase_price'];
            $sell_price = $_POST['sell_price'];
            $stock = $_POST['stock'];
            $min_stock = $_POST['min_stock'];
            $restock_id = $_POST['restock_id'];
            $description = $_POST['description'];

            // Collect data format that required from file
            $format_file = array('png', 'jpg', 'jpeg', 'gif');

            // Uploading picture
            $filename = $_FILES['picture']['name'];
            $new_file = $_FILES['picture']['tmp_name'];
            $type = explode('.', $filename);
            $type2 = $type[1];

            $new_name = "product" . time() . '.' . $type2;

            // validation format file
            if (!in_array($type2, $format_file)) {
                echo '<script>alert("File format not allowed")</script>';
            } else {
                // Upload file and insert data into database
                move_uploaded_file($new_file, 'assets/img/' . $new_name);
                $insert = mysqli_query($conn, "INSERT INTO product (`id`, `name`, `purchase_price`, `sell_price`, `stock`, `min_stock`, `product_type_id`, `restock_id`, `picture`, `description`) VALUES (
            null,
            '" . $name . "',
            '" . $purchase_price . "',
            '" . $sell_price . "',
            '" . $stock . "',
            '" . $min_stock . "',
            '" . $category . "',
            '" . $restock_id . "',
            '" . $new_name . "',
            '" . $description . "'
            )");
                if ($insert) {
                    echo '<script>alert("Add product success")</script>';
                    echo '<script>window.location="tables.php"</script>';
                } else {
                    echo 'Failed to add product' . mysqli_error($conn);
                }
            }
        }
        ?>


    </div>

    <?php
    include_once "footer.php";
    ?>
</body>

</html>