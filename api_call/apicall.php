<?PHP

  $ch = curl_init();
        
        //https://mrobotics.in/api/recharge?api_token=7ed316f4-b9c1-4b5d-8e45-26f5c7ebdd87&mobile_no=6282552800&amount=349&company_id=5&order_id=MP-569277-ECM&is_stv=false
           
       
        
        $url = "http://apicall.parappuramagencies.in/api/recharge.php?token=";
            $token = "c283207ac97e8bd48d19c3d0eb257d0b31ea04434ebc75091684094260dd064c";
            $payload = json_encode([
                "number"       => '854733391',
                "amount"       => '10',
                "product_code" => 'AIRTEL_PRE' ?? "",
                "client_txid"  => 'TXN-123-DATA'
            ], JSON_PRETTY_PRINT);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
              "Content-Type: application/json",
              "X-API-Token: " . $token,
            ]);
            $response = curl_exec($ch);
            curl_close($ch);
            echo $response;

?>