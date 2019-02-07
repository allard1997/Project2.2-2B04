<?php
/**
 * Created by PhpStorm.
 * User: jesse-gall
 * Date: 2/7/19
 * Time: 1:26 AM
 */


class Decrypt {

    private static $OPENSSL_CIPHER_NAME = "aes-128-cbc"; //Name of OpenSSL Cipher
    private static $CIPHER_KEY_LEN = 16; //128 bits


    static function decryptData($key, $data) {
        if (strlen($key) < Decrypt::$CIPHER_KEY_LEN) {
            $key = str_pad($key, Decrypt::$CIPHER_KEY_LEN, "0"); //0 pad to len 16
        } else if (strlen($key) > Decrypt::$CIPHER_KEY_LEN) {
            $key = substr($key, 0, Decrypt::$CIPHER_KEY_LEN); //truncate to 16 bytes
        }

        $parts = explode(':', $data); //Separate Encrypted data from iv.
        $decryptedData = openssl_decrypt(base64_decode($parts[0]), Decrypt::$OPENSSL_CIPHER_NAME, $key, OPENSSL_RAW_DATA, base64_decode($parts[1]));

        return $decryptedData;
    }
}