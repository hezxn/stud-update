<!DOCTYPE html> <!--File Upload Custom By Hariharan-->
<html>

<head>
<title>File Upload</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/main.js"></script>
<head>


<body>
  <div id="main">
  <div class="container">
  <center><nav class="navbar navbar-default " role="navigation">
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
</nav><br><br><br><br>
  <h1>Project Submission</h1><br>
  <h3>Upload Files here:</h3>
  <br><h>
  <b><br><br>
  <form action="upload.php" method="post" enctype="multipart/form-data">
  <div class="fileupload fileupload-new" data-provides="fileupload">
    <span class="btn btn-primary btn-file"><span class="fileupload-new">Select file</span>
    <span class="fileupload-exists">Change</span>         <input type="file" name="fileToUpload" id="fileToUpload" /></span>
    <span class="fileupload-preview"></span>
    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">x</a>
	<input class="btn btn-success" type="submit" value="Upload" name="submit" />
	</form>
  </div>
  
  </center><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  
 	<div class="footer">
<center>Dreamzone &copy; 2017</center></div>
    </div>

  </div>
</body>
</html>