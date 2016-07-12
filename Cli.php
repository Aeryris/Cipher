<?php

namespace CommandLine;

require_once ('./Cipher.php');
require_once ('./Ciphers/SubstitutionCipher.php');
require_once ('./Ciphers/FrequencyAnalysis.php');

use Cipher\Cipher;
use Ciphers\FrequencyAnalysis;
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

        print("Welcome to Cipher"). PHP_EOL;
        print ("Please select a cipher: ") . PHP_EOL;

        print("1 - SubstitutionCipher") . PHP_EOL;
        print("2 - FrequencyAnalysis") . PHP_EOL;

        $handle = fopen ("php://stdin","r");
        $line = fgets($handle);
        fclose($handle);

        print PHP_EOL . "Selected cipher: ";

        switch($line){
            case 1:
                $cipher->uses(new SubstitutionCipher());
                self::substitution($cipher, $args);
                break;

            case 2:
                $cipher->uses(new FrequencyAnalysis());
                self::frequency($cipher, $args);
                break;

            default:
                echo "Selected is Cipher is not available!\n";
                exit;
        }

    }

    public static function frequency(Cipher $cipher, $args){
        print $cipher->selected() . PHP_EOL;

        if(array_key_exists('m', $args)){
            $cipher->text($args['m']);
        }

        print("Frequency") . PHP_EOL;

        var_dump($cipher->encrypt())   . PHP_EOL;


    }

    public static function substitution(Cipher $cipher, $args){

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