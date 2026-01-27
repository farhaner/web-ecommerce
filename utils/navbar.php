<nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container">
            <a class="navbar-brand" href="#">E-Commerce</a>

            <!-- HAMBURGER BUTTON (WAJIB DI SINI) -->
            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- MENU COLLAPSE -->
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

                <!-- KANAN -->
                <div class="ms-auto d-flex align-items-center gap-3">
                    <a href="cart.php">
                        <img src="icon/shoping-cart.png" height="30">
                    </a>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <div class="profile ms-3">
                <a href="editUser.php">
                    <img src="icon/buku.png" class="rounded-circle" width="40" height="40" alt="Profile">
                </a>
            </div>
        </div>
    </nav>