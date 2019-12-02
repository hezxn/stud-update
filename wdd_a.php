<?php
session_start();
include_once 'dbconnect.php';
include_once 'dbconfig.php';

// delete condition
if(isset($_GET['delete_id']))
{
	$sql_query="DELETE FROM student WHERE user_id=".$_GET['delete_id'];
	mysql_query($sql_query);
	header("Location: $_SERVER[PHP_SELF]");
}
// delete condition

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
<title>Student Record</title>
<script type="text/javascript">
function edt_id(id)
{
	if(confirm('Sure to edit ?'))
	{
		window.location.href='edit_data.php?edit_id='+id;
	}
}
function delete_id(id)
{
	if(confirm('Sure to Delete ?'))
	{
		window.location.href='wdd_a.php?delete_id='+id;
	}
}
</script>
</head>

<body>

<div id="main">
<div class="container">

<nav class="navbar navbar-default " role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="wdd_a.php">Dreamzone Student Record </a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li><a href="up.php">Upload</a></li>
				<li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Sign Up</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
<br><br>
<div style="overflow-x:auto;">
    <table align="center" class="table table-bordered">
    <thead>
	<tr>
    <th colspan="7"><center><a href="add_data.php">+Add</a></center></th>
    </tr>
    <th>Full Name</th>
    <th>Department</th>
    <th>Email</th>
	<th>Phone Number</th>
	<th>Dreamzone-Branch</th>
    <th colspan="2">Operations</th>
    </tr>
	  </thead>
    <?php
	$sql_query="SELECT * FROM student WHERE department='wdd'";
	$result_set=mysql_query($sql_query);
	if(mysql_num_rows($result_set)>0)
	{
        while($row=mysql_fetch_row($result_set))
		{
		?>

    <tbody>
      <tr>
        <td><?php echo $row[1]; ?></td>
        <td>Web Design & Development</td>
		<td><?php echo $row[3]; ?></td>
		<td><?php echo $row[4]; ?></td>
		<td><?php echo $row[5]; ?></td>
		<td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>')"><img src="img/b_edit.png" align="EDIT" /></a></td>
        <td align="center"><a href="javascript:delete_id('<?php echo $row[0]; ?>')"><img src="img/b_drop.png" align="DELETE" /></a></td>
      </tr>
    
       <?php
		}
	}
	else
	{
		?>
        <tr>
        <td colspan="7">No Data Found !</td>
        </tr>
        <?php
	}
	?>
	</tbody>
    </table></div>
	<br><br><br><br><br><br><br>
	
	<div class="footer">
<center>Dreamzone &copy; 2017</center></div>
    </div>
</div>


</body>
</html>