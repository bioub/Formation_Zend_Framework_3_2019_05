<?php


namespace ApplicationTest\StdLib;


use Application\StdLib\Url;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    public function testRemoveTrailingSlash()
    {
        $this->assertEquals('/societes', Url::removeTrailingSlash('/societes/'));
        $this->assertEquals('/societes', Url::removeTrailingSlash('/societes'));
        $this->assertEquals('/', Url::removeTrailingSlash('/'));
    }
}