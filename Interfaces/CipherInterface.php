<?php

namespace CipherInterface;

interface CipherInterface{

    /**
     * Encrypt method
     *
     * @param $text
     * @return mixed
     */
    public function encrypt($text);

    /**
     * Decrypt method
     *
     * @param $text
     * @return mixed
     */
    public function decrypt($text);

    /**
     * Convenience method for the __toString() to provide clearer API
     *
     * @return mixed
     */
    public function description();

    /**
     * Random key generator
     *
     * @return mixed
     */
    public function generateRandomKey();

    /**
     * Key used to encrypt and decrypt the message
     *
     * @param $key
     * @return mixed
     */
    public function key($key);

}