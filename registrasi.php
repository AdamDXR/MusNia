<?php
include "koneksi.php";

// Jika tombol register diklik
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $password = md5($_POST['passw']); // Enkripsi password dengan MD5

    // Cek dulu apakah username sudah ada
    $cek = $conn->prepare("SELECT username FROM user WHERE username=?");
    $cek->bind_param("s", $username);
    $cek->execute();
    $cek->store_result();

    if ($cek->num_rows > 0) {
        echo "<script>alert('Username sudah ada, ganti yang lain!');</script>";
    } else {
        // Jika belum ada, masukkan data baru (INSERT)
        $stmt = $conn->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Simpan data sukses!');
                    document.location='login.php';
                  </script>";
        } else {
            echo "<script>alert('Gagal simpan data!');</script>";
        }
        $stmt->close();
    }
    $cek->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register | MusNia</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <link rel="icon" href="img/logo.png" />
  </head>
  <body class="bg-danger-subtle">
    <div class="container mt-5 pt-5">
      <div class="row">
        <div class="col-12 col-sm-8 col-md-6 m-auto">
          <div class="card border-0 shadow rounded-5">
            <div class="card-body">
              <div class="text-center mb-3">
                <i class="bi bi-person-plus-fill h1 display-4"></i>
                <p>Daftar User Baru</p>
                <hr />
              </div>
              <form action="" method="post">
                <input
                  type="text"
                  name="user"
                  class="form-control my-4 py-2 rounded-4"
                  placeholder="Username Baru"
                  required
                />
                <input
                  type="password"
                  name="passw"
                  class="form-control my-4 py-2 rounded-4"
                  placeholder="Password Baru"
                  required
                />
                <div class="text-center my-3 d-grid">
                  <button class="btn btn-danger rounded-4">Register</button>
                </div>
              </form>
              <div class="text-center">
                  <p>Sudah punya akun? <a href="login.php" class="text-danger text-decoration-none fw-bold">Login disini</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>