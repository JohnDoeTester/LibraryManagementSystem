<?php
require('dbconnect.php');
$book_id = $_GET['id'];

if (isset($_GET['id'])) {


    $sql = "DELETE FROM books WHERE book_id = $book_id";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {

        echo "
    <script>
    alert('Book deleted')
    </script>";
        $_SESSION['delete'] =  "
    <script>
    alert('Book deleted')
    </script>";
        header('location: home.php');
    } else {
        echo "DELETION FAILED";
    }
}
