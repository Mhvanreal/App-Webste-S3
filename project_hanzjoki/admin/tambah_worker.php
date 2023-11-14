
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" /> 
        <title>Tambah-worker Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/style3.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">HanzStore</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="home.php">
                                    <img src="../image/icons8-dashboard-48.png" alt="" >
                                    <span class="jdl-konten-2">Dashboard</span>
                            </a>
                            <a class="nav-link" href="tambah_worker.php"  style=" background-color: #FF9900; height: 50px;">
                                    <img src="../image/icons8-worker-50.png" alt="">
                                    <span class="jdl-konten-2">Worker</span>
                            </a>
                            <a class="nav-link" href="tables.html">
                                    <img src="../image/CUstomer.png" alt="">
                                    <span class="jdl-konten-2">Custemer</span>
                            </a>
                            <a class="nav-link" href="tables.html">
                                    <img src="../image/icons8-shopping-cart-64.png" alt="">
                                    <span class="jdl-konten-2">Orderan</span>
                            </a>
                            <a class="nav-link" href="tables.html">
                                    <img src="../image/icons8-game-controller-64.png" alt="">
                                    <span class="jdl-konten-2">Joki</span>
                            </a>
                            <a class="nav-link" href="tables.html">
                                <img src="../image/icons8-history-24.png" alt="">
                                <span class="jdl-konten-2">History</span>
                            </a>
                                       
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        HanzStore
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Selamat Datang </h1>
                        <!-- <?php echo $email; ?> -->
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Worker</li>
                        </ol>
                       

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Table Data Worker
                            </div>
                            <div class="card-body">
                                        <div class="search-container mb-3">
                                <label for="searchInput" class="form-label visually-hidden">Search:</label>
                                <input type="text" id="searchInput" class="form-control" placeholder="Search...">
                                                </div>

                                <table id="datatablesSimple" class="custom-table">
                                    
                                    <thead>
                                        <tr>
                                        <th>ID</th>
                                        <th>NIK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nomor WA</th>
                                        <th>Email</th>
                                        <th>Pangkat</th>
                                        <th>Role Utama</th>
                                        <th>Sebagai</th>
                                        <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                        $koneksi = new mysqli("localhost", "root", "", "jokihanz");
                                        if ($koneksi->connect_error) {
                                            die("Connection failed: " . $koneksi->connect_error);   
                                        }

                                        $sql = "SELECT id_worker, NIK, `nama_lengkap`, alamat, jenis_kelamin, email, pangkat, Role_utama, sebagai, no_wa FROM data_admin_worker";
                                        $result = $koneksi->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                        <td>" . $row["id_worker"] . "</td>
                                                        <td>" . $row["NIK"] . "</td>
                                                        <td>" . $row["nama_lengkap"] . "</td>
                                                        <td>" . $row["alamat"] . "</td>
                                                        <td>" . $row["jenis_kelamin"] . "</td>
                                                        <td>" . $row["no_wa"] . "</td>
                                                        <td>" . $row["email"] . "</td>
                                                        <td>" . $row["pangkat"] . "</td>
                                                        <td>" . $row["Role_utama"] . "</td>
                                                        <td>" . $row["sebagai"] . "</td>
                                                        <td>
                                                        <a href='form_edit.php?id=" . $row['id_worker'] . "' class='btn btn-info'>Edit</a>
                                                        <a href='hapus.php?id_worker=" . $row['id_worker'] . "' class='btn btn-danger'>Hapus</a>
                                                        <a href='detail_worker.php?id=" . $row['id_worker'] . "' class='btn btn-info'>detail</a>
                                                        </td>
                                                    </tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='10'>0 result</td></tr>";
                                        }

                                        $koneksi->close();
                                    ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>