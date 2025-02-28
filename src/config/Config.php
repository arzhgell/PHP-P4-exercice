<?php
class Config {
    private static $config = [
        'db' => [
            'host' => 'db',
            'name' => 'artbox',
            'user' => 'user',
            'pass' => 'password'
        ],
        'app' => [
            'url' => 'http://localhost',
            'upload_dir' => '/var/www/html/public/uploads/'
        ]
    ];

    public static function get($key) {
        $keys = explode('.', $key);
        $value = self::$config;

        foreach ($keys as $k) {
            if (!isset($value[$k])) {
                return null;
            }
            $value = $value[$k];
        }

        return $value;
    }
} 