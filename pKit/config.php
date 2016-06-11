<?php

$php_path = $_SERVER['DOCUMENT_ROOT'];
$pkit_path = __DIR__;

return (object) [
    'VERSION' => '0.1',

    'PROJECT_NAME' => 'pKit',

    'URL_IDENTIFIER' => 'r',

    'CSRF_HASH' => 'x\?/ß#_oPa092ß0?=´á0[)86_,.=e$',

    'PATHS' => (object)[

        'templates' => $php_path.'/pKit/App/Templates',
		
        'pkit' => (object)[

            'system' => $pkit_path.'/System'

        ],

        'site' => 'http://127.0.0.1/pkit'
    ],

    'DATABASE' => (object) [

        'user' => 'root',

        'password' => 'root',

        'port' => 3306,

        'string' => 'mysql:host=127.0.0.1;dbname=pkit'
    ],

    'AUTOLOADER' => (object)[

        'ignore' => [

        ],

        'modify' => [
		
        ]
    ]
];