<?php
require('koneksi.php');

if (isset($_POST['submit'])) {
    $user = $_POST['txt_user'];
    $pass = $_POST['txt_pass'];

    if (empty(trim($user)) || empty(trim($pass))) {
        $error = 'Email/Username dan Password harus diisi!';
        header('Location: login.php');
        exit;
    }

    // Ganti query SQL
    $query = "SELECT * FROM perloginan WHERE (email = '$user' OR username = '$user') AND password = '$pass'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        $error = 'Terjadi kesalahan dalam query!';
        header('Location: login.php');
        exit;
    }

    $row = mysqli_fetch_assoc($result);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        $roleVal = $row['role'];

        // Periksa peran pengguna
        switch ($roleVal) {
            case 'admin':
                header('Location: dashboard.php');
                break;
            case 'penjoki':
                header('Location: ../pejoki/penjoki.php');
                break;
            case 'customer':
                header('Location: ../customer/customer.php');
                break;
            default:
                $error = 'Role tidak valid!';
                header('Location: login.php');
                break;
        }
    } else {
        $error = 'Login gagal. Email/Username atau Password salah.';
        header('Location: login.php');
        exit;
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
     <header>
        <h2 class="logo">Hanzjoki</h2>
        <nav class="navigation">
            <a href="#">Home</a>
            <a href="aboutus.php">About us</a>
            <a href="#">Contact</a>
            <button class="btnLogin">Login</button>
        </nav>
     </header>

     <div class="wrapper">
        <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
        <div class="form-box Login">
            <h2>Login</h2>
            <form method="post" action="login.php"> <!-- Perbaiki aksi form ke "login.php" -->
        <label for="txt_user">Email/Username:</label>
        <input type="text" name="txt_user" id="txt_user" required>
        <br>
        <label for="txt_pass">Password:</label>
        <input type="password" name="txt_pass" id="txt_pass" required>
        <br>
        <input type="submit" name="submit" value="Login">
    </form>
            

        </div>
     </div>

     <script src="script.js"></script>
     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>