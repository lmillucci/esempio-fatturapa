<?php
require('DebugSoapClient.php');
require('FileSdIBaseType.php');

ini_set('soap.wsdl_cache_enabled', '0');
ini_set('soap.wsdl_cache_ttl', '0');

// Production WSDL
$wsdlProd = 'http://www.fatturapa.gov.it/export/fatturazione/sdi/ws/trasmissione/v1.0/SdIRiceviFile_v1.0.wsdl';

// Testing WSDL
$wsdlTest = __dir__ . '/wsdl/SdIRiceviFile_v1.0.wsdl';

$ssl_params = [
    'cache_wsdl'=> WSDL_CACHE_NONE,
    'trace' => true,
];

$SOAPClient = new \DebugSoapClient($wsdlTest, $ssl_params);

// Load sample XML file
$fileName = 'IT01234567890_FPR01.xml';
$contents =  file_get_contents(__dir__ . "/samples/$fileName");

$fileSdIBase = new FileSdIBaseType($fileName, $contents);

try {
    $response = $SOAPClient->RiceviFile($fileSdIBase);
} catch (\Exception $exception) {
    error_log('EXCEPTION ' . $exception->getMessage() . PHP_EOL . $exception->getTraceAsString());
}