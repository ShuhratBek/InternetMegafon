<?php
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {

    $email_to = "you@yourdomain.com"; // required
    $email_subject = "Тема письма"; // required
    $email_from = "you2@yourdomain.com"; // required
	
    function died($error) {
		echo $error."<br />";
		die();
    }
	// validation expected data exists
    if(!isset($_POST['name']) || !isset($_POST['phone'])) {
		died('Заполните все поля');
    }
	
	$first_name = $_POST['name']; // required
	$telephone = $_POST['phone']; // not required
	$error_message = "";

	$string_exp = "/^[A-Za-z .'-]+$/";

	if(!preg_match($string_exp,$first_name)) {
		$error_message .= 'Некорректное имя.<br />';
	}
	if(strlen($error_message) > 0) {
		died($error_message);
	}
	
	function clean_string($string) {
		$bad = array("content-type","bcc:","to:","cc:","href");
		return str_replace($bad,"",$string);
    }
	$email_message = "Имя: ".clean_string($first_name)."\n";
    $email_message .= "Телефон: ".clean_string($telephone)."\n";
	
	// create email headers
	$headers = 'From: '.$email_from."\r\n".'Reply-To: '.$email_from."\r\n".'X-Mailer: PHP/'.phpversion();
 
	if(@mail($email_to, $email_subject, $email_message, $headers)){
		header('Location: thanks/thanks.html');
	}
}
?>