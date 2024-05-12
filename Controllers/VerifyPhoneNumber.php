<?php
require_once "vendor\autoload.php";

use Infobip\Api\SmsApi;
use Infobip\Configuration;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

session_start();
class VerifyPhoneNumber extends ControllerBase
{

    private function SendOTP($PhoneNumber)
    {
        if (substr($PhoneNumber, 0, 1) === '0') {
            $PhoneNumber = '+84' . substr($PhoneNumber, 1);
        }
        $num_str = sprintf("%06d", mt_rand(1, 999999));
        $message = "Mã OTP của bạn là:  $num_str";
        $apiBaseURL = "3gl9g1.api.infobip.com";
        $apiKey = "36a1a76c8c2a41f548f0347d6fef0214-fb54341a-f3b8-4384-8dcb-7130fcb525d7";
        $configuration = new Configuration(host: $apiBaseURL, apiKey: $apiKey);

        $api = new SmsApi(config: $configuration);
        $destination = new SmsDestination(to: $PhoneNumber);
        $theMessage = new SmsTextualMessage(
            destinations: [$destination],
            text: $message,
            from: "ServiceSMS",
        );

        $_SESSION['OTP'] = $num_str;
        $request = new SmsAdvancedTextualRequest(messages: [$theMessage]);
        $response = $api->sendSmsMessage($request);
    }
    public function index()
    {
        $PhoneNumber = $_POST["phoneNumber"];
        $this->SendOTP($PhoneNumber);
        $this->View(
            "Verify",
            "Customer"
        );
    }
    public function VerificationOTPApi()
    {
        $postData = file_get_contents("php://input");
        $jsonData = json_decode($postData, true);
        header('Content-Type: application/json');
        if ($jsonData['OTP'] === $_SESSION['OTP']) {
            unset($_SESSION['OTP']);
            echo json_encode(['data' => "Thành công", 'status' => 200]);
        } else {
            echo json_encode(['data' => "Không đúng", 'status' => 403]);
        }
    }
}
