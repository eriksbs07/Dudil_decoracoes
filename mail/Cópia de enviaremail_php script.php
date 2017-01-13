<?php
	
	require 'phpmailer/PHPMailerAutoload.php';

	$mail = new PHPMailer();
	$mail ->setLanguage('pt');

	$from = 'erik_sbs07@hotmail.com';
	$fromName= 'Erik Henderson';

	$host= 'smtp.live.com' ;
	$username= 'erik_sbs07@hotmail.com';
	$password= '*#21122008#*';
	$port= 587;
	$secure= 'tls';

	$mail->isSMTP();
	$mail->Host = $host;
	$mail->SMTPAuth = true;
	$mail->Username = $username;
	$mail->Password = $password;
	$mail->Port = $port;
	$mail->SMTPSecure = $secure;


	$mail->From = $from;
	$mail->FromName = $fromName;
	$mail->addReplyTo($from, $fromName);

	$mail->addAddress('erik_sbs07@hotmail.com', 'Novo Cliente');

	$mail->isHTML(true);
	$mail->CharSet = 'ISO-8859-1';
	$mail->WordWrap = 70;
	
	//aqui eu vou editar para entrar meus arquivos 
	$conteudo = "<b>"."Nome: "."</b>".$_POST["name2"]."</br>";
	$conteudo .= "<b>"."Email: "."</b>".$_POST["email2"]."</br>";
	$conteudo .= "<b>"."Mensagem: "."</b>".$_POST["message2"]."</br>";

	
	$mail->Subject = 'DEL - Contato Cliente';
	$mail->Body = $conteudo;
	$mail->AltBody= $conteudo;

	$send = $mail->Send($_POST["enviar"]);

	if ($send) {
		echo '<meta HTTP-EQUIV="Refresh" CONTENT="0.5; URL=../index.php">'; 
		echo '<script> alert("Email enviado com exito");</script>';
	}
	else {
		echo 'erro: '.$mail->ErrorInfo;
	}
	
?>