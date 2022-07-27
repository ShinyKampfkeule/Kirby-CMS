<?php
    return [
        "debug" => true,
        "api" => [
            "allowInsecure" => true,
            "basicAuth" => true
        ]
        "auth" => [ 
            "trials" => 10, 
            "timeout" => 3600,
            "methods" => ["password"]
        ]
    ];
?>