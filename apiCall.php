<?php

require_once(__DIR__ . '/vendor/autoload.php');
use QuickBooksOnline\API\DataService\DataService;



function makeAPICall()
{

    $qbAuth = new QBAuth(__DIR__ . '/log/');
    // Create SDK instance
    $config = include('qb-config.php');
    $dataService = DataService::Configure(array(
        'auth_mode' => 'oauth2',
        'ClientID' => $config['client_id'],
        'ClientSecret' =>  $config['client_secret'],
        'RedirectURI' => $config['oauth_redirect_uri'],
        'scope' => $config['oauth_scope'],
        'baseUrl' => "development"
    ));

    /*
     * Retrieve the accessToken value from session variable
     */
    $accessToken = $qbAuth->getToken();

    /*
     * Update the OAuth2Token of the dataService object
     */
    $dataService->updateOAuth2Token($accessToken);
    $companyInfo = $dataService->getCompanyInfo();
    $address = "QBO API call Successful!! Response Company name: " . $companyInfo->CompanyName . " Company Address: " . $companyInfo->CompanyAddr->Line1 . " " . $companyInfo->CompanyAddr->City . " " . $companyInfo->CompanyAddr->PostalCode;
    print_r($address);
    return $companyInfo;
}

$result = makeAPICall();

