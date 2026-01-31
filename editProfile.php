<?php
include_once 'config/database.php';
include_once 'utils/auth.php';
include_once 'utils/header.php'
?>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card">
        <div class="card-body">

          <h4 class="text-center mb-4">User Profile</h4>

          <!-- FOTO PROFILE -->
          <div class="text-center mb-4">
            <img src="icon/profile.jpg"
              class="rounded-circle"
              width="120"
              height="120"
              style="object-fit: cover;">
          </div>

          <!-- FORM PROFILE -->
          <form action="index.php"
            method="post"
            enctype="multipart/form-data">

            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" name="nama_lengkap" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Nickname</label>
              <input type="text" name="nama_panggilan" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Photo</label>
              <input type="file" name="foto" class="form-control" accept="image/*">
            </div>

            <div class="d-flex justify-content-end gap-3 mt-3">
              <button class="btn btn-success btn-sm" type="submit">
                Save Changes
              </button>
              <a href="main.php" class="btn btn-danger btn-sm">
                Cancel
              </a>
            </div>
          </form>

        </div>
      </div>

    </div>
  </div>
</div>

<?php
include_once 'utils/footer.php'
?>