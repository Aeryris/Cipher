<?php

namespace Cipher;

require_once ('./Interfaces/CipherInterface.php');

use CipherInterface\CipherInterface;

class Cipher{

    /**
     * Holds encrypted text
     *
     * @var
     */
    protected $encryptedText;

    /**
     * Holds decrypted text
     *
     * @var
     */
    protected $decryptedText;

    /**
     * Holds original text
     *
     * @var
     */
    protected $originalText;

    /**
     * Selected cipher
     *
     * @var
     */
    protected $cipher;

    /**
     * Constructor
     *
     * @param string $text
     */
    public function _construct($text = ''){
        $this->originalText = $text;
    }

    /**
     * Set text to be encrypted or decrypted
     *
     * @param $text
     */
    public function text($text){
        $this->originalText = $text;
    }

    /**
     * Select available cipher
     *
     * Cipher must conform to the CipherInterface
     *
     * @see CipherInterface
     *
     * @param CipherInterface $cipher
     */
    public function uses(CipherInterface $cipher){
        $this->cipher = $cipher;
    }

    /**
     * Returns selected cipher
     *
     * When echo Cipher::selected() - it causes the description method on the cipher do be executed
     *
     * @return mixed
     */
    public function selected(){
        return $this->cipher;
    }


    /**
     * Set or return the encryption key
     *
     * @param null $key
     * @return mixed
     */
    public function key($key = null){
        return $this->cipher->key($key);
    }

    /**
     * Return encrypted message
     *
     * @return mixed
     */
    public function encrypt(){
        return $this->encryptedText = $this->cipher->encrypt($this->originalText);
    }

    /**
     * Return decrypted message
     *
     * @return mixed
     */
    public function decrypt(){
        return $this->decryptedText = $this->cipher->decrypt($this->originalText);
    }

    public function __call($name, $arguments)
    {
        return $this->cipher->$name($arguments);
    }

}