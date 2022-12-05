<?php
include 'dbconnect.php';
$output = '';
if (isset($_POST["query"])) {
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "SELECT * FROM student
	WHERE firstname LIKE '%" . $search . "%' 
	OR lastname LIKE '%" . $search . "%' 
	OR course LIKE '%" . $search . "%' 
	OR section LIKE '%" . $search . "%' 
	";
} else {
	$query = "SELECT * FROM student";
}
$result = mysqli_query($conn, $query);
if ($result == TRUE) {

	$count = mysqli_num_rows($result);
	if ($count > 0) {

		$output .= '<div class="table-responsive">
					<table class="table table-bordered table-striped">
					<thead>
						<tr>					
							<th>First Name</th>
							<th>Last Name</th>
							<th>Course</th>
							<th>Section</th>
                            <th>Actions</th>
						</tr>
						</thead>
                        <tbody>';

		while ($rows = mysqli_fetch_assoc($result)) {

			$student_id = $rows['student_id'];
			$firstname = $rows['firstname'];
			$lastname = $rows['lastname'];
			$course = $rows['course'];
			$section = $rows['section'];

			$output .= '
			<tr>
			
				<td>' . $firstname . '</td>
				<td>' . $lastname . '</td>
				<td>' . $course . '</td>
				<td>' . $section . '</td>

				<td>
				<a href="update-student.php?id=' . $student_id . '" class="btn btn-success btn-sm"> Update</a>
				<a href="delete-student.php?id=' . $student_id . '" class="btn btn-danger btn-sm">Delete</a>
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
