<?php
	$user ='root';
	$pass = '';
	$db ='store_email';
	$db = new mysqli('localhost',$user,$pass,$db);
	$email = $_POST['email'];
	$stmt = $db->prepare("INSERT INTO register (email) VALUES (?)");
	$stmt->bind_param('s',$email);
	$stmt->execute();
	 // entering 
	$sql = "SELECT * FROM register";
	$res = mysqli_query($db,$sql);
	$arr = array();
	while($data =mysqli_fetch_assoc($res)){
  	$arr[] = $data;
	}
	$filename = fopen('log.json','w');
	fwrite($filename,json_encode($arr));
	
	$db->close();
	header('Location: index.html');
?>
