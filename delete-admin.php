<?php
require('dbconnect.php');
$admin_id = $_GET['id'];

if (isset($_GET['id'])) {


    $sql = "DELETE FROM admin WHERE admin_id = $admin_id";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {

        echo "
    <script>
    alert('Admin deleted')
    </script>";
        $_SESSION['delete'] =  "
    <script>
    alert('Admin deleted')
    </script>";
        header('location: admin.php');
    } else {
        echo "DELETION FAILED";
    }
}
