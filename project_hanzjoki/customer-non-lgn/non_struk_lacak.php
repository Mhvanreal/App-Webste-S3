<?php
session_start();
// Cek apakah pengguna sudah login
if (!isset($_SESSION['id_transaksi'])) {
    // Jika tidak, mungkin redirect ke halaman login atau tindakan lainnya
    header('Location: nonlgn_lacakorderan.php');
    exit;
}

// Mengakses informasi pengguna yang login
$id_transaksi = $_SESSION['id_transaksi'];

// Sertakan file koneksi.php
require('../koneksi.php');

// Query untuk mendapatkan data transaksi berdasarkan id_transaksi
$query_trans = "SELECT * FROM data_akun 
    JOIN transaksi ON data_akun.id_data_akun = transaksi.id_data_akun 
    JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi
    JOIN paket_joki_rank ON detail_transaksi.id_paket = paket_joki_rank.id_paket
    JOIN discount ON discount.nama_discount = discount.nama_discount
    GROUP BY transaksi.id_transaksi HAVING transaksi.id_transaksi = '$id_transaksi'";

$result_trans = mysqli_query($koneksi, $query_trans);

if (!$result_trans) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// Ambil data transaksi
$row_trans = mysqli_fetch_assoc($result_trans);

// Query untuk mendapatkan data detail transaksi berdasarkan id_transaksi
$query_detail = "SELECT * FROM detail_transaksi WHERE id_transaksi = '$id_transaksi'";
$result_detail = mysqli_query($koneksi, $query_detail);

if (!$result_detail) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// Ambil data detail transaksi
$row_detail = mysqli_fetch_assoc($result_detail);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One?query=mochiy+ ">
    <style>

        

        @media only screen and (max-width: 1600px) {
            /* Sesuaikan gaya untuk perangkat dengan lebar maksimum 600px */
            .thank {
                font-size: 18px;
            }
        }
    </style>
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
            <a href="../register.php">Daftar Sekarang</a>
            <a href="../login.php">Masuk</a>
        </nav>
        </header>



        
                

<div class="body-struk">
<!-- ====================================================================================================================== -->
<!-- ====================================================================================================================== -->
            <h1 class="thank">Terima Kasih!</h1>
            <h1 class="thank2"> Transaksi Sudah Selesai. </h1>
            <div class="id_pesanan1">Pesanan kamu <?php echo $id_transaksi; ?> Telah dikirim dan akan segera tiba.</div>
            <div class="tgl-pemesanan1">Transaksi dibuat pada </div>
            
            <!-- Garis horizontal -->   
            <hr class="horizontal-line">
            <div class="body-rt">
                <div class="rt-1">
                        <div class="via-login">
                        <div class="via1">DATA AKUN</div>
                        <div class="via1">Login Via</div>
                        <div class="via1">User ID & NickName </div>
                        <div class="via1">Email/No Hp </div>
                        <div class="via1">Password </div>
                        <div class="via1">Request Hero </div>
                        <div class="via1">Catatan para pejoki </div> <br>
                        <div class="via1">JENIS ORDER </div>
                        <div class="via1">Paket </div>
                        <div class="via1">Orderan </div>
                        <div class="via1">Jumlah </div>
                        <div class="via1">Harga </div>
                        <div class="via1">Total </div>
                        <div class="via1">Discount </div>
                        <div class="via1">Potongan </div>

                        
                    </div>
                    <div class="data-akuncst"> 
                    <div class="id_pesanan1"> </div> <br>
    <div class="id_pesanan1"> : <?php echo $row_trans ["login_via"]?></div>
    <div class="id_pesanan1"> : <?php echo $row_trans ["nick_id"]?></div>
    <div class="id_pesanan1"> : <?php echo $row_trans ["email_nohp"]?></div>
    <div class="id_pesanan1"> : <?php echo $row_trans ["pw"]?></div>
    <div class="id_pesanan1"> : <?php echo $row_trans ["req_hero"]?></div>
    <div class="id_pesanan1"> : <?php echo $row_trans ["catatan"]?></div>
    <div class="id_pesanan1"> </div> <br> <br>
    <div class="id_pesanan1"> : <?php echo $row_trans ["judul_paket"]?></div>
    <div class="id_pesanan1"> : <?php echo $row_trans ["nama_paket"]?></div>
    <div class="id_pesanan1"> : <?php echo $row_trans ["qty_order"]?></div>
    <div class="id_pesanan1"> : <?php echo $row_trans ["harga"]?></div>
    <div class="id_pesanan1"> : <?php echo $row_trans ["total_transaksi"]?></div>
    <div class="id_pesanan1"> : <?php echo $row_trans ["nama_discount"]?></div>
    <div class="id_pesanan1"> : <?php echo $row_trans ["potongan"]?></div>
    
                    </div>        
                            
                    </div>
                    
                    
                                <div class="rt-2">
                                    <div class="metod-pembayaran">Metode Pembayaran : <?php echo $row_trans ["login_via"]?></div>
                                    
                                    <hr class="horizontal-line1">  
                                    <div class="rt-3"> 
                                    <div class="nomor-invoice1" >Nomor Invoice <?php echo $row_trans ["id_transaksi"]?> </div>
                                    <div class="stats-transaksi">Status Transaksi <?php echo $row_trans ["stats"]?></div>
                                    <div class="pembayaran-status">Status Pengerjaan <?php echo $row_trans ["statsdone"]?></div>  
                                    
            </div>
            
            


            <a href="nonlgnberanda.php" class="pesan-button">Beli Lagi</a>
            
            </div>
            
            </div>
            </div>
            
                                


                                        
                                    </div>
                                    
                                    </div>  
 
                                    </div>
                 
                                    
                   
                            













</body>
</html>