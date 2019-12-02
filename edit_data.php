<?php
session_start();
include_once 'dbconnect.php';
include_once 'dbconfig.php';
if(isset($_GET['edit_id']))
{
	$sql_query="SELECT * FROM student WHERE user_id=".$_GET['edit_id'];
	$result_set=mysql_query($sql_query);
	$fetched_row=mysql_fetch_array($result_set);
}
if(isset($_POST['btn-update']))
{
	// variables for input data
	$name = $_POST['name'];
	$department = $_POST['department'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$branch = $_POST['branch'];
	// variables for input data
	
	// sql query for update data into database
	$sql_query = "UPDATE student SET name='$name',department='$department',email='$email',phone='$phone',branch='$branch' WHERE user_id=".$_GET['edit_id'];
	// sql query for update data into database
	
	// sql query execution function
	if(mysql_query($sql_query))
	{
		?>
		<script type="text/javascript">
		alert('Data Are Updated Successfully');
		window.history.go(-2);
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
		alert('error occured while updating data');
		</script>
		<?php
	}
	// sql query execution function
}
if(isset($_POST['btn-cancel']))
{
	header("Location: admin.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
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
			<a class="navbar-brand" href="index.php">Dreamzone Student Record </a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_id'])) { ?>
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
	<center>
	
	<br><br>
    <form method="post">
    <table align="center">
    <tr>
    <td> <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Full Name" value="<?php echo $fetched_row['name']; ?>" required /></div></td>
    </tr>
    <tr>
    <td> <div class="form-group"><select class="form-control" name="department" placeholder="Department" selected="<?php echo $fetched_row['branch'];?>" value="<?php echo $fetched_row['branch'];?>" required />
             <option value="">--Select Department--</option>
			<option value="wdd"> Web Designing & Development</option>
			<option value="ani"> Animation </option>
			<option value="iad"> Interior Designing</option>
			<option value="fd"> Fashion Designing </option>
			<option value="jd"> Jwellery Designing </option>
			<option value="pho"> Photography </option>
      </select></div></td>
    </tr>
    <tr>
    <td> <div class="form-group"><input class="form-control" type="text" name="email" placeholder="Email" value="<?php echo $fetched_row['email']; ?>" required /></div></td>
    </tr>
	<tr>
    <td> <div class="form-group"><input class="form-control" type="text" name="phone" placeholder="Phone Number" value="<?php echo $fetched_row['phone']; ?>" required /></div></td>
    </tr>
	<tr>
    <td><div class="form-group"><select class="form-control" name="branch" placeholder="Dreamzone-Branch" selected="<?php echo $fetched_row['branch'];?>" value="<?php echo $fetched_row['branch'];?>" required />
       <option value="">--Select Branch--</option>
	    <option value="Andalpuram">Andalpuram</option>
        <option value="Anna Nagar">Anna Nagar</option>
      </select></div></td>
    <tr>
    <td>
    <center><button class="btn btn-success" type="submit" name="btn-update"><strong>Update</strong></button>
    <a class="btn btn-danger" onclick="goBack()"><strong>Cancel</strong></a></center>
    </td>
    </tr>
    </table>
    </form>
	<br><br><br>
	</center>
	
		<div class="footer">
<center>Dreamzone &copy; 2017</center></div>
    </div>
</div>
<script>
function goBack() {
    window.history.back();
}
</script>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>