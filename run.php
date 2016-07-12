<?php

require_once('./Cli.php');

\CommandLine\Cli::run();

/**
 * Generating new key
 */
//     php run.php -e  -m"Bart Kliszczyk"

/**
 * Using existing key
 */
//To Encrypt
//     php run.php -e -k"uiflehop msrvatwyndxbzgjcqk" -m"bartkliszczyk"

//To Decrypt
//     php run.php -d -k"uiflehop msrvatwyndxbzgjcqk" -m"iunxsr dqfqcs"

//     php run.php -d -k"jbhLnODWBZSvVPmwFRol HfrykuYzaUMNIcAJeEsxXqQgTCdtGpKi" -m"YjRliJvBokhkyS"