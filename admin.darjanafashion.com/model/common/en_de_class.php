<?php
// en_de_class.php - Make sure both classes use the same approach

// Option 1: UrlEncryption class (AES-256-CBC)
class UrlEncryption
{
    private $key;
    private $method = 'aes-256-cbc'; // Define method consistently

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function encrypt($data)
    {
        $iv = substr($this->key, 0, 16);
        $encrypted = openssl_encrypt($data, $this->method, $this->key, 0, $iv);
        return urlencode(base64_encode($encrypted));
    }

    public function decrypt($data)
    {
        $iv = substr($this->key, 0, 16);
        $decoded = base64_decode(urldecode($data));
        return openssl_decrypt($decoded, $this->method, $this->key, 0, $iv);
    }
}

// Option 2: EncryptionHelper class (AES-128-CTR) - Use ONE consistently
class EncryptionHelper {
    private $cipher = 'AES-128-CTR';
    private $options = 0;
    
    public function encrypt($data, $secretKey = 'S@nds1@b@Trichur1nf0p@rk123!456') {
        $ivLength = openssl_cipher_iv_length($this->cipher);
        $iv = openssl_random_pseudo_bytes($ivLength);
        $encryptedData = openssl_encrypt($data, $this->cipher, $secretKey, $this->options, $iv);
        $base64 = base64_encode($iv . $encryptedData);
        return str_replace(['+', '/', '='], ['-', '_', ''], $base64);
    }
    
    public function decrypt($encryptedData, $secretKey = 'S@nds1@b@Trichur1nf0p@rk123!456') {
        $base64 = str_replace(['-', '_'], ['+', '/'], $encryptedData);
        $encryptedData = base64_decode($base64);
        $ivLength = openssl_cipher_iv_length($this->cipher);
        $iv = substr($encryptedData, 0, $ivLength);
        $ciphertext = substr($encryptedData, $ivLength);
        return openssl_decrypt($ciphertext, $this->cipher, $secretKey, $this->options, $iv);
    }
}
?>