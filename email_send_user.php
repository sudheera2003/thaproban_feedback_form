<?php
header('Content-Type: application/json');

include "SMTP.php";
include "PHPMailer.php";
include "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

// Initialize response array
$response = ['success' => false, 'message' => ''];

try {


 $hotel = $_POST['hotel'] ?? '';
 $name = $_POST['name'] ?? '';
     $website = "";
    $facebook = "";
    $instagram = "";
    $address = "";
    $phone = "";

 if ($hotel === "Thaproban Beach House"){

    $website = "https://beachhouse.ceylonlensmedia.com/";
    $facebook = "https://www.facebook.com/ThaprobanBeachHouse/";
    $instagram = "https://www.instagram.com/fabulousbeach/";
    $address = "Thaproban Rooms & Restaurant Unawatuna Galle, Sri Lanka.";
    $phone = "+94 914 381 722 / +94 914 941 552";

 } else if ($hotel === "Thaproban Pavilion Waves"){

    $website = "https://waves.ceylonlensmedia.com/";
    $facebook = "https://www.facebook.com/thaprobanpavilionwaves/";
    $instagram = "https://www.instagram.com/thaprobanpavilionwaves/";
    $address = "Wella Devala Road,Yaddehimulla,Unawatuna,Sri Lanka.";
    $phone = "+94 914 944 184 / +94 912 228 351";

 } else if ($hotel === "Thaproban Pavilion") {

    $website = "https://thambapanni.ceylonlensmedia.com/";
    $facebook = "https://www.facebook.com/";
    $instagram = "https://www.instagram.com/";
    $address = "Yaddehimulla Rd, Unawatuna, Sri Lanka.";
    $phone = "+94 914 944 184 / +94 914 944 178 / +94 912 228 351";

 } else if ($hotel === "Thaproban Villa") {

    $website = "#";
    $facebook = "https://www.facebook.com/";
    $instagram = "https://www.instagram.com/";
    $address = "00000000000000000";
    $phone = "00000000000";

 } else if ($hotel === "Thambapanni Retreat") {

    $website = "https://retreat.ceylonlensmedia.com/";
    $facebook = "https://www.facebook.com/";
    $instagram = "https://www.instagram.com/";
    $address = "Thambapanni Unawatuna Galle,Sri Lanka.";
    $phone = "+94 914 381 722 / +94 914 941 552";

 }


    $body = '
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Contacting Us</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Geist+Mono:wght@100..900&family=Marcellus&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
        body {
            margin: 0;
            padding: 0;
            font-family: "Marcellus", Georgia, serif;
            background-color: #f4f4f4;
            line-height: 1.6;
        }
        
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #F3F3F0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .header {
            background-color: #E4D7C5;
            color: black;
            padding: 40px 30px;
            text-align: center;
        }
        
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
        }
        
        .header p {
            margin: 10px 0 0 0;
            font-size: 16px;
            opacity: 0.9;
        }
        
        .content {
            padding: 40px 30px;
            color: #333333;
        }
        
        .content h2 {
            color: black;
            font-size: 24px;
            margin: 0 0 20px 0;
            font-weight: 600;
        }
        
        .content p {
            margin: 0 0 20px 0;
            font-size: 16px;
            color: #555555;
        }
        
        .contact-info {
            background-color: #eeeee7;
            padding: 25px;
            border-radius: 6px;
            margin: 30px 0;
        }
        
        .contact-info h3 {
            margin: 0 0 15px 0;
            color: #333333;
            font-size: 18px;
        }
        
        .contact-info p {
            margin: 5px 0;
            font-size: 14px;
        }
        
        .contact-info a {
            color: #667eea;
            text-decoration: none;
        }
        
        .contact-info a:hover {
            text-decoration: underline;
        }
        
        .footer {
            background-color: #E4D7C5;
            color: black;
            padding: 30px;
            text-align: center;
            font-size: 14px;
        }
        
        .footer p {
            margin: 5px 0;
        }
        
        .social-links {
            margin: 20px 0;
        }
        
        .social-links a {
            color: black;
            text-decoration: none;
            margin: 0 10px;
            font-weight: 500;
        }
        
        .social-links a:hover {
            color: rgb(41, 41, 41);
        }
        
        @media (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 0;
            }
            
            .header, .content, .footer {
                padding: 25px 20px;
            }
            
            .header h1 {
                font-size: 24px;
            }
            
            .content h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section -->
        <div class="header">
            <h1>Thank You!</h1>
            <p>We have received your message</p>
        </div>
        
        <!-- Main Content -->
        <div class="content">
            <h2>Hello '.$name.',</h2>
            
            <p>We’ve received your message and truly appreciate you taking the time to contact '.$hotel.'. Our team will review your inquiry as soon as possible.</p>
            
            <!-- Contact Information -->
            <div class="contact-info">
                <h3>Need Immediate Assistance?</h3>
                <p><strong>Email:</strong> <a href="mailto:thambapannisocialhub@gmail.com ">thambapannisocialhub@gmail.com </a></p>
                <p><strong>Phone:</strong> '.$phone.'</p>
                <p><strong>Hours:</strong> Monday - Friday, 9:00 AM - 6:00 PM EST</p>
            </div>
            
            <p>In the meantime, feel free to explore more about our accommodations, dining experiences, and more on our website.</p>
            <p style="margin-top: 30px;">
                Warm regards,<br>
                <strong>The '.$hotel.' Team</strong>
            </p>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p><strong>'.$hotel.'</strong></p>
            <p>'.$address.'</p>
            
            <div class="social-links">
                <a href="'.$website.'">Website</a> |
                <a href="'.$facebook.'">Facebook</a> |
                <a href="'.$instagram.'">Instagram</a>
            </div>
            
            <p style="margin-top: 20px; font-size: 12px;">
                You received this email because you contacted us through our website.
            </p>
        </div>
    </div>
</body>
</html>
    ';

    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sudheeradilum@gmail.com';
    $mail->Password = 'ffauohhfnynozkde';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom($email, $name);
    $mail->addReplyTo($email, $name);
    $mail->addAddress('sudheeradilum@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = "Thanks for Feedback";
    $mail->Body = $body;

    if ($mail->send()) {
        $response['success'] = true;
        $response['message'] = 'Your message has been sent successfully!';
    } else {
        throw new Exception('Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
    }

} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

// Output the JSON response
echo json_encode($response);
exit;
?>