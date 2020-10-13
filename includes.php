<?php
/**
 * All include file goes here
 */

use zcrmsdk\crm\setup\restclient\ZCRMRestClient;

include_once 'vendor/autoload.php';
$conf = include_once 'config.php';
include_once 'healper.php';



//Inatiating  Zoho crm rest client
ZCRMRestClient::initialize($conf);
