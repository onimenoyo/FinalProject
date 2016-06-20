<?php
namespace Controller;

use \Controller\Controller;
use \PHPMailer;

class MailController extends Controller
{
	private $GMailUSER = 'finalproject.wf3@gmailcom';
	private $GMailPWD = 'Webforce3';

	public function email($body, $email)
	{
			// echo 'michel';
			$mail = new PHPMailer();  // Cree un nouvel objet PHPMailer
			$mail->IsSMTP(); // active SMTP
			$mail->IsHTML();
			$mail->SMTPDebug = 0;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
			$mail->SMTPAuth = true;  // Authentification SMTP active
			$mail->SMTPSecure = 'ssl'; // Gmail REQUIERT Le transfert securise
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 465;
			$mail->Username = 'finalproject.wf3';
			$mail->Password = 'Webforce3';
			$mail->SetFrom('finalproject.wf3@gmail.com', 'Final Project');
			$mail->Subject = 'Récupération de mot de passe';
			$mail->Body = 'Voici l\'adresse pour configurer votre mot de passe : <a href="'.$body.'">'.$body.'</a>.';
			$mail->AddAddress($email);
			// debug($mail);
			if(!$mail->Send()) {
				return 'Mail error: '.$mail->ErrorInfo;
			} else {
				return true;
			}



		$result = smtpmailer($email, 'finalproject.wf3@gmail.com', 'Final Project', 'test', 'Le sujet de votre message de test');
		if (true !== $result)
		{
			// erreur -- traiter l'erreur
			echo $result;
		}
	}

	public function email_validation($body, $email)
	{
			// echo 'michel';
			$mail = new PHPMailer();  // Cree un nouvel objet PHPMailer
			$mail->IsSMTP(); // active SMTP
			$mail->IsHTML();
			$mail->SMTPDebug = 0;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
			$mail->SMTPAuth = true;  // Authentification SMTP active
			$mail->SMTPSecure = 'ssl'; // Gmail REQUIERT Le transfert securise
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 465;
			$mail->Username = 'finalproject.wf3';
			$mail->Password = 'Webforce3';
			$mail->SetFrom('finalproject.wf3@gmail.com', 'Final Project');
			$mail->Subject = 'Validation d\'e-mail';
			$mail->Body = 'Voici l\'adresse pour valider votre adresse e-mail : <a href="'.$body.'">'.$body.'</a>.';
			$mail->AddAddress($email);
			// debug($mail);
			if(!$mail->Send()) {
				return 'Mail error: '.$mail->ErrorInfo;
			} else {
				return true;
			}



		$result = smtpmailer($email, 'finalproject.wf3@gmail.com', 'Final Project', 'test', 'Le sujet de votre message de test');
		if (true !== $result)
		{
			// erreur -- traiter l'erreur
			echo $result;
		}
	}
}
