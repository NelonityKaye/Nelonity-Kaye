<?php
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : 'Logs bot';
    $url = isset($_POST['url']) ? $_POST['url'] : 'https://raw.githubusercontent.com/NelonityKaye/Nelonity-Kaye/main/embed.php';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    
    if ($password == 'pass')
    {

        $webhookurl = $url;
        
        $timestamp = date("c", strtotime("now"));
        
        $json_data = json_encode([

            "username" => "Logs bot",
            
            "embeds" => [
                [
                    "title" => "Anziar|RP",
                    "description" => $content,
                    "timestamp" => $timestamp,
                    "color" => hexdec( "a0a0a0" ),
        
                ]
            ]
        
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
        
        $ch = curl_init( $webhookurl );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        
        $response = curl_exec( $ch );
        curl_close( $ch );
    }
?>
