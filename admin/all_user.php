<?php
	include './include/header.php';
?>
<section id="content">
	<?php delete_user(); change_to_subscriber();  change_to_admin(); ?>

	<?php

				global $conn;

				$sql = "SELECT * FROM registration order by id asc";
				$result = $conn->query($sql);

				if (!$result) {
					die("Query failed" . mysqli_error($conn));
				}

				?>
				<div id="post_table">
					<table>
					<?php
					echo '<tr>
						    <th>Id</th>
						    <th>Firstname</th>
						    <th>Lastname</th>
						    <th>Username</th>
						    <th>Role</th>
						    <th>Email</th>
						  </tr>';
						  $num = 0;

						  foreach ($result as $row) {
						  	$num++;
						  	$user_id = $row['id'];
						  	$firstname = $row['firstname'];
						  	$lastname = $row['lastname'];
						  	$username = $row['username'];
						  	$user_role = $row['user_role'];
						  	$email = $row['email'];

						  	echo '<tr>
						    <td>'.$num.'</td>
						    <td>'.$firstname.'</td>
						    <td>'.$lastname.'</td>
						    <td>'.$username.'</td>
						    <td>'.$user_role.'</td>
						    <td>'.$email.'</td>
						    <td><a href="all_user.php?change_to_admin='.$user_id.'">Make admin</a></td>
						    <td><a href="all_user.php?change_to_subscriber='.$user_id.'">Make subscriber</a></td>
						    <td><a href="all_user.php?deleteuser='.$user_id.'">Delete</a></td>
						    <td><a href="edit_user.php?edit='.$user_id.'">Edit</a></td>
						  </tr>';
						  } ?>

					</table>
</section>

<script src='js/jquery.js'></script>
<script src='js/script.js'></script>

</body>
</html>