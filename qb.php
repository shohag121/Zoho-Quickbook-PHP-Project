<?php

require_once(__DIR__ . '/vendor/autoload.php');
use QuickBooksOnline\API\DataService\DataService;

$config = include('qb-config.php');

$qbAuth = new QBAuth(__DIR__ . '/log/');

$dataService = DataService::Configure(array(
'auth_mode' => 'oauth2',
'ClientID' => $config['client_id'],
'ClientSecret' =>  $config['client_secret'],
'RedirectURI' => $config['oauth_redirect_uri'],
'scope' => $config['oauth_scope'],
'baseUrl' => "development"
));

$accessToken = require 'refreshToken.php';
$dataService->updateOAuth2Token($accessToken);

$CompanyInfo = $dataService->getCompanyInfo();

var_dump($CompanyInfo);