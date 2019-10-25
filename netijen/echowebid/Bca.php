<?php

/**
* Class API BCA
* github.com/echowebid
*
*/

class Bca
{
    private static $config = array(
        'api_key'       => "",
        'api_secret'    => "",
        'client_id'     => "",
        'client_secret' => "",
        'corporate_id'  => "",
        'currency_code' => "IDR",
        'development'   => true,
        'domain'        => "",
        'host'          => "sandbox.bca.co.id",
        'port'          => 443,
        'scheme'        => "https",
        'timezone'      => "Asia/Jakarta",
        'timeout'       => 30,
    );

    private static $accessToken = null;
    private static $timeStamp = null;

    public function __construct($args = [])
    {
        foreach ($args as $key => $value) {
            if (isset(self::$config[$key])) {
                self::$config[$key] = $value;
            }
        }

        self::$timeStamp = self::getIsoTime();
    }

    private function getFullUrl()
    {
        return self::$config['scheme'] . '://' . self::$config['host'] . (self::$config['port'] ? ':' . self::$config['port'] : '') . '/';
    }

    private function getIsoTime()
    {
        return date('o-m-d') . 'T' . date('H:i:s') . '.' . substr(date('u'), 0, 3) . date('P');
    }

    private function httpRequest($url, $headers, $body = "", $method = "POST") 
    {
        $ci = curl_init(); 
        curl_setopt($ci, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ci, CURLOPT_POST, 1); 
        curl_setopt($ci, CURLOPT_POSTFIELDS, (is_array($body) ? http_build_query($body) : $body));
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);  
        curl_setopt($ci, CURLOPT_TIMEOUT, self::$config['timeout']); 
        curl_setopt($ci, CURLOPT_URL, $url);
        $output = curl_exec($ci); 
        $error = curl_errno($ci);
        curl_close($ci);  

        if ($error) {
            throw new \Exception($error);
        }

