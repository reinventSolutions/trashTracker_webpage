<!-- 2. THIS WILL TAKE THEIR RECOVERY EMAIL AND MAIL THEM A RANDOM
				RECOVERY PASSWORD, HEADER TO updatePassword.php-->

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

include "../../../DB/dbinfo.php";

	$connection = mysqli_connect($DBservername, $DBusername, $DBpassword);
	@mysqli_select_db($connection, $DBname);

	if(!$connection){
		header("Location: ../index.php");//make changes here
			exit();
	}
    $email = $_POST['recoveryEmail'];

    $selectPass = "SELECT password FROM Users WHERE email = '$email'";
    $result = mysqli_query($connection, $selectPass);
    $row = mysqli_fetch_row($result);
    $pass = $row[0];
/*    
    if($_POST['recoveryEmail'] == ''){
        header("Location: forgotPassword.php?updateFail=false&reason=blank");
    }
    else if($pass == null){
        header("Location: forgotPassword.php?updateFail=false&reason=error");
    }
    else{   
        header("Location: updatepassword.php");
        mysqli_close($connection);
    }
*/
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


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'kevin.truebe@gmail.com';                 // SMTP username
    $mail->Password = 'k67j8@O69Yoz';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = '465';

    //Recipients
    $mail->setFrom('kevin.truebe@gmail.com');
    $mail->addAddress('trueb003@cougars.csusm.edu');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Trash Tracker Temp Password';
    $mail->Body    = 'Your Trash Tracker Temporary Password is '. $pass .' ';    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

header("Location: updatepassword.php");
mysqli_close($connection);

?>
