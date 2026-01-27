<!DOCTYPE html>
<html>

<head>
    <title>E-Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/toastNotif.js"></script>
</head>

<body>
    <?php 
    include_once 'utils/navbar.php';
    include_once 'cart.php';
    ?> 

    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="cartToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Cart</strong>
                <small>Baru saja</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                Produk berhasil ditambahkan ke cart
            </div>
        </div>
    </div>
</body>

</html>