<?php


class QBAuth
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getToken()
    {
        $this->ensureFile();
        $content = file_get_contents($this->path . '/qb-auth.txt');
        if (!$content) throw new Exception('No token exist for QB.');

        return unserialize($content);

    }

    public function setToken($token)
    {
        $this->ensureFile();
        $serializedToken = serialize($token);

        $file = fopen($this->path . '/qb-auth.txt',"w");
        $number = fwrite($file, $serializedToken);
        fclose($file);
        if (!$number){
            throw new Exception('Auth token cant be Written.');
        }
    }

    private function ensureFile()
    {
        $file = $this->path . '/qb-auth.txt';
        if ( ! file_exists($file) ) {
            touch($file);
        }
    }

}