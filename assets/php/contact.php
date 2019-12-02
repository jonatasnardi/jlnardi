<?php

	// Mail settings
	$to      = "jonatas.nardi@gmail.com";
	$subject = "Site Jonatas Form";

	// You can put here your email
	$header = "From: noreply@neomax.com\r\n";
	$header.= "MIME-Version: 1.0\r\n";
	$header.= "Content-Type: text/plain; charset=utf-8\r\n";
	$header.= "X-Priority: 1\r\n";

	if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["message"])) {

		$content  = "Name: "      . $_POST["name"]    . "\r\n";
		$content .= "Email: "     . $_POST["email"]   . "\r\n";
		$content .= "Phone: "     . $_POST["phone"]   . "\r\n";
		$content .= "Message: "   . "\r\n" . $_POST["message"];

		if (mail($to, $subject, $content, $header)) {
			$result = array(
				"message"    => "Mensagem enviada!",
				"sendstatus" => 1
			);

			echo json_encode($result);
		} else {
			$result = array(
				"message"    => "Desculpe, houve algum erro!",
				"sendstatus" => 0
			);

			echo json_encode($result);
		}

	}

?>