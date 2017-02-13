<?php
    header("Content-type: text/html; charset=utf-8");
	try{
    $webservice_url = "http://localhost:8080/axis2/services/getConnection?wsdl";//webservice地址
    $client = new SoapClient($webservice_url);
  
	
$param = array( 'sql' => "select * from tb_gisdata");
$wallReductionDamageFactor = $client->__soapCall('visitDB',array($param));
   //$arr = $client->plus(1,2);//调用其中index方法
    $time_end = microtime(true);
    echo 'webservice执行时间差为：'.($time_end-$time_ago).'s</br>';
	var_dump($wallReductionDamageFactor->return);
	} catch (SOAPFault $e) {
		 print $e;
	}


    exit;