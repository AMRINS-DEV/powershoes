<?php
function convertImagesToBase64($filesArray)
{
    $imageDataArray = [];
    foreach ($filesArray['tmp_name'] as  $tmpName) {
        $imageData = file_get_contents($tmpName);
        $base64Image = base64_encode($imageData);
        $imageDataArray[] = "data:image/image/png;base64," . $base64Image;
    }

    return $imageDataArray;
}
?>

<?php
function generateSecretKEY()
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ_0123456789abcdefghijklmnopqrstuvwxyz';
    $characterCount = strlen($characters);
    $KEY = '';

    for ($i = 0; $i < 32; $i++) {
        $index = random_int(0, $characterCount - 1);
        $KEY .= $characters[$index];
    }
    return $KEY;
}

?>

<?php

class AES256
{
    private $KEY;

    public function __construct($KEY)
    {
        $this->KEY = $KEY;
    }

    public function ENCRYPT($data)
    {
        $iv = random_bytes(16);
        $encryptedData = openssl_encrypt($data, 'AES-256-CBC', $this->KEY, OPENSSL_RAW_DATA, $iv);
        $encryptedData = $iv . $encryptedData;
        $encryptedData = bin2hex($encryptedData);

        return $encryptedData;
    }

    public function DECRYPT($encryptedData)
    {
        $encryptedData = hex2bin($encryptedData);
        $iv = substr($encryptedData, 0, 16);
        $encryptedData = substr($encryptedData, 16);
        $decryptedData = openssl_decrypt($encryptedData, 'AES-256-CBC', $this->KEY, OPENSSL_RAW_DATA, $iv);

        return $decryptedData;
    }
}
$base256 = new AES256("gOx9GBCaalTM0zVjqxHwWgANb7oXTND+7Yz8esUu58w=");
function elm($e, $t = 'h3')
{
    return "<" . $t . " style='flex-basis: 100%;'>" . $e . "</" . $t . "> <br>";
}
?>


<?php
function limit_words($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}
?>

<?php
function setSession($session_name = [], $value = [])
{
    for ($i = 0; $i < count($session_name); $i++) {
        $_SESSION[$session_name[$i]] = $value[$i];
    }
}
function unsetSession($session_name = [])
{
    for ($i = 0; $i < count($session_name); $i++) {
        unset($_SESSION[$session_name[$i]]);
    }
}

?>

<?php
function randomString($salt = "")
{
    $now = DateTime::createFromFormat('U.u', microtime(true));
    $date = $now->format("m-d-Y H:i:s:u");
    $date .= $salt;
    return md5($date);
}

?>