<?php
session_start();
session_destroy(); // Menghancurkan semua data sesi

// Redirect ke halaman login setelah logout
header('Location: login_admin.php');
exit;
?>
