<?php
include 'dbconnect.php';
$output = '';
if (isset($_POST["query"])) {
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "SELECT * FROM admin
	WHERE firstname LIKE '%" . $search . "%' 
	OR lastname LIKE '%" . $search . "%' 
	OR username LIKE '%" . $search . "%' 
	";
} else {
	$query = "SELECT * FROM admin";
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
							<th>Username</th>
							<th>Actions</th>
						</tr>
						</thead>
                        <tbody>';

		while ($rows = mysqli_fetch_assoc($result)) {

			$admin_id = $rows['admin_id'];
			$firstname = $rows['firstname'];
			$lastname = $rows['lastname'];
			$username = $rows['username'];
			$password = $rows['password'];

			$output .= '
			<tr>
			
				<td>' . $firstname . '</td>
				<td>' . $lastname . '</td>
				<td>' . $username . '</td>
				<td>
				<a href="update-admin.php?id=' . $admin_id . '" class="btn btn-success btn-sm"> Update</a>
				<a href="delete-admin.php?id=' . $admin_id . '" class="btn btn-danger btn-sm">Delete</a>
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
