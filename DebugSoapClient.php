<?php

class DebugSoapClient extends \SoapClient
{
    /**
     * @inheritdoc
     */
    public function __doRequest($request, $location, $action, $version, $one_way = null)
    {
        error_log('SoapClientDebug::__doRequest' . PHP_EOL);
        error_log('request: ' . $request . PHP_EOL);
        error_log('location: ' . $location . PHP_EOL);
        error_log('action: ' . $action . PHP_EOL);
        error_log('version: ' . $version . PHP_EOL);
        error_log('one_way: ' . $one_way . PHP_EOL);
        $soap_request = $request;

        $certspath = __dir__ .  "/certs/";
        //CA file
        $cafile = "CA_Agenzia_delle_Entrate_all.pem";
        //PRIVATE KEY file
        $keyFile = "private-client.key";
        //Client CERT file
        $clientCertFile = "SDI-03445160546-client.pem";

        $header = [
            'Content-type: text/xml;charset="utf-8"',
            'Accept: text/xml',
            'Cache-Control: no-cache',
            'Pragma: no-cache',
            "SOAPAction: {$action}",
            'Content-length: ' . strlen($soap_request),
        ];

        $soap_do = curl_init();

        $url = $location;

        $options = [
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_SSLKEY => $certspath . $keyFile,
            CURLOPT_SSLCERT => $certspath . $clientCertFile,
            CURLOPT_CAINFO => $certspath . $cafile,

            CURLOPT_SSL_ENABLE_ALPN => false,

            CURLOPT_TIMEOUT => 60,

            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => true,
            CURLOPT_FOLLOWLOCATION => true,

            CURLOPT_USERAGENT      => 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)',
            CURLOPT_VERBOSE        => true,
            CURLOPT_URL            => $url,

            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $soap_request,
            CURLOPT_HTTPHEADER => $header,
        ];

        curl_setopt_array($soap_do, $options);

        $output = curl_exec($soap_do);
        var_dump('curl output = ');
        var_dump($output);
        $info = curl_getinfo($soap_do);
        var_dump('curl info = ');
        var_dump($info);
        var_dump('curl http code = ' . $info['http_code']);
        if ($output === false) {
            $err_num = curl_errno($soap_do);
            $err_desc = curl_error($soap_do);
            $httpcode = curl_getinfo($soap_do, CURLINFO_HTTP_CODE);
            var_dump("—CURL FAIL RESPONSE:\ndati={$output}\nerr_num={$err_num}\nerr_desc={$err_desc}\nhttpcode={$httpcode}");
        } else {
            ///Operation completed successfully
            var_dump('success');
        }
        curl_close($soap_do);

        die();
//        return $output;
    }
}
