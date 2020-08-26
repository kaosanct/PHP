
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require $_SERVER["DOCUMENT_ROOT"] . '/PHPMailer-master/vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$from = strip_tags(htmlspecialchars($_POST['from']));
$from_name = 'Cafe24 Vietnam';
$rawTo = explode(',',strip_tags(htmlspecialchars($_POST['to'])));

$cc = strip_tags(htmlspecialchars($_POST['cc']));
echo $cc;
$subject = strip_tags(htmlspecialchars($_POST['subject']));
$contents = strip_tags(htmlspecialchars($_POST['content']));
// Cross-Site Scripting (XSS)을 방지하는 시큐어코딩
// strip_tags() -> 문자열에서 html과 php태그를 제거한다
// htmlspecialchars() -> 특수 문자를 HTML 엔터티로 변환
// 악의적인 특수문자 삽입에 대비하기 위함

// if(validate($from,$to,$subject,$contents) === false){
//   return;
// };

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   =                      // SMTP username
    $mail->Password   =                                // SMTP password
    $mail->SMTPSecure = "ssl";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->CharSet = 'UTF-8';

    //Recipients
    $mail->setFrom("support@cafe24corp.vn", $from_name);
    //$mail->addAddress($to,"Valued Customer");     // Add a recipient
    //$mail->addReplyTo($to,'Reply to '.$from);
    if ($cc != null) {
      $cc = explode(',', $cc);
      for ($i = 0; $i < count($cc); $i++) {
          $mail->addCC($cc[$i]);
      }
  }
    

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $contents;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    foreach($rawTo as $to){
      $mail->ClearAddresses();
      $mail->addAddress($to,"Valued Customer"); 
      $mail->send();
    }
    echo 'Message has been sent successfully';
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

