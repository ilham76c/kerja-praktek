<?php
	//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['url'])) {
			//echo "<script>alert('jos');</script>";			
			$this->SosmedModel->updateURL(intval($_POST['id']),$_POST['url']);
		}
		if (isset($_POST['onoff'])) {			
			$this->SosmedModel->updateSTATUS(intval($_POST['id']),($_POST['onoff'] === "true" ? true : false));			
		}
	//}
?>