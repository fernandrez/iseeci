<?php
return array(
	'components'=>array(
		/**/
		/*
		'db'=>array(
		
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
			
		),
		*/
		// uncomment the following to use a MySQL database
		/**/
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=iseeci',
			'emulatePrepare' => true,
			'username' => 'iseeci',
			'password' => 'sqliseeci',
			'charset' => 'utf8',
			'tablePrefix'=>'tbl_'
		),
		/**/
		/**
		'db'=>array(
			'connectionString' => 'mysql:host=iseeci.db.9435553.hostedresource.com;dbname=iseeci',
			'emulatePrepare' => true,
			'username' => 'iseeci',
			'password' => 'Soleloen1987',
			'charset' => 'utf8',
		),
		/**/
		)
	);
?>		