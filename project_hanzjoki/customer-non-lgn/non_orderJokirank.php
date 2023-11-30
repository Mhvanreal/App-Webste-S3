

<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One?query=mochiy+ ">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyD8dJQ2W4G1xlCyD4pD9e2n4P7i8PRDj" crossorigin="anonymous">

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

    <div class="content-jokirank">
        <h1 class="nama-joki">Joki Rank</h1>
        <img src="../image/rankpler.png" >
        <h1 class="time">orderan joki di chek<br>pukul 09:00-21:00</h1>
        <h1 class="ket-1">Jika Orderan melewati<br>batas pengecekan <br>orderan, maka orderan<br>dicek di hari berikutnya</h1>

            <div class="ket-2" >
                <h1 class="caraorder">Cara Order :</h1>
                <p class="isi-ket-2">
                    1.Lengkapi data joki dengan teliti <br>
                    2.Pilih jenis Joki yang diinginkan <br>
                    3.masukan jumlah order <br>
                    4.Pilih metode pembayaran <br>
                    5.Masukan No WhatsApp yang benar <br>
                    6.Klik beli & lakukan pembayaran <br>
                    7.order joki akan segera diproses <br> setelah orderan berhasil
                </p>
                <h2 class="ket-3">Estimasi Proses jasa Joki <br> kita usahakan secepatnya</h2>
                <h2 class="ket-4">Minimal 12 jam <br> Maxsimal 2x24 jam </h2>
            </div>
    </div>


    <div class="content-listjoki">
        <h1 class="list-jokian" >Paket Joki Lainnya</h1>
        <section id="joki" class="list-jokian-order">
               
                <div class="img-jokian">
                    <a href="non_orderjokimcl.php">
                            <img src="../image/MCL.png" alt="">
                            <div class="pil-jokirank">Joki MCL <br>(Jasa joki MCL)</div>
                    </a>
                </div>
                <div class="img-jokian">
                    <a href="orderjokimontage.php">
                            <img src="../image/MONTAGE.png" alt="">
                            <div class="pil-jokirank">Joki Vidio Montage <br>(Jasa joki Vidio)</div>
                    </a>
                </div>
                <div class="img-jokian">
                    <a href="orderjokimabar.php">
                            <img src="../image/JASA MABAR.png" alt="">
                            <div class="pil-jokirank">Jasa Mabar <br>(Jasa Mabar Penjoki)</div>
                    </a>
                </div>
                <div class="img-jokian">
                    <a href="non_orderjokiclassic.php">
                            <img src="../image/JOKICLASIK.png" alt="">
                            <div class="pil-jokirank">Joki clasic <br>(Jasa joki Up WinRate)</div>
                    </a>
                </div>
        </section>
    </div>
    <form id="form1" method="POST">
    <div class="box-id-input">
        <div class="card-header">Lengkapi Data</div>
        <div class="left-input">
            <div class="input-container">
                <input type="text" id="input1" name="email_nohp" placeholder="Masukkan Email/No Hp">
            </div>
            <div class="input-container">
                <input type="text" id="input2" name="req_hero" placeholder="Minimal Request 3 Hero">
            </div>
            <div class="input-container">
                <input type="text" id="input3" name="nickname" placeholder="User ID & Nickname">
            </div>
        </div>

        <div class="right-input">
            <div class="input-container">
                <input type="password" id="input4" name="pass" placeholder="Masukkan Password">
            </div>
            <div class="input-container">
                <input type="text" id="input5" name="catatan" placeholder="Catatan untuk Pejoki">
            </div>
            <div class="input-container">
                <select id="input6" name="login_via">
                    <option value="loginvia" disabled selected>Login Via</option>
                    <option value="Montoon">Moonton (Rekomendasi)</option>
                    <option value="Facebook">Facebook</option>
                    <option value="Vk">Vk</option>
                    <option value="TikTok">Tiktok</option>
                </select>
            </div>
        </div>
    </div>
    


    
    <?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hanzjoki";

$koneksi = new mysqli($servername, $username, $password, $dbname);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query untuk mengambil data promo
$sql_promo = "SELECT paket_joki_rank.*, discount.potongan, (paket_joki_rank.harga - discount.potongan) AS hasil
              FROM paket_joki_rank
              LEFT JOIN discount ON paket_joki_rank.nama_discount = discount.nama_discount
              WHERE paket_joki_rank.judul_paket = 'PROMO';";
$result_promo = $koneksi->query($sql_promo);
if ($result_promo === false) {
    die("Error saat mengeksekusi query promo: " . $koneksi->error);
}

