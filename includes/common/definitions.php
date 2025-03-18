<?php
	$conn = new dbconnect();		
	$sql ="SELECT * FROM mst_application";
	$res = $conn->query($sql);	
	$rs_CRM = $res->fetch(PDO::FETCH_OBJ);
	
	define ("APPLICATION_NAME",$rs_CRM->app_name);
	define ("VERSION","1.0");
	define ("PAGE_TITLE",$rs_CRM->app_page_title);
?>