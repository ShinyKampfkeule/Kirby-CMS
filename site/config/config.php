<?php
    return [
        'routes' => [
            [
              'pattern' => 'logout',
              'action'  => function() {
        
                if ($user = kirby()->user()) {
                  $user->logout();
                }
        
                go('/home/profil');
        
              }
            ]
        ],
        "debug" => true,
        'api' => [ 
          'allowInsecure' => true,
          'basicAuth' => true
        ]
      ];
?>