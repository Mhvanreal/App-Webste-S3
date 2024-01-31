<?php 

if (isset($_SESSION['user'])) {
    header("Location: admin/home.php");
} else {
    header("Location: admin/login_admin.php");
}

?>