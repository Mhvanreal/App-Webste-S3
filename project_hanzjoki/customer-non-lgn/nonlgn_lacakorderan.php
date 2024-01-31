<?php
// Menggunakan file koneksi.php yang berisi konfigurasi koneksi ke database
require('../koneksi.php');

// Memulai sesi untuk pengelolaan data sesi
session_start();

// Mengecek apakah form lakukan pelacakan dikirimkan (dengan mengecek variabel POST 'lacak')
if (isset($_POST['lacak'])) {
    // Mengambil nilai ID transaksi dari formulir yang dikirimkan
    $id_transaksi = $_POST['id_transaksi'];

    // Mengecek apakah ID transaksi kosong atau tidak diisi dengan benar
    if (empty(trim($id_transaksi))) {
        // Menetapkan pesan kesalahan ke dalam sesi dan mengarahkan ke halaman nonlgn_lacakorderan.php
        $_SESSION['error'] = 'ID TRANSAKSI ANDA HARUS DIISI DENGAN BENAR!';
        header('Location: nonlgn_lacakorderan.php');
        exit;
    }

    // Menggunakan kueri bersiap untuk mencegah SQL Injection
    $query = "SELECT * FROM transaksi WHERE id_transaksi = ?";
    $stmt = mysqli_prepare($koneksi, $query);

    // Mengecek apakah kueri berhasil disiapkan
    if (!$stmt) {
        // Menetapkan pesan kesalahan ke dalam sesi dan mengarahkan ke halaman nonlgn_lacakorderan.php
        $_SESSION['error'] = 'Terjadi kesalahan dalam query!';
        header('Location: nonlgn_lacakorderan.php');
        exit;
    }

    // Membind parameter pada statement kueri
    mysqli_stmt_bind_param($stmt, 's', $id_transaksi);
    
    // Mengeksekusi statement kueri
    mysqli_stmt_execute($stmt);
    
    // Mendapatkan hasil dari statement kueri
    $result = mysqli_stmt_get_result($stmt);

    // Mengecek apakah eksekusi kueri berhasil
    if (!$result) {
        // Menetapkan pesan kesalahan ke dalam sesi dan mengarahkan ke halaman nonlgn_lacakorderan.php
        $_SESSION['error'] = 'Terjadi kesalahan dalam eksekusi query!';
        header('Location: nonlgn_lacakorderan.php');
        exit;
    }

    // Mengambil satu baris hasil sebagai asosiatif array
    $row = mysqli_fetch_assoc($result);

    // Menghitung jumlah baris hasil
    $num = mysqli_num_rows($result);

    // Mengecek apakah ditemukan tepat satu baris (ID transaksi valid)
    if ($num == 1) {
        // Menyimpan informasi ID transaksi yang valid dalam sesi
        $_SESSION['id_transaksi'] = $row['id_transaksi'];

        // Mengarahkan langsung ke halaman non_struk_customer_done.php karena ID transaksi valid
        header('Location: nonlgn_lacakorderan.php');
        exit;
    } else {
        // Menetapkan pesan kesalahan ke dalam sesi dan mengarahkan ke halaman nonlgn_lacakorderan.php
        $_SESSION['error'] = 'Harap masukkan ID TRANSAKSI dengan benar!';
        header('Location: nonlgn_lacakorderan.php');
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
    <title>Lacak Orderan</title>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One?query=mochiy+ ">

</head>
<body>
        <header>
            <div class="container"> 
                <h2 class="logo">
                    <img src="../image/LOGO HANZJOKI.png" alt="LOGO" style="width:150px; height:auto; ">
                </h2>
                  
        
                <nav class="navigation3">
            
            <a href="nonlgnberanda.php">
                <span class="link-text">Beranda</span>
            </a>
            <a href="nonlgn_lacakorderan.php" style="text-decoration: none; color: #06D85F;">
                <span class="link-text">Lacak Orderan</span>
            </a>
            <a href="nonlgn_hubungikami.php">
                <span class="link-text">Hubungi Kami</span>
            </a>
            <a href="nonlgn_calculator.php">
                <span class="link-text">Calculator Ml</span>
            </a>
        </nav>
              
            </div>
            <nav class="navigation2">
        <a href="../admin/register_customer.php">Daftar Sekarang</a>
        <a href="../admin/logindulu.php">Masuk</a>
    </nav>
            
    </header>   
    <div class="background-3">
        <p class="textbg-3">Lacak Orderan</p>
        <label class="label-order1">Lacak Orderan kamu hanya dengan email atau nomor invoice</label>

        <form method="post" action="">
    <input type="text" id="orderTrackingInput" name="id_transaksi" class="input-orderan" placeholder="   email/invoice" required>
    <button type="submit" id="submit" class="button-orderan" name="lacak">Lacak Orderan</button>
</form>
        
        <p class="textbg-4">Pesanan kamu tidak terdaftar meskipun kamu yakin sudah memesan? Harap tunggu 1-2 jam </p>
        <p class="textbg-5">Namun jika pesanan masih tidak muncul maka kamu dapat menghubungi kami <a href="https://www.instagram.com/hanzjoki.id/?igshid=NzZlODBkYWE4Ng%3D%3D&utm_source=qr" target="_blank">disini</a></p>
    </div>


        
    <footer>
        <section class="tentang" id="tentang">
            <div class="card">
                <h1>TENTANG KAMI</h1>
                <br>
                <p>
                    <a href="../admin/aboutus.php" class="title">HANZJOKI</a> Hanz Joki adalah sebuah aplikasi yang didesain khusus untuk layanan Joki (boosting) untuk game MLBB.
                    <br>  Aplikasi ini juga menyediakan 
                    layanan joki MLBB dimana pemain dapat membayar untuk meningkatkan peringkat atau 
                </br>kemampuan mereka dalam permainan tersebut. 
                </p>
            </div>
        </section>
        <div class="sosmed">
            <h1>SOSIAL MEDIA</h1>
            <a href="https://instagram.com/wrzeno_" target="_blank" rel="noopener noreferrer"><img src="../image/ig.png" alt=""></a>
            <a href="http://" target="_blank" rel="noopener noreferrer"><img src="../image/fb.png" alt=""></a>
            <a href="http://" target="_blank" rel="noopener noreferrer"><img src="../image/twitter.png" alt=""></a>
            <a href="http://" target="_blank" rel="noopener noreferrer"><img src="../image/wa.png" alt=""></a>
            
        </div>
    </footer>
    <div id="copyright">
        &copy;2022 HANZJOKI
    </div>
    

</body>
</html>