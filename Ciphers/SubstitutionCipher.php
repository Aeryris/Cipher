<?php

namespace Ciphers;

use \CipherInterface\CipherInterface;

//mb_internal_encoding("UTF-8");

class SubstitutionCipher implements CipherInterface{

    /**
     * Current key used to encrypt or decrypt the message
     *
     * @var null
     */
    protected $key = null;

    /**
     * Available character set, there is a " " blank space at the end to allow
     * string with spaces
     * @var string
     */
    protected $charSet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOQPRSTUVWXYZ ";//Space at the end!!

    /**
     * Internal message array used to temporarily hold encrypted characters
     * @var array
     */
    protected $message = array();

    /**
     * Generate random string from the available character set
     * @return string
     */
    public function generateRandomKey(){
        return $this->key = str_shuffle($this->charSet);
    }

    /**
     * Setter and Getter in one
     *
     * If $key parameter is provided then $this->key is set
     * If $this->key is null key is generated
     *
     * If $this->key() is called with no parameters and $this->key is set, $this->key is returned
     *
     * @param null $key
     * @return null|string
     */
    public function key($key = null){
        if(!is_null($key)){
            return $this->key = $key;
        }

        if(is_null($this->key)){
            return $this->generateRandomKey();
        }
        return $this->key;
    }

    /**
     * Convenience helper function used to check the length of characters
     *
     * @param $text
     * @throws \Exception
     */
    private function checkLength($text){
        if(strlen($text) <= 0){
            throw new \Exception("Please provide string with at least one character");
        }
    }

    /**
     * Encrypt the message by using the given key
     *
     * @param $text
     * @return string
     * @throws \Exception
     */
    public function encrypt($text)
    {
        $this->checkLength($text);

        $this->message = array();

        $textCharacters = str_split($text);
        $key = str_split($this->key);

        for($i = 0; $i < sizeof($textCharacters); $i++){

            $character = $textCharacters[$i];
            $index = mb_strpos($this->charSet, $character);
            array_push($this->message, $key[$index]);

        }

        return implode('', $this->message);
    }

    /**
     * Decrypt the message by using the given key
     *
     * @param $text
     * @return string
     * @throws \Exception
     */
    public function decrypt($text)
    {
        $this->checkLength($text);
        $this->message = array();

        $encodedTextCharacters = str_split($text);
        $charSet = str_split($this->charSet);

        for($i = 0; $i < sizeof($encodedTextCharacters); $i++){

            $character = $encodedTextCharacters[$i];
            $index = mb_strpos($this->key, $character);

            array_push($this->message, $charSet[$index]);

        }

        return  implode('', $this->message);
    }

    /**
     * Decryption of the cipher, and alias to the __toString() method
     *
     * @see SubstitutionCipher::__toString
     *
     * @return string
     */
    public function description()
    {
        return "Substitution cipher" . PHP_EOL;
    }

    /**
     * Description of the cipher
     *
     * @return string
     */
    public function __toString()
    {
        return $this->description();
    }


}