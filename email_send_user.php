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
    $body = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thank You - Message Received</title>
        <style>
             * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Segoe UI;
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 60px 40px;
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        .logo {
            color: #6b7280;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 40px;
        }

        .check-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #a7c7e7, #b8d4f0);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 40px;
            position: relative;
        }

        .check-icon::before {
            content: "✓";
            color: #4a90e2;
            font-size: 32px;
            font-weight: bold;
        }

        .title {
            color: #374151;
            font-size: 36px;
            font-weight: 300;
            margin-bottom: 30px;
            line-height: 1.2;
        }

        .subtitle {
            color: #6b7280;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 40px;
        }

        .btn {
            background: linear-gradient(135deg, #6b9bd2, #4a90e2);
            color: white;
            padding: 16px 40px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(74, 144, 226, 0.3);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(74, 144, 226, 0.4);
            background: linear-gradient(135deg, #5a8bc4, #3d7bd6);
        }

        .btn:active {
            transform: translateY(0);
        }

        @media (max-width: 480px) {
            .container {
                padding: 40px 30px;
            }
            
            .title {
                font-size: 28px;
            }
            
            .subtitle {
                font-size: 16px;
            }
            
            .btn {
                padding: 14px 30px;
                font-size: 16px;
            }
        }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="logo">From '.$hotel.' </div>
            <div class="check-icon"></div>
            <h1 class="title">Thanks for contacting us</h1>
            <p class="subtitle">thank you message</p>
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