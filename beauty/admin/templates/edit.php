<?php
include_once "database.php";

$product = mysqli_query($conn, "SELECT * FROM product WHERE id = '" . $_GET['id'] . "' ");

if (mysqli_num_rows($product) == 0) {
    echo '<script>window.location="update.php"</script>';
}

$p = mysqli_fetch_object($product);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
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
            <select class="input-control" name="category" required>
                <option value="">Choose category</option>
                <?php
                $category = mysqli_query($conn, "SELECT * FROM product_type ORDER BY id ASC");

                while ($r = mysqli_fetch_array($category)) {
                    ?>
                    <option value="<?= $r['id'] ?>" <?php echo ($r['id'] == $p->id) ? 'selected' : ''; ?>><?php echo $r['name'] ?></option>
                <?php } ?>
            </select>
            <input type="text" name="name" placeholder="Product Name" class="input-control"
                value="<?php echo $p->name ?>" required>
            <input type="text" name="sell_price" placeholder="Price" class="input-control"
                value="<?php echo $p->sell_price ?>" required>
            <img src="assets/img/<?php echo $p->picture ?>" width="100px" alt="">
            <input type="hidden" name="picture" value="<?php echo $p->picture ?>">
            <input type="file" name="img" class="input-control">
            <textarea name="description" class="input-control"
                placeholder="Description"><?php echo $p->description ?></textarea>
            <input type="submit" name="submit" value="Submit" class="btn btn-success">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            // Collect data from form
            $category = $_POST['category'];
            $name = $_POST['name'];
            $sell_price = $_POST['sell_price'];
            $description = $_POST['description'];
            $picture = $_POST['picture'];

            // Collect data format that required from file
            $format_file = array('png', 'jpg', 'jpeg', 'gif');

            // Upload new picture
            $filename = $_FILES['img']['name'];
            $new_file = $_FILES['img']['new_file'];
            $type = explode('.', $filename);
            $type2 = $type[count($type) - 1];

            $new_name = "product" . time() . '.' . $type2;

            // Change product picture
            if ($filename != "") {
                // Format file validation
                if (!in_array($type2, $format_file)) {
                    echo '<script>alert("File format invalid")</script>';
                } else {
                    unlink("./assets/img/" . $picture);
                    move_uploaded_file($new_file, './assets/img/' . $new_name);
                    $picture_name = $new_name;
                }
            } else {
                $picture_name = $picture;
            }
            // Update query
            $update = mysqli_query($conn, "UPDATE product SET
            product_type_id = '" . $category . "',
            name = '" . $name . "',
            sell_price = '" . $sell_price . "',
            description = '" . $description . "',
            picture = '" . $picture_name . "'
            WHERE id = '" . $p->id . "' ");

            if ($update) {
                echo '<script>alert("Update success")</script>';
                echo '<script>window.location="tables.php"</script>';
            } else {
                echo 'Failed' . mysqli_error($conn);
            }
        }
        ?>
    </div>
    <?php
    include_once "footer.php";
    ?>
</body>

</html>