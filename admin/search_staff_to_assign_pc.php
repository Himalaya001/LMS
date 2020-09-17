<?php
	session_start();
	if($_SESSION['sid'] == session_id() && $_SESSION['user'] == "admin")
	{
		?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Assign HOD</title>
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
  <div id="content_panel">
    <div id="heading">Assign HOD<hr size="2" color="#FFFFFF" ice:repeating=""/>
</div>
    <form>
    
         <label for="search_by"><span>Search By <span class="required">*</span></span>
         	<select name="search_by" id="search_by">
                <option value="staff_id">Staff ID</option>
          	</select>
      	</label>
    </form>
        <div class="staff_id">
        <form action="assign_pc_by_id.php" method="get">
        <label for="staff_id"><span>Staff ID <span class="required">*</span></span>
          <input type="text" name="staff_id" id="staff_id" placeholder="Staff ID" required="required"/>
          <input type="submit" value="Search" style="margin-left:5px; height:30px;"/>
          </label>
      	</form>
    	</div>
     	
    </form>
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
		header("Location: ../index.html");
	}
?>
