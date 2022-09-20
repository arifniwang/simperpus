<?php
	$md5_name = md5(strtotime(date('Y-m-d H:i:s'))) . "_" . $_FILES["file"]["name"];
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], "../images/" . $md5_name);
        echo $md5_name;
    }
?>