<?php


namespace Application\StdLib;


class Url
{
    static public function removeTrailingSlash($url)
    {
        if ($url === '/') {
            return '/';
        }

        if (substr($url, -1) !== '/') {
            return $url;
        }

        return substr($url, 0, strlen($url) - 1);
    }
}