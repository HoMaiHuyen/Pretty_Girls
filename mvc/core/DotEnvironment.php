<?php
class DotEnvironment
{
    public function load(): void
    {
        $lines = file(dirname(dirname(__DIR__)) . '/.env');
        foreach ($lines as $line) {
            list($key, $value) = array_pad(explode('=', $line), 2, null);
            $key = trim($key);
            $value = trim($value);
            putenv("$key=$value");
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }
    }
}
