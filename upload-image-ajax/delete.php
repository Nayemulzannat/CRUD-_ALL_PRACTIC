<?php

if(!empty($_POST['path'])){
	if(unlink($_POST['path'])){ // Delete the image from server path
		echo 'Image Deleted';
	}
}

?>