<?php
namespace App\Services;

class PathChecker
{
    public function file(string $url, string $extension): bool
    {
        if(file_exists($url)){
            $fileInfo = pathinfo($url);
            if($fileInfo['extension'] == $extension){
                return true;
            }
        }
        return false;
    }
}