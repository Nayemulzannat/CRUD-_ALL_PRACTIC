<?php
if($_FILES['file']['name'] != ''){

	$filename = $_FILES['file']['name']; // Get the Uploaded file Name.

	$extension = pathinfo($filename,PATHINFO_EXTENSION); //Get the Extension of uploded file.

	$valid_extensions = array("jpg","jpeg","png","gif");

	if(in_array($extension, $valid_extensions)){ // check if upload file is a valid image file.
		$new_name = rand() . "." . $extension;
		$path = "images/" . $new_name;

		if(move_uploaded_file($_FILES['file']['tmp_name'], $path)){ // Upload the Image File on server path
			echo '<img src="'.$path.'" /><br><br>
			<button data-path="'.$path.'" id="delete_btn">Delete</button>';
		}

	}else{
		echo '<script>alert("Invalid File Format.")</script>';
	}

}else{
	echo '<script>alert("Please Select File")</script>';
}


?>
