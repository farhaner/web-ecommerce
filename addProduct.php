<?php
include_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];

    // UPLOAD FOTO
    $photoName = $_FILES['photo']['name'];
    $tmpName = $_FILES['photo']['tmp_name'];

    $folder = "uploads/";
    move_uploaded_file($tmpName, $folder . $photoName);

    $query = "INSERT INTO products (name, price, description, stock)
              VALUES ('$name', '$price', '$description', '$stock')";

    if (mysqli_query($conn, $query)) {
        echo "<div class='alert alert-success'>Data berhasil disimpan</div>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center mb-4">Product</h4>

                        <!-- FORM PRODUCT -->
                        <form action=""
                            method="post"
                            enctype="multipart/form-data">

                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="product_name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="text" name="product_price" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Stock</label>
                                <input type="text" name="stock" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <input type="text" name="description" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Photo</label>
                                <input type="file" name="photo" class="form-control" accept="image/*">
                            </div>

                            <div class="d-flex justify-content-end gap-3 mt-3">
                                <button class="btn btn-success btn-sm" type="submit">
                                    Save
                                </button>
                                <a href="index.php" class="btn btn-danger btn-sm">
                                    Cancel
                                </a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>