<?php
$item_id = isset($_GET['id']) ? $_GET['id'] : null;
$year_month = isset($_GET['month']) ? $_GET['month'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$entries_per_page = 3;

$conn = new mysqli('localhost','test','fullstack','fullstack'); // Here your database 
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$selection = "";

// Single item
if(is_numeric($item_id)){
	$selection = 'WHERE id=' . $item_id; 
}

// Month
if(strlen($year_month) > 0){
	list($year,$month) = explode('-',$year_month);
	$selection = 'WHERE month(date)=' . $month . ' AND year(date)=' . $year; 
}

$all_entries = $conn->query("SELECT * FROM blog_entries " . $selection);
$entries = $conn->query("SELECT * FROM blog_entries " . $selection . " LIMIT " . 
	($page-1)*$entries_per_page . ", " . $entries_per_page);


?>
<!doctype html>
<html>
	<head>
			<title>Blog create</title>
			<!-- Remember to include jQuery :) -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

			<!-- jQuery Modal -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	</head>
	<body>
		<h2>Blog</h2>
		<?php
			if($entries && $entries->num_rows > 0){
				while($row = $entries->fetch_assoc()){
					echo '<h2><a href="read.php?id=' . $row['id'] . '">' . $row['title'] . '</a>';
					echo ' <a href="edit-5.php?edit=' . $row['id'] . '">Edit</a>';
					echo ' <a href="delete-2.php?id=' . $row['id'] . '" rel="modal:open">Delete</a></h2>';
					echo '<h3>' . $row['date'] . ' ' . $row['author']. '</h3>';
					echo '<div>' .$row['content'] . '</div>';
				}
				$max_page = ceil($all_entries->num_rows/$entries_per_page);
				for($n=1; $n <= $max_page; $n++){
					$active = ($page == $n) ? "classname='active'" : ""; 
					echo '<a href="read-7.php?page=' . $n . '" ' . $active . '>' . $n . '</a> ';
				}
			}else {
				echo '<p>Error: No entries</p>';
			}
		?>
	</body>
</html>
