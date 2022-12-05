<?php
include 'dbconnect.php';
$output = '';
if (isset($_POST["query"])) {
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "SELECT * FROM books
	WHERE title LIKE '%" . $search . "%' 
	OR author LIKE '%" . $search . "%' 
	OR publisher LIKE '%" . $search . "%' 
	OR year LIKE '%" . $search . "%' 
	OR category LIKE '%" . $search . "%'
	";
} else {
	$query = "SELECT * FROM books";
}
$result = mysqli_query($conn, $query);
if ($result == TRUE) {

	$count = mysqli_num_rows($result);
	if ($count > 0) {
		$output .= '<div class="table-responsive">
					<table class="table table-bordered table-striped">
					<thead>
						<tr>
						
							<th>Book Title</th>
							<th>Author</th>
							<th>Publisher</th>
							<th>Published Year</th>
							<th>Category</th>
							<th>Actions</th>
						</tr>
						</thead>
                        <tbody>';

		while ($rows = mysqli_fetch_assoc($result)) {

			$book_id = $rows['book_id'];
			$title = $rows['title'];
			$author = $rows['author'];
			$publisher = $rows['publisher'];
			$year = $rows['year'];
			$category = $rows['category'];

			$output .= '
			<tr>
			
				<td>' . $title . '</td>
				<td>' . $author . '</td>
				<td>' . $publisher . '</td>
				<td>' . $year . '</td>
				<td>' . $category . '</td>
				<td>
				<a href="update-book.php?id=' . $book_id . '" class="btn btn-success btn-sm"> Update</a>
				<a href="delete-book.php?id=' . $book_id . '" class="btn btn-danger btn-sm">Delete</a>
			</td>
			</tr>
		';
		}
		$output .= "</tbody>";
		echo $output;
	} else {
		echo 'Data Not Found';
	}
}
