<?php
    class CurlRequest {

        public static function method($method = 'GET', $params, $origin = '') 
        {
            try {
                $headers = ["Origin: $origin; Referer: $origin"];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$params['url']);
                if(strtoupper($method) === 'POST') {
                    array_push($headers, 'Content-Type: application/x-www-form-urlencoded; charset=utf-8');
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS,$params['request']);
                }
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $response = curl_exec ($ch);
                curl_close ($ch);
                return $response;
            } catch (Exception $e) {
                echo $e->getMessage()." Error catch in\n";
                throw $e;
            }
        }
        
    }