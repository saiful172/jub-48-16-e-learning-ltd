<?php

	$DB_HOST = 'localhost';
	$DB_USER = 'elaeltdc_prom_app';
	$DB_PASS = 'Api@Sof_pp24';
	$DB_NAME = 'elaeltdc_prom_app';
	
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	
?>