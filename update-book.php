<?php
include('format/header.php');
include('format/sidebar.php');
?>

<div class="container">
    <br>
    <h1 class="text-center">Update Book</h1>
    <br>
    <?php

    $book_id = $_GET['id'];

    $sql = "SELECT * FROM books WHERE book_id = $book_id";

    $res = mysqli_query($conn, $sql);


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
        } else {
            echo "<h1> no</h1>";
        }
    }

    ?>
    <form action="" method="post">
        <table class="table table-bordered table-striped">
            <tr>
                <th scope="row">Title:</th>
                <td>
                    <input type="text" name="title" value="<?= $title ?>" class="form-control">
                </td>
            </tr>
            <tr>
                <th scope="row">Author:</th>
                <td>
                    <input type=" text" name="author" value="<?= $author ?>" class="form-control">
                </td>
            </tr>
            <tr>
                <th scope="row">Publisher:</th>
                <td>
                    <input type=" text" name="publisher" value="<?= $publisher ?>" class="form-control">
                </td>
            </tr>
            <tr>
                <th scope="row">Published Year:</th>
                <td>
                    <input type=" text" name="year" value="<?= $year ?>" class="form-control">
                </td>
            </tr>
            <tr>
                <th scope="row">Category:</th>
                <td>
                    <input type=" text" name="category" value="<?= $category ?>" class="form-control">
                </td>
            </tr>

        </table>
        <input type="hidden" name="book_id" value="<?= $book_id; ?>">
        <br>
        <div class="text-center">
            <input type="submit" name="submit" value="Save Changes" class="btn-secondary btn-lg">
        </div>
    </form>

</div>

<?php


if (isset($_POST['submit'])) {
    // get data from form

    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = ($_POST['publisher']);
    $year = $_POST['year'];
    $category = $_POST['category'];

    // sql query to save data to database
    $sql = "UPDATE books SET
                title = '$title',
                author = '$author',
                publisher = '$publisher',
                year = '$year',
                category = '$category'
                WHERE book_id = '$book_id'
                ";

    $res = mysqli_query($conn, $sql);


    if ($res == TRUE) {

        echo "<script> alert('Book Update Successful') 
            window.location.href='home.php'</script>";
    } else {



        echo "<script> alert('Book Update Failed')
        window.location.href='home.php'</script";
    }
}


include('format/footer.php');
?>