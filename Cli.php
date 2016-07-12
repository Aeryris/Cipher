<?php

namespace CommandLine;

require_once ('./Cipher.php');
require_once ('./Ciphers/SubstitutionCipher.php');

use Cipher\Cipher;
use Ciphers\SubstitutionCipher;

class Cli{

    public static function run(){

        if(PHP_SAPI === 'cli'){

            $shortArgs = [
                'm:',
                'd::',
                'e::',
                'f::',
                'c::',
                'k::'
            ];

            $longArgs = [
                'message:',
                'decrypt',
                'encrypt',
                'frequency­analysis',
                'cipher::',
                'key::'
            ];

            $args = getopt(join('', $shortArgs));
            self::process($args);
        }
    }

    public static function process(array $args){

        $cipher = new Cipher();
        $cipher->uses(new SubstitutionCipher());

        if(array_key_exists('c', $args)){
            $cipher->uses($args['c']);
        }


        print PHP_EOL . "Selected cipher: ";
        print $cipher->selected() . PHP_EOL;

        if(array_key_exists('k', $args)){

            $cipher->key($args['k']);

            print "Provided key: ";
            print $args['k'] .PHP_EOL;

        }else{
            print "Auto generated key: " . $cipher->key() . PHP_EOL;
        }

        if(array_key_exists('m', $args)){
            $cipher->text($args['m']);
        }

        if(array_key_exists('e', $args)){
            print "Encrypted Text: ";
            print $cipher->encrypt()   . PHP_EOL;
        }

        if(array_key_exists('d', $args)){
            print "Decrypted Text: ";
            print $cipher->decrypt()   . PHP_EOL;
        }



    }


}