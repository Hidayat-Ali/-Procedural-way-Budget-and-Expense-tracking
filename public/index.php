<?php

declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);


require APP_PATH ."App.php";
require APP_PATH ."helpers.php";  
 $files = getTranscationFiles(FILES_PATH);
// var_dump($files);
    $transctions=[];

foreach($files as $file){
    $transctions = array_merge($transctions,getTransactions($file,'extractTransactions'));
}
$totals =  CalculateTotals($transctions);
// print_r($transctions);
require VIEWS_PATH.'transactions.php';
