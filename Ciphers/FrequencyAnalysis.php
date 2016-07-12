<?php

namespace Ciphers;

use CipherInterface\CipherInterface;

class FrequencyAnalysis implements CipherInterface{

    protected $characterFrequency = array();

    /**
     * Encrypt method
     *
     * @param $text
     * @return mixed
     */
    public function encrypt($text)
    {
        foreach (count_chars($text, 1) as $i => $val) {
            $this->characterFrequency[chr($i)] = $val;
        }

        return $this->characterFrequency;
    }

    /**
     * Decrypt method
     *
     * @param $text
     * @return mixed
     */
    public function decrypt($text)
    {
        // TODO: Implement decrypt() method.
    }

    /**
     * Convenience method for the __toString() to provide clearer API
     *
     * @return mixed
     */
    public function description()
    {
        return "Frequency Analysis";
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

    public function save(){

    }

    public function read(){

    }

    /**
     * Random key generator
     *
     * @return mixed
     */
    public function generateRandomKey()
    {
        // TODO: Implement generateRandomKey() method.
    }

    /**
     * Key used to encrypt and decrypt the message
     *
     * @param $key
     * @return mixed
     */
    public function key($key)
    {
        // TODO: Implement key() method.
    }
}