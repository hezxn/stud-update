
<?php
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {        
        $uploadOk = 1;
    } else {       
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $uploadOk = 0;
		        		?>
		<script type="text/javascript">
		alert('Failed. Uploaded File already exists.');
		window.location.href='index.php';
		</script>
		<?php
	
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    $uploadOk = 0;
	        		?>
		<script type="text/javascript">
		alert('Failed. Uploaded File exeeds maximum size(1MB).');
		window.location.href='index.php';
		</script>
		<?php
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $uploadOk = 0;
			        		?>
		<script type="text/javascript">
		alert('Failed. Uploaded File type is not allow');
		window.location.href='index.php';
		</script>
		<?php
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        		?>
		<script type="text/javascript">
		alert('File Uploaded Sucessfully ');
		window.location.href='index.php';
		</script>
		<?php
    } else {
		        		?>
		<script type="text/javascript">
		alert('Sorry, there was an error uploading your file. ');
		window.location.href='index.php';
		</script>
		<?php
    }
}
?>


