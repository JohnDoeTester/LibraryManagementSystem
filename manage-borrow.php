<?php
include 'dbconnect.php';
$output = '';
if (isset($_POST["query"])) {
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "SELECT * FROM transaction
	WHERE book_id LIKE '%" . $search . "%' 
	OR student_id LIKE '%" . $search . "%' 
	OR date_borrowed LIKE '%" . $search . "%' 
	OR date_due LIKE '%" . $search . "%' 
	";
} else {
	$query = "SELECT * FROM transaction where status = 'borrowed'";
}
$result = mysqli_query($conn, $query);
if ($result == TRUE) {
	$count = mysqli_num_rows($result);
	if ($count > 0) {
		$output .= '<div class="table-responsive">
					<table class="table table-bordered table-striped">
					<thead>
						<tr>
						
							<th>Book ID</th>
							<th>Student ID</th>
							<th>Date Borrowed</th>
							<th>Date Due</th>
                            <th>Action</th>
						</tr>
						</thead>
                        <tbody>';
		while ($rows = mysqli_fetch_assoc($result)) {

			$tran_id = $rows['tran_id'];
			$book_id = $rows['book_id'];
			$student_id = $rows['student_id'];
			$date_borrowed = $rows['date_borrowed'];
			$date_due = $rows['date_due'];
			$output .= '
			<tr>	
				<td>' . $book_id  . '</td>
				<td>' . $student_id . '</td>
				<td>' . $date_borrowed . '</td>
				<td>' . $date_due . '</td>
				<td>
				<a href="details-borrow.php?id=' . $tran_id . '" class="btn btn-success btn-sm"> Details</a>
				<a href="return-book.php?id=' . $tran_id . '" class="btn btn-danger btn-sm">Return</a>
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
