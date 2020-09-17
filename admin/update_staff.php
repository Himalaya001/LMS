<?php
	// Retrieving values from textboxes
	
	$staff_id = $_POST['staff_id'];
	
	
	
	// Initializing the values, following DRY (Don't Repeat Yourself) Approach
	$dsn_name = "lms";
	$db_user = "root";
	$db_pass = "";
	// Obtaining connection using DSN and ODBC
	//$connection = odbc_connect($dsn_name, $db_user, $db_pass);
	$connection = @mysqli_connect("localhost", "root", "","lms") or die(mysqli_error());
	
	// Sql query
	$sql1 = "SELECT * FROM staff WHERE staff_id = '$staff_id'";
	$sql2 = "SELECT password FROM login WHERE user_id = '$staff_id'"; 
	
	
	// Firing query
	//$result1 = odbc_exec($connection, $sql1);
	//$result2 = odbc_exec($connection, $sql2);
	$result1 = mysqli_query($connection, $sql1);
	
	if(mysqli_num_rows($result1)==0)
	{
		echo 	"<script>
				alert(\"Staff ID ".$staff_id." does not exist !\");
				
				window.location=\"search_staff_for_deletion.php\";</script>";
	}
	
	// Closing Connection
	//mysqli_close($connection);
	
?>
<?php
	session_start();
	if($_SESSION['sid'] == session_id() && $_SESSION['user'] == "admin")
	{
		?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Staff</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(../images/bg.gif);
}
</style>
<link href="../style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
  <div id="header">
    <div id="title">Leave Management System</div>
    <div id="quick_links">
   	  <ul>
        	<li><a class="home" href="index.php">Home</a></li>
            <li>|</li>
        <li><a class="logout" href="../logout.php">Logout</a></li>
         <li>|</li>
        <li><a class="greeting" href="#">Hi <?php echo $_SESSION['user']; ?></a></li>
      </ul>
    </div>
  </div>
  <div id="side_bar">
  	<ul>
    	<li class="menu_head">Controls</li>
        <li><a href="add_staff.php">Add Staff</a></li>
        <li><a href="search_staff_for_updation.php">Update Staff</a></li>
        <li><a href="search_staff_for_deletion.php">Delete Staff</a></li>
    	<li><a href="add_leave.php">Add Leave</a></li>
        <li><a href="delete_leave_type.php">Delete Leave</a></li>
        <li><a href="search_staff_to_assign_pc.php">Assign HOD</a></li>
    </ul>
  </div>
  <div id="content_panel">
    <div id="heading">Search Result
      <hr size="2" color="#FFFFFF" ice:repeating=""/>
    </div>
    <div id="table">
    	 <?PHP
		echo "<span><table border=\"1\" bgcolor=\"#006699\" >
				<tr>
					<th width=\"200px\">Staff ID</th>
					<th width=\"100px\">First Name</th>
					<th width=\"100px\">Middle Name</th>
					<th width=\"100px\">Last Name</th>
					<th width=\"100px\">Password</th>
					<th width=\"80px\">Edit</th>
				</tr>
			</table></span>";
		while($row1 = mysqli_fetch_array($result1))
	{
		$staff_id = $row1['staff_id'];
		$first_name = $row1['first_name'];
		$middle_name = $row1['middle_name'];
		$last_name = $row1['last_name'];
		
		$sql3 = "SELECT password FROM lms.login WHERE user_id = '".$staff_id."'";
		$result2 = mysqli_query($connection,$sql3);
		if($row2 = mysqli_fetch_array($result2))
		{
			$password = $row2['password'];
		}
		echo "<table border=\"1\">
				<tr>
					<td width=\"200px\">".$staff_id."</td>
					<td width=\"100px\">".$first_name."</td>
					<td width=\"100px\">".$middle_name."</td>
					<td width=\"100px\">".$last_name."</td>
					<td width=\"100px\">".$password."</td>
					<td width=\"80px\"><a href='staff_details_for_updation.php?staff_id=".$staff_id."'\><img src=\"../images/edit.png\" />Edit</a></td>
				</tr>
			</table>";
			
	}
	mysqli_close($connection);
	?>
    </div>
  </div>
  <div id="footer">
  	<p><br />LMS</p>
  </div>
</div>
</body>
</html>
<?php
	}
	else
	{
		header("Location:../index.html");
	}
?>
