<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';
   

    if(isset($_POST['send'])){
        $name=htmlentities($_POST['name']);
        $email='jacksonkennedy336@gmail.com';
        $emailR = htmlentities($_POST['email']);
        $subject=htmlentities($_POST['subject']);
        $massage=htmlentities($_POST['massage']);

        $mail= new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host="smtp.gmail.com";
        $mail->SMTPAuth=true;
        $mail->Username='jacksonkennedy336@gmail.com';//L'adresse qui envoie le message
        $mail->Password='jctw mhjm kwnh hedx';//Mot de passe qui est generer pas google(securité->mots de passe d'application) Activer 
        $mail->Port=465;
        $mail->SMTPSecure='ssl';
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress($email);
        $mail->Subject= ("$subject"." "."$emailR");
        $mail->Body=$massage;
        $mail->send();
        $msg="Merci Mr (Mme)"." ". $name. " ". "de m'avoir contacté";
        header("location:contact.php?message=$msg");
    }

