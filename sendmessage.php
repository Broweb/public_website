<?php
$data=json_decode(file_get_contents('php://input'),1);
if (strlen($data['firstName'])<3 OR strlen($data['lastName'])<3 OR !filter_var($data['email'], FILTER_VALIDATE_EMAIL) OR strlen($data['message'])<10){
	echo "Required data not filled in.";
}
else{
	$text = "<html><body>Broweb contact form<br>Firstname: ".filter_var($data['firstName'], FILTER_SANITIZE_STRING)."<br>Lastname: ".filter_var($data['lastName'], FILTER_SANITIZE_STRING)."<br>email: ".filter_var($data['email'], FILTER_SANITIZE_EMAIL)."<br>Info: ".filter_var($data['message'], FILTER_SANITIZE_STRING)."</body></html>";
mail('broelie@gmail.com','Broweb.nl contact',"$text");
}
?>