<?php

class Posts
{
    public function fetchData()
    {
        if ($_GET['all'] != null) {
            $service_url = 'https://jsonplaceholder.typicode.com/posts';
        } elseif ($_GET['user'] != null) {
            $userId = $_GET['user'];
            $service_url = "https://jsonplaceholder.typicode.com/users/$userId/posts";
        } else
            return null;

        $curl = curl_init($service_url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $curl_response = curl_exec($curl);

        if ($curl_response === false) {

            $info = curl_getinfo($curl);

            curl_close($curl);

            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }

        curl_close($curl);

        $decoded = json_decode($curl_response);

        if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {

            die('error occured: ' . $decoded->response->errormessage);

        }

        return($decoded);
    }
}
