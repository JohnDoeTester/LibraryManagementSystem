<?php
include('format/header.php');
include('format/sidebar.php');
?>

<?php
$tran_id = $_GET['id'];

$sql = "SELECT * FROM transaction
WHERE tran_id = '$tran_id' AND status = 'borrowed'";

$res = mysqli_query($conn, $sql);
if ($res == true) {

    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $rows = mysqli_fetch_assoc($res);

        $tran_id = $rows['tran_id'];
        $book_id = $rows['book_id'];
        $student_id = $rows['student_id'];
        $date_borrowed = $rows['date_borrowed'];
        $date_due = $rows['date_due'];



        if (isset($student_id)) {

            $studentsql = "SELECT * FROM student WHERE student_id = $student_id";

            $res = mysqli_query($conn, $studentsql);


            if ($res == true) {

                $count = mysqli_num_rows($res);
                if ($count == 1) {
                    $row = mysqli_fetch_assoc($res);
                    $student_id = $row['student_id'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $course = $row['course'];
                    $section = $row['section'];
                }
            }
        }
        if (isset($book_id)) {
            $booksql = "SELECT * FROM books WHERE book_id = $book_id";

            $res = mysqli_query($conn, $booksql);


            if ($res == true) {

                $count = mysqli_num_rows($res);
                if ($count == 1) {
                    $row = mysqli_fetch_assoc($res);
                    $book_id = $row['book_id'];
                    $title = $row['title'];
                    $author = $row['author'];
                    $publisher = $row['publisher'];
                    $year = $row['year'];
                    $category = $row['category'];
                }
            }
        }
    } else {
        echo "ERROR! NO INFO" . mysqli_error($conn);
    }
}

?>

<div class="container-fluid">
    <br>
    <h1 class="text-center">Transaction Details</h1>
    <br>
    <div class="row">
        <div class="col">
            <form action="" method="POST">
                <br>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Borrowed Date:</th>
                        <td><?php echo $date_borrowed  ?> </td>
                    </tr>
                    <tr>
                        <th>Returned Date:</th>
                        <td> </td>
                    </tr>
                    <tr>
                        <th>Student No:</th>
                        <td><?php echo $student_id  ?> </td>
                    </tr>
                    <tr>
                        <th>Student First Name: </th>
                        <td><?php echo $firstname  ?> </td>
                    </tr>
                    <tr>
                        <th>Student Last Name: </th>
                        <td><?php echo $lastname  ?> </td>
                    </tr>
                    <tr>
                        <th>Course: </th>
                        <td><?php echo $course  ?> </td>
                    </tr>
                    <tr>
                        <th>Section: </th>
                        <td><?php echo $section  ?> </td>
                    </tr>
                </table>
        </div>
        <div class="col">

            <br>

            <table class="table table-bordered table-striped">
                <tr>
                    <th>Due Date:</th>
                    <td><?php echo $date_due  ?> </td>
                </tr>
                <tr>
                    <th>Book No:</th>
                    <td><?php echo $book_id  ?> </td>
                </tr>
                <tr>
                    <th>Title:</th>
                    <td><?php echo $title  ?> </td>
                </tr>
                <tr>
                    <th>Author:</th>
                    <td><?php echo $author  ?> </td>
                </tr>
                <tr>
                    <th>Publisher:</th>
                    <td><?php echo $publisher  ?> </td>
                </tr>
                <tr>
                    <th>Published Year:</th>
                    <td><?php echo $year  ?> </td>
                </tr>
                <tr>
                    <th>Category:</th>
                    <td><?php echo $category  ?></td>
                </tr>
            </table>
        </div>
    </div>
    </form>
</div>

</div>
<?php include('format/footer.php'); ?>