// Query untuk mengambil data joki star
$sql_joki_star = "SELECT * FROM paket_joki_rank WHERE judul_paket = 'JOKI/Star'";
$result_joki_star = $koneksi->query($sql_joki_star);
if ($result_joki_star === false) {
    die("Error saat mengeksekusi query joki star: " . $koneksi->error);
}

// Query untuk mengambil data paket murah joki
$sql_murah_joki = "SELECT * FROM paket_joki_rank WHERE judul_paket = 'Paket murah joki'";
$result_murah_joki = $koneksi->query($sql_murah_joki);
if ($result_murah_joki === false) {
    die("Error saat mengeksekusi query paket murah joki: " . $koneksi->error);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/your/bootstrap/css/file.css"> <!-- Sesuaikan path dengan lokasi file CSS Bootstrap -->
    <title>Contoh Joki Rank</title>
</head>
<body>

<div class="container-promo">
    <!-- Promo Joki Rank -->
    <div class="card-header" id="judulPromoRank" style="display: none;">JOKI RANK</div>

    <!-- Promo Joki Rank -->
    <div class="card-header">Pilih Paket Joki</div>
    
    <div class="container-1">
   


    </div>

   <!-- Joki Rank / Star -->
<div class="promo-classic">Joki Rank / Star</div>
<div class="container-1">
    <?php
    // Menampilkan data joki star
    $counter = 0;
    $data_joki_star = $result_joki_star->fetch_all(MYSQLI_ASSOC);
    foreach ($data_joki_star as $row) {
        $background_class = ($counter % 2 == 0) ? 'even-background' : 'odd-background';
        ?>
        <div class="col-md-4 <?= $background_class; ?>" onclick="selectRadio('option<?= $row['id_paket']; ?>', 'harga<?= $row['id_paket']; ?>', '<?= $row['id_paket']; ?>', '<?= number_format($row['harga'], 0, ',', '.'); ?>')">
            <input type="radio" class="btn-check" name="nominal" id="option<?= $row['id_paket']; ?>" autocomplete="on">
            <label class="btn btn-outline-light col-12">
                <div class="row">
                    <div class="col-7 column-font"><?= $row['nama_paket']; ?></div>
                    <div class="col-12">
                        <span id="harga<?= $row['id_paket']; ?>" class="text-warning">
                            <?= number_format($row['harga'], 0, ',', '.'); ?>
                        </span>
                    </div>
                    <div class="col-12">
                        <!-- Additional content as needed -->
                    </div>
                </div>
            </label>
        </div>
        <?php
        $counter++;
    }
    ?>
    </div>

    <!-- Paket Joki Murah -->
    <div class="promo-classic">Paket Joki Murah</div>
    <div class="container-1">
    <?php
// Menampilkan data paket murah joki
$counter = 0;
$data_murah_joki = $result_murah_joki->fetch_all(MYSQLI_ASSOC);
foreach ($data_murah_joki as $row) {
    $background_class = ($counter % 2 == 0) ? 'even-background' : 'odd-background';
    ?>
    <div class="col-md-4 <?= $background_class; ?>" onclick="selectRadio('option<?= $row['id_paket']; ?>', 'harga<?= $row['id_paket']; ?>', '<?= $row['id_paket']; ?>', '<?= number_format($row['harga'], 0, ',', '.'); ?>')">
        <input type="radio" class="btn-check" name="nominal" id="option<?= $row['id_paket']; ?>" autocomplete="on">
        <label class="btn btn-outline-light col-12">
            <div class="row">
                <div class="col-7 column-font"><?= $row['nama_paket']; ?></div>
                <div class="col-12">
                    <span id="harga<?= $row['id_paket']; ?>" class="text-warning">
                        <?= number_format($row['harga'], 0, ',', '.'); ?>
                    </span>
                </div>
                <div class="col-12">
                    <!-- Additional content as needed -->
                </div>
            </div>
        </label>
    </div>
    <?php
    $counter++;
}
?>

    
    </div>
    
    <label for="qtyid" class="ppq"> Jumlah: </label>
        <input type="number" name= "jumlahorder" id="qtyid" oninput="calculateTotal()">
        
    <label for="total" class="ppqmu"> Total: </label>
    <input type="text" class="bro" name= "totaltransbro" id="totaltransbro" readonly>   
    <input type="text" class="menghilang" name= "tanggalnow" id="setdatetime" readonly>
    <input type="text" class="menghilang" name= "pembayaran" id="pembayaranText" readonly>
    <input type="text" class="menghilang" name= "id_paket" id="id_paket" readonly>
    <input type="text" class="menghilang" name= "harga" id="harga" readonly>

  





</div>
<script>
function setDateTime() {
            // Ambil elemen dengan id "setdatetime"
            var setDatetimeElement = document.getElementById('setdatetime');

            // Dapatkan tanggal dan waktu saat ini
            var currentDateTime = new Date();
            
            // Format tanggal dan waktu menjadi string (YYYY-MM-DD HH:mm:ss)
            var formattedDateTime = currentDateTime.toISOString().slice(0, 19).replace("T", " ");

            // Set nilai elemen input dengan tanggal dan waktu saat ini
            setDatetimeElement.value = formattedDateTime;
            }

            // Panggil fungsi setDateTime saat halaman dimuat
            document.addEventListener("DOMContentLoaded", function() {
                setDateTime();
            });
function getQtyFromKeranjang() {
            // Sama seperti sebelumnya

            // ...

                return totalQty;
            }

            function updateHiddenQtyInput() {
                var qtyOrder = getQtyFromKeranjang();
                document.getElementById('hiddenQty').value = qtyOrder;
            }

            // Panggil fungsi ini sebelum mengirimkan formulir
            updateHiddenQtyInput();

            // Fungsi untuk menghitung total baris yang diisi dalam tabel dan memperbarui input jumlahIsiKeranjang
            function updateTotalKeranjang() {
                var table = document.getElementById('keranjangsementara');
                var totalRows = table.rows.length - 1; // Kurangi 1 untuk mengabaikan baris header
                document.getElementById('hiddenQty').value = totalRows;
            }

            // Panggil fungsi saat halaman dimuat atau ketika ada perubahan dalam tabel keranjang
            document.addEventListener('DOMContentLoaded', updateTotalRows);
            document.getElementById('keranjangsementara').addEventListener('input', updateTotalRows);
        
function calculateTotal() {
        // Get the quantity and price values
        var quantity = document.getElementById('qtyid').value;
        var harga = document.getElementById('harga').value;

        // Perform multiplication
        var total = (parseFloat(quantity )) * parseFloat(harga);


        // Update the result display
        document.getElementById('totaltransbro').value = isNaN(total) ? '' : total.toFixed(2);
        }
  
function selectRadio(optionId, hargaId) {
        // Unselect all radio buttons
        var radioButtons = document.getElementsByName('nominal');
        radioButtons.forEach(function (radioButton) {
            radioButton.closest('.col-md-4').classList.remove('selected-background');
            radioButton.checked = false;
        });

        // Extract id_paket from the optionId
        var id_paket = optionId.replace('option', '');

        // Select the clicked radio button
        var selectedRadio = document.getElementById(optionId);
        selectedRadio.checked = true;
        selectedRadio.closest('.col-md-4').classList.toggle('selected-background');

        // Extract the harga from the hargaId
        var harga = parseFloat(document.getElementById(hargaId).textContent.replace(/\./g, '').replace(',', '.'));

        // Log the extracted id_paket and harga to the console (you can modify this as needed)
        console.log('Extracted id_paket:', id_paket);
        console.log('Extracted harga:', harga);

        // Update the text inputs with the extracted values
        document.getElementById('id_paket').value = id_paket;
        document.getElementById('harga').value = harga.toLocaleString();
    }
                                            
function tampilkanTulisan() {
            var pembayaranText = document.getElementById("pembayaranText");
            var danaRadioButton = document.getElementById("dana");
            var ovoRadioButton = document.getElementById("ovo");

            if (danaRadioButton.checked) {
                pembayaranText.value = "DANA";
            } else if (ovoRadioButton.checked) {
                pembayaranText.value = "OVO";
            } else {
                pembayaranText.value = tampilkanTulisan();
            }
            }


</script>
<!-- ============================================================================================================================================================================== -->
<div class="pembayan-metode">
<div class="card-header">
Pilih Metode Pembayaran
    </div>
        <div class="card-body text-white">
            <div class="row g-3">
        <h6 class="ppw">E- Wallet</h6>
    <div class="col-md-3" width = "100px">
<input type="radio" id="dana" name="metode_pembayaran" onclick="tampilkanTulisan()">
    <label class="col-12 btn btn-outline-light" for="dana">
        <div class="row">
            <div class="col"><img src="../image/dana.png" width="100px" height="100px" alt=""></div>
        </div>
    </label>
</div>
    <div class="col-md-3">
        <input type="radio" id="ovo" name="metode_pembayaran" onclick="tampilkanTulisan()">
            <label class="col-12 btn btn-outline-light" for="ovo">
                <div class="row">
            <div class="col"><img src="../image/ovo.png" width="100px" height="70px" alt=""></div>
        </div>
    </label>
</div>





        </div>
            <label for="qtyid" class="ppq"> Masukan No WhatsApp: </label>
                <input type="number" name= "whatsappBro" id="noWhatsApp" required>
        </div>
<div class="buy-or">
    <!-- ... (elemen formulir lainnya) ... -->
        <button class="payment-button"  type="submit" name="ORDERNOWWW">
            <img src="../image/cart.png" alt="Payment Image" class="payment-image" id="orderImage">
                <div class="payment-content">
            <h3 class="payment-title">Order Now</h3>
        </div>
    </button>
 </div>
</form>
</div>
<style>
    input[type="radio"] {
         display: none;
    }
</style>
</body>
</html>


<?php

// Memeriksa apakah form telah disubmit
if (isset($_POST["ORDERNOWWW"])) {
    // Memanggil fungsi transaksi dengan data yang diterima dari form
    session_start();
    $result = transaksi($_POST);
    
    if ($result > 0) {
        echo "
            <script>
            alert('DATA BERHASIL DI TAMBAHKAN');
            document.location.href = 'non_struk_customer_done.php';
            </script>
        ";
    } else {
        // Menangani jika terjadi kesalahan saat menjalankan fungsi transaksi
        echo "
            <script>
            alert('GAGAL MENAMBAHKAN DATA');
            </script>
        ";
    }
}

// Mendefinisikan fungsi transaksi
function transaksi($data) {
    global $koneksi;

    // Extract data from $data array
    $login_via = $data['login_via'];
    $req_hero = $data['req_hero'];
    $email_nohp = $data['email_nohp'];
    $nickname = $data['nickname'];
    $pass = $data['pass'];
    $catatan = $data['catatan'];
    $qty_order = $data['jumlahorder'];
    $tgl_order = $data['tanggalnow'];
    $total_transaksi = $data['totaltransbro'];
    $payment = $data['pembayaran'];
    $no_wa = $data['whatsappBro'];
    $id_paket = $data['id_paket'];
    $qty = $data['jumlahorder'];
    $harga = $data['harga']; // Corrected variable name

    $sqldata = "INSERT INTO data_akun (id_data_akun, login_via, email_nohp, req_hero, nick_id, pw, catatan)
            VALUES ('', '$login_via', '$email_nohp', '$req_hero', '$nickname', '$pass', '$catatan')";
    if (!mysqli_query($koneksi, $sqldata)) {
        die("Error in SQL query: " . mysqli_error($koneksi));
    }

    // Get id_data_akun
    $result = mysqli_query($koneksi, "SELECT id_data_akun FROM data_akun WHERE email_nohp = '$email_nohp'");
    if (!$result) {
        die("Error in SQL query: " . mysqli_error($koneksi));
    }

    // Pemeriksaan hasil query
    if ($row = mysqli_fetch_assoc($result)) {
        $id_akun = $row['id_data_akun'];

        // Insert transaksi
        $sqltran = "INSERT INTO transaksi (id_transaksi, id_customer, id_worker, id_data_akun, qty_order, tgl_order,
            total_transaksi, payment, no_wa, stats, bukti_tf, laporan_ss, statsdone)
            VALUES ('', Null, NULL, '$id_akun', '$qty_order', '$tgl_order', '$total_transaksi', '$payment', '$no_wa', 'Belum Lunas', NULL, NULL, 'Undertake')";
        if (!mysqli_query($koneksi, $sqltran)) {
            die("Error in SQL query: " . mysqli_error($koneksi));
        }

        // Get id_transaksi
        $result = mysqli_query($koneksi, "SELECT id_transaksi FROM transaksi WHERE tgl_order = '$tgl_order'");
        if ($row = mysqli_fetch_assoc($result)) {
            $id_transaksi = $row['id_transaksi']; // Mengisi nilai id_transaksi
    
            // Insert detail_transaksi
            $sqldetail = "INSERT INTO detail_transaksi (id_transaksi, id_paket, qty, subtotal) VALUES ('$id_transaksi', '$id_paket', '$qty', '$total_transaksi')";
            if (!mysqli_query($koneksi, $sqldetail)) {
                die("Error in SQL query: " . mysqli_error($koneksi));
            }
    
            // Menyimpan id_transaksi dalam sesi
            $_SESSION['id_transaksi'] = $id_transaksi;
    
            return mysqli_affected_rows($koneksi);
        }
    }

    // Handle ketika id_data_akun tidak ditemukan
    die("ID Data Akun not found for email_nohp: $email_nohp");
}
?>
