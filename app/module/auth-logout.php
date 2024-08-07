<?php
	session_start();
	session_unset();
	session_destroy();

	echo "<script type='text/javascript'>alert('Thank you for visiting in Community Group!');document.location='../page_signin.php';</script>";
?>