        return $output;
    }

    private function setAccessToken($accessToken = null)
    {
        //if construct access token not null
        if (!is_null($accessToken))
            self::$accessToken = $accessToken;

        //if private static access token is null
        if (is_null(self::$accessToken))
            self::auth();

        $accessToken = self::$accessToken;

        return $accessToken;
    }

    public function getConfig()
    {
        return self::$config;
    }

    public function auth($onlyToken = false)
    {   
        //client id + client secret
        $client_id = self::$config['client_id'];
        $client_secret  = self::$config['client_secret'];
        
        //header token
        $headerToken = base64_encode("$client_id:$client_secret");

        //headers
        $headers = array("Authorization:Basic $headerToken", "Content-Type:application/x-www-form-urlencoded");
        
        //url
        $fullUrl = self::getFullUrl() . "api/oauth/token";
        
        //body
        $body = array('grant_type' => 'client_credentials');

        //response from http request
        $response = self::httpRequest($fullUrl, $headers, $body);

        //response json to array
        $json = (array) json_decode($response, true);

        //get access token
        $accessToken = isset($json['access_token']) ? $json['access_token'] : null;

        //overwrite private static access token
        self::$accessToken = $accessToken;

        // return
        if ($onlyToken) {
            return $accessToken;
        }

        return $response;
    }

    public function signature($uri, $body = "")
    {
        if (is_array($body))
            $body = json_encode($body, JSON_UNESCAPED_SLASHES);

        $requestBody = strtolower(hash('sha256', $body));

        $stringtoSign = $uri . ":" . self::$accessToken . ":" . $requestBody . ":" . self::$timeStamp;
        return hash_hmac('sha256', $stringtoSign, self::$config['api_secret']);
    }

    public function balance($account_ids = [], $accessToken = null)
    {
        //access token
        $accessToken = self::setAccessToken($accessToken);

        //corporate id
        $corporateId = self::$config['corporate_id'];

        //account ids
        $accounts = urlencode(implode(",", $account_ids));

        //signature
        $uriSignature = "GET:/banking/v3/corporates/{$corporateId}/accounts/{$accounts}";
        $authSignature = self::signature($uriSignature);

        //headers
        $headers = array(
            "Content-Type:application/json",
            "Authorization:Bearer $accessToken",
            "Origin:" . self::$config['domain'],
            "X-BCA-Key:" . self::$config['api_key'],
            "X-BCA-Timestamp:" . self::$timeStamp,
            "X-BCA-Signature:" . $authSignature
        );

        //body
        $body = "";

        //url
        $fullUrl = self::getFullUrl() . "banking/v3/corporates/{$corporateId}/accounts/{$accounts}";
        
        //get response http request
        $response = self::httpRequest($fullUrl, $headers, $body, "GET");

        return $response;
    }

    public function statement($account, $startDate, $endDate, $accessToken = null)
    {
        //access token
        $accessToken = self::setAccessToken($accessToken);

        //corporate id
        $corporateId = self::$config['corporate_id'];

        //signature
        $uriSignature = "GET:/banking/v3/corporates/{$corporateId}/accounts/{$account}/statements?EndDate={$endDate}&StartDate={$startDate}";
        $authSignature = self::signature($uriSignature);

        //headers
        $headers = array(
            "Accept:application/json",
            "Content-Type:application/json",
            "Authorization:Bearer $accessToken",
            "Origin:" . self::$config['domain'],
            "X-BCA-Key:" . self::$config['api_key'],
            "X-BCA-Timestamp:" . self::$timeStamp,
            "X-BCA-Signature:" . $authSignature
        );

        //body
        $body = "";

        //url
        $fullUrl = self::getFullUrl() . "banking/v3/corporates/{$corporateId}/accounts/{$account}/statements?EndDate={$endDate}&StartDate={$startDate}";
        
        //get response http request
        $response = self::httpRequest($fullUrl, $headers, $body, "GET");

        return $response;
    }

    public function fundTransfer($request = [], $accessToken = null)
    {
        //access token
        $accessToken = self::setAccessToken($accessToken);

        //request data
        $structureRequestData = [
            'Amount',
            'BeneficiaryAccountNumber',
            'ReferenceID',
            'Remark1',
            'Remark2',
            'SourceAccountNumber',
            'TransactionID'
        ];

        //body data
        $body = array();
        $body['CorporateID'] = self::$config['corporate_id'];
        $body['CurrencyCode'] = self::$config['currency_code'];
        $body['TransactionDate'] = isset($request['TransactionDate']) ? $request['TransactionDate'] : self::$timeStamp;
        foreach ($structureRequestData as $index ) 
        {
            $body[$index] = isset($request[$index]) ? $request[$index] : null;
        }
        ksort($body);
        $body = json_encode($body, JSON_UNESCAPED_SLASHES);

        //signature
        $uriSignature = "POST:/banking/corporates/transfers";
        $authSignature = self::signature($uriSignature, $body);

        //headers
        $headers = array(
            "Accept:application/json",
            "Content-Type:application/json",
            "Authorization:Bearer $accessToken",
            "Origin:" . self::$config['domain'],
            "X-BCA-Key:" . self::$config['api_key'],
            "X-BCA-Timestamp:" . self::$timeStamp,
            "X-BCA-Signature:" . $authSignature
        );

        //url
        $fullUrl = self::getFullUrl() . "banking/corporates/transfers";
        
        //get response http request
        $response = self::httpRequest($fullUrl, $headers, $body, "POST");

        return $response;
    }

    public function fundTransferDomestic($request = [], $accessToken = null)
    {
        //access token
        $accessToken = self::setAccessToken($accessToken);

        //request data
        $structureRequestData = [
            'Amount',
            'BeneficiaryAccountNumber',
            'BeneficiaryBankCode',
            'BeneficiaryCustType',
            'BeneficiaryCustResidence',
            'BeneficiaryName',
            'ReferenceID',
            'Remark1',
            'Remark2',
            'SourceAccountNumber',
            'TransferType',
            'TransactionID'
        ];
        //body data
        $body = array();
        $body['CorporateID'] = self::$config['corporate_id'];
        $body['CurrencyCode'] = self::$config['currency_code'];
        $body['TransactionDate'] = isset($request['TransactionDate']) ? $request['TransactionDate'] : self::$timeStamp;
        foreach ($structureRequestData as $index ) 
        {
            $body[$index] = isset($request[$index]) ? $request[$index] : null;
        }
        ksort($body);
        $body = json_encode($body, JSON_UNESCAPED_SLASHES);

        //signature
        $uriSignature = "POST:/banking/corporates/transfers/domestic";
        $authSignature = self::signature($uriSignature, $body);

        //headers
        $headers = array(
            "Accept:application/json",
            "ChannelID:" . (isset($request['ChannelID']) && $request['ChannelID'] ? $request['ChannelID'] : ''),
            "CredentialID:" . (isset($request['CredentialID']) && $request['CredentialID'] ? $request['CredentialID'] : ''),
            "Content-Type:application/json",
            "Authorization:Bearer $accessToken",
            "Origin:" . self::$config['domain'],
            "X-BCA-Key:" . self::$config['api_key'],
            "X-BCA-Timestamp:" . self::$timeStamp,
            "X-BCA-Signature:" . $authSignature
        );

        //url
        $fullUrl = self::getFullUrl() . "banking/corporates/transfers/domestic";
        
        //get response http request
        $response = self::httpRequest($fullUrl, $headers, $body, "POST");

        return $response;
    }

    public function sakuku($request = [], $accessToken = null)
    {
        //access token
        $accessToken = self::setAccessToken($accessToken);

        //request data
        $structureRequestData = [
            'merchantId',
            'merchantName',
            'amount',
            'tax',
            'TransactionID',
            'ReferenceID'
        ];

        //body data
        $body = [];
        $body['RequestDate'] = self::$timeStamp;
        $body['CurrencyCode'] = self::$config['currency_code'];
        foreach ($structureRequestData as $index) 
        {
            $body[$index] = isset($request[$index]) ? $request[$index] : null;
        }
        $body = json_encode($body, JSON_UNESCAPED_SLASHES);

        //signature
        $uriSignature = "POST:/sakuku-commerce/payments";
        $authSignature = self::signature($uriSignature, $body);

        //headers
        $headers = array(
            "Accept:application/json",
            "Content-Type:application/json",
            "Authorization:Bearer $accessToken",
            "Origin:" . self::$config['domain'],
            "X-BCA-Key:" . self::$config['api_key'],
            "X-BCA-Timestamp:" . self::$timeStamp,
            "X-BCA-Signature:" . $authSignature
        );

        //url
        $fullUrl = self::getFullUrl() . "sakuku-commerce/payments";
        
        //get response http request
        $response = self::httpRequest($fullUrl, $headers, $body, "POST");

        return $response;
    }

    public function sakukuStatus($merchantId, $paymentId, $accessToken = null)
    {
        //access token
        $accessToken = self::setAccessToken($accessToken);

        //signature
        $uriSignature = "GET:/sakuku-commerce/payments/{$merchantId}/{$paymentId}";
        $authSignature = self::signature($uriSignature);

        //headers
        $headers = array(
            "Accept:application/json",
            "Content-Type:application/json",
            "Authorization:Bearer $accessToken",
            "Origin:" . self::$config['domain'],
            "X-BCA-Key:" . self::$config['api_key'],
            "X-BCA-Timestamp:" . self::$timeStamp,
            "X-BCA-Signature:" . $authSignature
        );

        //body
        $body = "";

        //url
        $fullUrl = self::getFullUrl() . "sakuku-commerce/payments/{$merchantId}/{$paymentId}";
        
        //get response http request
        $response = self::httpRequest($fullUrl, $headers, $body, "GET");

        return $response;
    }

    public function rateForex($currencyCodes = [], $rateType, $accessToken = null)
    {
        //access token
        $accessToken = self::setAccessToken($accessToken);

        //currency code
        $currencyCode = urlencode(implode(",", $currencyCodes));

        //signature
        $uriSignature = "GET:/general/rate/forex?CurrencyCode={$currencyCode}&RateType={$rateType}";
        $authSignature = self::signature($uriSignature);

        //headers
        $headers = array(
            "Accept:application/json",
            "Content-Type:application/json",
            "Authorization:Bearer $accessToken",
            "Origin:" . self::$config['domain'],
            "X-BCA-Key:" . self::$config['api_key'],
            "X-BCA-Timestamp:" . self::$timeStamp,
            "X-BCA-Signature:" . $authSignature
        );

        //body
        $body = "";

        //url
        $fullUrl = self::getFullUrl() . "general/rate/forex?CurrencyCode={$currencyCode}&RateType={$rateType}";
        
        //get response http request
        $response = self::httpRequest($fullUrl, $headers, $body, "GET");

        return $response;
    }

    public function location($latitude, $longitude, $options = [], $accessToken = null)
    {
        //access token
        $accessToken = self::setAccessToken($accessToken);

        //options
        $param['Latitude'] = $latitude;
        $param['Longitude'] = $longitude;
        $param['Count'] = isset($options['count']) ? $options['count'] : null;
        $param['Radius'] = isset($options['radius']) ? $options['radius'] : null;
        $param['SearchBy'] = isset($options['searchBy']) ? $options['searchBy'] : null;
        $param['Value'] = isset($options['value']) ? $options['value'] : null;

        //signature
        $uriSignature = "GET:/general/info-bca/branch?" . http_build_query($param);
        $authSignature = self::signature($uriSignature);

        //headers
        $headers = array(
            "Accept:application/json",
            "Content-Type:application/json",
            "Authorization:Bearer $accessToken",
            "Origin:" . self::$config['domain'],
            "X-BCA-Key:" . self::$config['api_key'],
            "X-BCA-Timestamp:" . self::$timeStamp,
            "X-BCA-Signature:" . $authSignature
        );

        //body
        $body = "";

        //url
        $fullUrl = self::getFullUrl() . "general/info-bca/branch?" . http_build_query($param);
        
        //get response http request
        $response = self::httpRequest($fullUrl, $headers, $body, "GET");

        return $response;
    }

    public function fireTransfer($request = [], $accessToken = null)
    {
        //access token
        $accessToken = self::setAccessToken($accessToken);

        //request data
        $structureRequestData = [
            'Authentication' => [
                'AccessCode',
                'BranchCode',
                'UserID',
                'LocalID',
            ],
            'SenderDetails' => [
                'FirstName',
                'LastName',
                'DateOfBirth',
                'Address1',
                'Address2',
                'City',
                'StateID',
                'PostalCode',
                'CountryID',
                'Mobile',
                'IdentificationType',
                'IdentificationNumber',
                'AccountNumber'
            ],
            'BeneficiaryDetails' => [
                'Name',
                'DateOfBirth',
                'Address1',
                'Address2',
                'City',
                'StateID',
                'PostalCode',
                'CountryID',
                'Mobile',
                'IdentificationType',
                'IdentificationNumber',
                'NationalityID',
                'Occupation',
                'BankCodeType',
                'BankCodeValue',
                'BankCountryID',
                'BankAddress',
                'BankCity',
                'AccountNumber',
            ],
            'TransactionDetails' => [
                'CurrencyID',
                'Amount',
                'PurposeCode',
                'Description1',
                'Description2',
                'DetailOfCharges',
                'SourceOfFund',
                'FormNumber'
            ]
        ];

        //body data
        $body = [];
        $body['Authentication']['CorporateID'] = self::$config['corporate_id'];
        foreach ($structureRequestData as $index => $childs) 
        {
            foreach ($childs as $child)
            {
                $body[$index][$child] = isset($request[$index][$child]) ? $request[$index][$child] : null;
            }
        }
        $body = json_encode($body, JSON_UNESCAPED_SLASHES);

        //signature
        $uriSignature = "POST:/fire/transactions/to-account";
        $authSignature = self::signature($uriSignature, $body);

        //headers
        $headers = array(
            "Accept:application/json",
            "Content-Type:application/json",
            "Authorization:Bearer $accessToken",
            "Origin:" . self::$config['domain'],
            "X-BCA-Key:" . self::$config['api_key'],
            "X-BCA-Timestamp:" . self::$timeStamp,
            "X-BCA-Signature:" . $authSignature
        );

        //url
        $fullUrl = self::getFullUrl() . "fire/transactions/to-account";
        
        //get response http request
        $response = self::httpRequest($fullUrl, $headers, $body, "POST");

        return $response;
    }

    public function fireAccount($request = [], $accessToken = null)
    {
        //access token
        $accessToken = self::setAccessToken($accessToken);

        //request data
        $structureRequestData = [
            'Authentication' => [
                'AccessCode',
                'BranchCode',
                'UserID',
                'LocalID',
            ],
            'BeneficiaryDetails' => [
                'BankCodeType',
                'BankCodeValue',
                'AccountNumber',
            ]
        ];

        //body data
        $body = [];
        $body['Authentication']['CorporateID'] = self::$config['corporate_id'];
        foreach ($structureRequestData as $index => $childs) 
        {
            foreach ($childs as $child)
            {
                $body[$index][$child] = isset($request[$index][$child]) ? $request[$index][$child] : null;
            }
        }
        $body = json_encode($body, JSON_UNESCAPED_SLASHES);

        //signature
        $uriSignature = "POST:/fire/accounts";
        $authSignature = self::signature($uriSignature, $body);

        //headers
        $headers = array(
            "Accept:application/json",
            "Content-Type:application/json",
            "Authorization:Bearer $accessToken",
            "Origin:" . self::$config['domain'],
            "X-BCA-Key:" . self::$config['api_key'],
            "X-BCA-Timestamp:" . self::$timeStamp,
            "X-BCA-Signature:" . $authSignature
        );

        //url
        $fullUrl = self::getFullUrl() . "fire/accounts";
        
        //get response http request
        $response = self::httpRequest($fullUrl, $headers, $body, "POST");

        return $response;
    }

    public function fireAccountBalance($request = [], $accessToken = null)
    {
        //access token
        $accessToken = self::setAccessToken($accessToken);

        //request data
        $structureRequestData = [
            'Authentication' => [
                'AccessCode',
                'BranchCode',
                'UserID',
                'LocalID',
            ],
            'FIDetails' => [
                'AccountNumber',
            ]
        ];

        //body data
        $body = [];
        $body['Authentication']['CorporateID'] = self::$config['corporate_id'];
        foreach ($structureRequestData as $index => $childs) 
        {
            foreach ($childs as $child)
            {
                $body[$index][$child] = isset($request[$index][$child]) ? $request[$index][$child] : null;
            }
        }
        $body = json_encode($body, JSON_UNESCAPED_SLASHES);

        //signature
        $uriSignature = "POST:/fire/accounts/balance";
        $authSignature = self::signature($uriSignature, $body);

        //headers
        $headers = array(
            "Accept:application/json",
            "Content-Type:application/json",
            "Authorization:Bearer $accessToken",
            "Origin:" . self::$config['domain'],
            "X-BCA-Key:" . self::$config['api_key'],
            "X-BCA-Timestamp:" . self::$timeStamp,
            "X-BCA-Signature:" . $authSignature
        );

        //url
        $fullUrl = self::getFullUrl() . "fire/accounts/balance";
        
        //get response http request
        $response = self::httpRequest($fullUrl, $headers, $body, "POST");

        return $response;
    }

    public function fireTransaction($request = [], $accessToken = null)
    {
        //access token
        $accessToken = self::setAccessToken($accessToken);

        //request data
        $structureRequestData = [
            'Authentication' => [
                'AccessCode',
                'BranchCode',
                'UserID',
                'LocalID',
            ],
            'TransactionDetails' => [
                'InquiryBy',
                'InquiryValue'
            ]
        ];

        //body data
        $body = [];
        $body['Authentication']['CorporateID'] = self::$config['corporate_id'];
        foreach ($structureRequestData as $index => $childs) 
        {
            foreach ($childs as $child)
            {
                $body[$index][$child] = isset($request[$index][$index]) ? $request[$index][$index] : null;
            }
        }
        $body = json_encode($body, JSON_UNESCAPED_SLASHES);

        //signature
        $uriSignature = "POST:/fire/accounts/transactions";
        $authSignature = self::signature($uriSignature, $body);

        //headers
        $headers = array(
            "Accept:application/json",
            "Content-Type:application/json",
            "Authorization:Bearer $accessToken",
            "Origin:" . self::$config['domain'],
            "X-BCA-Key:" . self::$config['api_key'],
            "X-BCA-Timestamp:" . self::$timeStamp,
            "X-BCA-Signature:" . $authSignature
        );

        //url
        $fullUrl = self::getFullUrl() . "fire/accounts/transactions";
        
        //get response http request
        $response = self::httpRequest($fullUrl, $headers, $body, "POST");

        return $response;
    }

    public function fireTransactionCash($request = [], $accessToken = null)
    {
        //access token
        $accessToken = self::setAccessToken($accessToken);

        //request data
        $structureRequestData = [
            'Authentication' => [
                'AccessCode',
                'BranchCode',
                'UserID',
                'LocalID',
            ],
            'SenderDetails' => [
                'FirstName',
                'LastName',
                'DateOfBirth',
                'Address1',
                'Address2',
                'City',
                'StateID',
                'PostalCode',
                'CountryID',
                'Mobile',
                'IdentificationType',
                'IdentificationNumber'
            ],
            'BeneficiaryDetails' => [
                'Name',
                'DateOfBirth',
                'Address1',
                'Address2',
                'City',
                'StateID',
                'PostalCode',
                'CountryID',
                'Mobile',
                'IdentificationType',
                'IdentificationNumber',
                'NationalityID',
                'Occupation',
            ],
            'TransactionDetails' => [
                'PIN',
                'SecretQuestion',
                'SecretAnswer',
                'Amount',
                'PurposeCode',
                'Description1',
                'Description2',
                'DetailOfCharges',
                'SourceOfFund',
                'FormNumber'
            ]
        ];

        //body data
        $body = [];
        $body['Authentication']['CorporateID'] = self::$config['corporate_id'];
        $body['TransactionDetails']['CurrencyID'] = self::$config['currency_code'];
        foreach ($structureRequestData as $index => $childs) 
        {
            foreach ($childs as $child)
            {
                $body[$index][$child] = isset($request[$index][$child]) ? $request[$index][$child] : null;
            }
        }
        $body = json_encode($body, JSON_UNESCAPED_SLASHES);

        //signature
        $uriSignature = "POST:/fire/accounts/transactions/cash-transfer";
        $authSignature = self::signature($uriSignature, $body);

        //headers
        $headers = array(
            "Accept:application/json",
            "Content-Type:application/json",
            "Authorization:Bearer $accessToken",
            "Origin:" . self::$config['domain'],
            "X-BCA-Key:" . self::$config['api_key'],
            "X-BCA-Timestamp:" . self::$timeStamp,
            "X-BCA-Signature:" . $authSignature
        );

        //url
        $fullUrl = self::getFullUrl() . "fire/accounts/transactions/cash-transfer";
        
        //get response http request
        $response = self::httpRequest($fullUrl, $headers, $body, "POST");

        return $response;
    }

    public function fireTransactionCashAmend($request = [], $accessToken = null)
    {
        //access token
        $accessToken = self::setAccessToken($accessToken);

        //request data
        $structureRequestData = [
            'Authentication' => [
                'AccessCode',
                'BranchCode',
                'UserID',
                'LocalID',
            ],
            'SenderDetails' => [
                'FirstName',
                'LastName',
                'DateOfBirth',
                'Address1',
                'Address2',
                'City',
                'StateID',
                'PostalCode',
                'CountryID',
                'Mobile',
                'IdentificationType',
                'IdentificationNumber'
            ],
            'BeneficiaryDetails' => [
                'Name',
                'DateOfBirth',
                'Address1',
                'Address2',
                'City',
                'StateID',
                'PostalCode',
                'CountryID',
                'Mobile',
                'IdentificationType',
                'IdentificationNumber',
                'NationalityID',
                'Occupation',
            ],
            'TransactionDetails' => [
                'SecretQuestion',
                'SecretAnswer',
                'Description1',
                'Description2',
            ]
        ];

        //body data
        $body = [];
        $body['Authentication']['CorporateID'] = self::$config['corporate_id'];
        foreach ($structureRequestData as $index => $childs) 
        {
            foreach ($childs as $child)
            {
                $body[$index][$child] = isset($request[$index][$child]) ? $request[$index][$child] : null;
            }
        }
        $body = json_encode($body, JSON_UNESCAPED_SLASHES);

        //signature
        $uriSignature = "POST:/fire/accounts/transactions/cash-transfer/amend";
        $authSignature = self::signature($uriSignature, $body);

        //headers
        $headers = array(
            "Accept:application/json",
            "Content-Type:application/json",
            "Authorization:Bearer $accessToken",
            "Origin:" . self::$config['domain'],
            "X-BCA-Key:" . self::$config['api_key'],
            "X-BCA-Timestamp:" . self::$timeStamp,
            "X-BCA-Signature:" . $authSignature
        );

        //url
        $fullUrl = self::getFullUrl() . "fire/accounts/transactions/cash-transfer/amend";
        
        //get response http request
        $response = self::httpRequest($fullUrl, $headers, $body, "POST");

        return $response;
    }

    public function fireTransactionCashCancel($request = [], $accessToken = null)
    {
        //access token
        $accessToken = self::setAccessToken($accessToken);

        //request data
        $structureRequestData = [
            'Authentication' => [
                'AccessCode',
                'BranchCode',
                'UserID',
                'LocalID',
            ],
            'TransactionDetails' => [
                'FormNumber',
                'Amount',
            ]
        ];

        //body data
        $body = [];
        $body['Authentication']['CorporateID'] = self::$config['corporate_id'];
        $body['Authentication']['CurrencyID'] = self::$config['currency_code'];
        foreach ($structureRequestData as $index => $childs) 
        {
            foreach ($childs as $child)
            {
                $body[$index][$child] = isset($request[$index][$child]) ? $request[$index][$child] : null;
            }
        }
        $body = json_encode($body, JSON_UNESCAPED_SLASHES);

        //signature
        $uriSignature = "POST:/fire/accounts/transactions/cash-transfer/cancel";
        $authSignature = self::signature($uriSignature, $body);

        //headers
        $headers = array(
            "Accept:application/json",
            "Content-Type:application/json",
            "Authorization:Bearer $accessToken",
            "Origin:" . self::$config['domain'],
            "X-BCA-Key:" . self::$config['api_key'],
            "X-BCA-Timestamp:" . self::$timeStamp,
            "X-BCA-Signature:" . $authSignature
        );

        //url
        $fullUrl = self::getFullUrl() . "fire/accounts/transactions/cash-transfer/cancel";
        
        //get response http request
        $response = self::httpRequest($fullUrl, $headers, $body, "POST");

        return $response;
    }

    public function va($companyCode, $customerNumber, $requestId, $accessToken = null)
    {
        //access token
        $accessToken = self::setAccessToken($accessToken);

        //signature
        $uriSignature = "GET:/va/payments/?CompanyCode={$companyCode}&CustomerNumber={$customerNumber}&RequestId={$requestId}";
        $authSignature = self::signature($uriSignature);

        //headers
        $headers = array(
            "Accept:application/json",
            "Content-Type:application/json",
            "Authorization:Bearer $accessToken",
            "Origin:" . self::$config['domain'],
            "X-BCA-Key:" . self::$config['api_key'],
            "X-BCA-Timestamp:" . self::$timeStamp,
            "X-BCA-Signature:" . $authSignature
        );

        //body
        $body = "";

        //url
        $fullUrl = self::getFullUrl() . "va/payments/?CompanyCode={$companyCode}&CustomerNumber={$customerNumber}&RequestId={$requestId}";
        
        //get response http request
        $response = self::httpRequest($fullUrl, $headers, $body, "GET");

        return $response;
    }
}

