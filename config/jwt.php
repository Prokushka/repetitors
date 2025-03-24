<?php
return
    [
        'secret' => env('JWT_SECRET', base64_encode('any string'))
    ];
