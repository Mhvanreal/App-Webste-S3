
<?php
require('../koneksi.php');
session_start();

if (isset($_POST['login'])) {
    $emailOrUsername = $_POST['emailOrUsername'];
    $password = $_POST['password'];

    // Validasi form di sisi klien
    if (empty($emailOrUsername) || empty($password)) {
        echo "Email/Username dan password harus diisi.";
        // exit;
    }

    // Query Admin
    $queryAdmin = "SELECT * FROM data_admin WHERE (email = ? OR username = ?) AND pw = ?";
    $stmtAdmin = mysqli_prepare($koneksi, $queryAdmin);

    if (!$stmtAdmin) {
        echo "Terjadi kesalahan dalam query Admin: " . mysqli_error($koneksi);
        // exit;
    }

    mysqli_stmt_bind_param($stmtAdmin, 'sss', $emailOrUsername, $emailOrUsername, $password);

    if (mysqli_stmt_execute($stmtAdmin)) {
        $resultAdmin = mysqli_stmt_get_result($stmtAdmin);
        $rowAdmin = mysqli_fetch_assoc($resultAdmin);

        if ($rowAdmin && $rowAdmin['sebagai'] === 'admin') {
            $_SESSION['user'] = $rowAdmin;
            header('Location: home.php');
            // exit;
        } else {
            echo "Login admin gagal. Periksa email/username dan password Anda atau hubungi administrator.";
        }
    } else {
        echo "Terjadi kesalahan dalam eksekusi query Admin: " . mysqli_error($koneksi);
        // exit;
    }

    
    $queryWorker = "SELECT * FROM data_worker WHERE (email = ? OR username = ?) AND pw = ?";
    $stmtWorker = mysqli_prepare($koneksi, $queryWorker);

    if (!$stmtWorker) {
        echo "Terjadi kesalahan dalam query Worker: " . mysqli_error($koneksi);
        // exit;
    }

    mysqli_stmt_bind_param($stmtWorker, 'sss', $emailOrUsername, $emailOrUsername, $password);

    if (mysqli_stmt_execute($stmtWorker)) {
        $resultWorker = mysqli_stmt_get_result($stmtWorker);
        $rowWorker = mysqli_fetch_assoc($resultWorker);

        if ($rowWorker && $rowWorker['sebagai'] === 'worker') {
            $_SESSION['user'] = $rowWorker;
            header('Location: ../worker/worker_dashboard.php');
            // exit;
        } else {
            echo "Login worker gagal. Periksa email/username dan password Anda atau hubungi administrator.";
        }
    } else {
        echo "Terjadi kesalahan dalam eksekusi query Worker: " . mysqli_error($koneksi);
        // exit;
    }

   
    echo "Login gagal. Periksa email/username dan password Anda atau hubungi administrator.";
}

// ...

// if (isset($_POST["login"])) {
//     $username = $_POST["emailOrUsername"]; // Sesuaikan dengan nama input pada form
//     $password = $_POST["password"];


//     // Query untuk login worker
//     $queryWorker = "SELECT * FROM data_worker WHERE username = '$username'";
//     $resultWorker = mysqli_query($koneksi, $queryWorker);
//     $rowWorker = mysqli_fetch_assoc($resultWorker);

//     // Periksa apakah username ditemukan di tabel admin
//     if ($rowAdmin) {
//         if ($password === $rowAdmin["pw"] && $rowAdmin['sebagai'] === 'admin') {
//             $_SESSION["user"] = $rowAdmin;
//             $_SESSION["search"] = null;
//             header('Location: home.php');
//             exit;
//         } else {
//             echo "
//             <script>
//             alert('Password yang Anda masukkan salah atau Anda bukan admin. Silakan coba lagi.');
//             document.location.href = 'login_admin.php';
//             </script>
//             ";
//         }
//     } elseif ($rowWorker) {
//         // Jika username ditemukan di tabel worker
//         if ($password === $rowWorker["pw"] && $rowWorker['sebagai'] === 'worker') {
//             $_SESSION["user"] = $rowWorker;
//             $_SESSION["search"] = null;
//             header('Location: ../worker/worker_dashboard.php');
//             exit;
//         } else {
//             echo "
//             <script>
//             alert('Password yang Anda masukkan salah atau Anda bukan worker. Silakan coba lagi.');
//             document.location.href = 'login_admin.php';
//             </script>
//             ";
//         }
//     } else {
//         // Jika username tidak ditemukan di kedua tabel
//         echo "
//         <script>
//         alert('Username tidak ditemukan. Silakan cek kembali username Anda.');
//         document.location.href = 'login_admin.php';
//         </script>
//         ";
//     }
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&display=swap">
</head>
<body>
    <div class="container-65">
        <div class="box-login-admin">
                
        
        <div class="box-foto">
                <img src="../image/profile.png" alt="" class="foto-login">
                <span class="title-wave">Welcomeback</span>
            </div>
            <h1 class="aduh">Sign In</h1>
            <form action="" method="post">
                <label for="emailOrUsername">Email/Username:</label>
                <input type="text" id="emailOrUsername" name="emailOrUsername" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" name="login">Login</button>

                <div class="lp-pw">
                    <a href="lupa_pw_admin.php">Lupa Password</a>
                </div>
            </form> 
        </div>
    </div>
</body>
</html>
