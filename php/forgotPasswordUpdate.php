<!-- 2. THIS WILL TAKE THEIR RECOVERY EMAIL AND MAIL THEM A RANDOM
				RECOVERY PASSWORD, HEADER TO updatePassword.php-->

<?php include "../../DB/dbinfo.php"; ?>
<?php

	$connection = mysqli_connect($DBservername, $DBusername, $DBpassword);
	@mysqli_select_db($connection, $DBname);

	if(!$connection){
		header("Location: http://ec2-54-201-184-63.us-west-2.compute.amazonaws.com/TrashTracker/php/signup.php");//make changes here
			exit();
	}
				$email = $_POST['recoveryEmail'];

				$selectPass = "SELECT password FROM Users WHERE email = '$email'";
				$result = mysqli_query($connection, $selectPass);
				$row = mysqli_fetch_row($result);
				$pass = $row[0];

				function assign_rand_value($num) {

    // accepts 1 - 36
    switch($num) {
        case "1"  : $rand_value = "a"; break;
        case "2"  : $rand_value = "b"; break;
        case "3"  : $rand_value = "c"; break;
        case "4"  : $rand_value = "d"; break;
        case "5"  : $rand_value = "e"; break;
        case "6"  : $rand_value = "f"; break;
        case "7"  : $rand_value = "g"; break;
        case "8"  : $rand_value = "h"; break;
        case "9"  : $rand_value = "i"; break;
        case "10" : $rand_value = "j"; break;
        case "11" : $rand_value = "k"; break;
        case "12" : $rand_value = "l"; break;
        case "13" : $rand_value = "m"; break;
        case "14" : $rand_value = "n"; break;
        case "15" : $rand_value = "o"; break;
        case "16" : $rand_value = "p"; break;
        case "17" : $rand_value = "q"; break;
        case "18" : $rand_value = "r"; break;
        case "19" : $rand_value = "s"; break;
        case "20" : $rand_value = "t"; break;
        case "21" : $rand_value = "u"; break;
        case "22" : $rand_value = "v"; break;
        case "23" : $rand_value = "w"; break;
        case "24" : $rand_value = "x"; break;
        case "25" : $rand_value = "y"; break;
        case "26" : $rand_value = "z"; break;
        case "27" : $rand_value = "0"; break;
        case "28" : $rand_value = "1"; break;
        case "29" : $rand_value = "2"; break;
        case "30" : $rand_value = "3"; break;
        case "31" : $rand_value = "4"; break;
        case "32" : $rand_value = "5"; break;
        case "33" : $rand_value = "6"; break;
        case "34" : $rand_value = "7"; break;
        case "35" : $rand_value = "8"; break;
        case "36" : $rand_value = "9"; break;
    }
    return $rand_value;
}

function get_rand_alphanumeric($length) {
    if ($length>0) {
        $rand_id="";
        for ($i=1; $i<=$length; $i++) {
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,36);
            $rand_id .= assign_rand_value($num);
        }
    }
    return $rand_id;
}

$str = get_rand_alphanumeric(8);

$pass = $str;

$updatequery = "UPDATE Users SET password = '$pass' WHERE email = '$email'";
$q= mysqli_query($connection, $updatequery);

$to      = '$email';
$subject = 'Trash Tracker Password Recovery';
$headers = 'From: webmaster@TrashTracker.com' . "\r\n" .
    'Please Do not reply to this e-mail'. "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// mail($to, $subject, "Your temporary password is: {$pass}", $headers);


require "/var/www/html/Kevin/PHPMailer-master\PHPMailer.php";


//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'trueb003@cougars.csusm.edu';                 // SMTP username
    $mail->Password = 'KEtr2124';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('trueb003@cougars.csusm.edu', 'Kevin Truebe');
    $mail->addAddress('$email', 'Trash Tracker User');     // Add a recipient


    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Trash Tracker Temporary Password';
    $mail->Body    = 'Your Trash Tracker Temporary Password is '. $pass .' ';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


header("Location: http://ec2-54-201-184-63.us-west-2.compute.amazonaws.com/Kevin/php/updatepassword.php");
mysqli_close($connection);

?>
