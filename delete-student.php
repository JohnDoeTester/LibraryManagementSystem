<?php
require('dbconnect.php');
$student_id = $_GET['id'];

if (isset($_GET['id'])) {


    $sql = "DELETE FROM student WHERE student_id = $student_id";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {

        echo "
    <script>
    alert('Student deleted')
    </script>";
        $_SESSION['delete'] =  "
    <script>
    alert('Student deleted')
    </script>";
        header('location: students.php');
    } else {
        echo "DELETION FAILED";
    }
}
