<?php
// Zoho CRM API Required Configuration
return $conf = array(
    'apiBaseUrl' => 'www.zohoapis.com',
    'client_id'=>'',
    'client_secret'=>'',
    'redirect_uri'=>'',
    'accounts_url'=>'https://accounts.zoho.com',
    'currentUserEmail' => '',
    'token_persistence_path'=> dirname(__FILE__).'/log/',
    'applicationLogFilePath'=> dirname(__FILE__).'/log/',
);
