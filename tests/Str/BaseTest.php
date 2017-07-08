<?php
// +----------------------------------------------------------------------
// | BaseTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Str;

use limx\Support\Str;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    protected $author = 'limx';
    protected $name = '李铭昕';

    public function testAscii()
    {
        $this->assertEquals('W', Str::ascii('Ω'));
    }

    public function testCamel()
    {
        $this->assertEquals('testCase', Str::camel('Test-Case'));
        $this->assertEquals('testCase', Str::camel('test_case'));
        $this->assertEquals('testCase', Str::camel('Test_case'));
    }

    public function testContains()
    {
        $this->assertTrue(Str::contains('limx', 'l'));
    }

    public function testEndsWith()
    {
        $this->assertTrue(Str::endsWith('limx', 'mx'));
    }

    public function testFinish()
    {
        $this->assertEquals('limx', Str::finish('limx', 'x'));
        $this->assertEquals('limx', Str::finish('lim', 'x'));
        $this->assertEquals('https://a.cn/', Str::finish('https://a.cn/', '/'));
        $this->assertEquals('https://a.cn/', Str::finish('https://a.cn', '/'));
    }

    public function testIs()
    {
        $this->assertTrue(Str::is('li*', 'limx'));
        $this->assertTrue(!Str::is('li*', 'lmx'));
    }

    public function testKebab()
    {
        $this->assertEquals('hello-world', Str::kebab('Hello    World'));
        $this->assertEquals('hello-world', Str::kebab('HelloWorld'));
    }

    public function testLength()
    {
        $this->assertTrue(Str::length('limx') === 4);
        $this->assertTrue(Str::length('李铭昕') === 3);
    }

    public function testLimit()
    {
        $this->assertEquals('limx...', Str::limit('limx and Agnes', 4));
    }

    public function testLower()
    {
        $this->assertEquals('limx and agnes', Str::lower('Limx AND Agnes'));
    }

    public function testWords()
    {
        $this->assertEquals('limx and...', Str::words('limx and anges', 2));
    }

    public function testParseCallback()
    {
        $result = Str::parseCallback('IndexController@index');
        $this->assertEquals([
            'IndexController',
            'index'
        ], $result);
    }

    public function testPlural()
    {
        if (class_exists('lmx\\Support\\Pluralizer')) {
            $this->assertEquals('cats', Str::plural('cat', 2));
        } else {
            $this->assertEquals('cat', Str::plural('cat', 2));
        }
    }

    public function testRandom()
    {
        // $this->assertTrue(Str::length(Str::random(12)) === 12);
        $this->assertTrue(Str::length(Str::quickRandom(12)) === 12);
    }

    public function testReplace()
    {
        $this->assertEquals('limxandAgnes', Str::replaceArray(' ', ['', 'A'], 'limx and gnes'));
        $this->assertEquals('limx And agnes', Str::replaceFirst('a', 'A', 'limx and agnes'));
        $this->assertEquals('limx and Agnes', Str::replaceLast('a', 'A', 'limx and agnes'));
    }

    public function testUpper()
    {
        $this->assertEquals('HELLO WORLD', Str::upper('Hello world'));
    }

    public function testTitle()
    {
        $this->assertEquals('Limx And Agnes', Str::title('limx and Agnes'));
    }

    public function testSlug()
    {
        $this->assertEquals('limx-and-agnes', Str::slug('limx and Agnes'));
    }

    public function testSnake()
    {
        $this->assertEquals('limx_and_agnes', Str::snake('LimxAndAgnes'));
        $this->assertEquals('limx_and_agnes', Str::snake('limxAndAgnes'));
    }

    public function testStartsWith()
    {
        $this->assertTrue(Str::startsWith('limx_and_agnes', 'lim'));
    }

    public function testStudly()
    {
        $this->assertEquals('LimxAndAgnes', Str::studly('limx_and_agnes'));
    }

    public function testSubstr()
    {
        $this->assertEquals('limx a', Str::substr('limx and Agnes', 0, 6));
    }

    public function testUcfirst()
    {
        $this->assertEquals('Limx and Agnes', Str::ucfirst('limx and Agnes'));

    }

    public function testStrAfter()
    {
        $this->assertEquals('nah', Str::after('hannah', 'han'));
        $this->assertEquals('nah', Str::after('hannah', 'n'));
        $this->assertEquals('nah', Str::after('ééé hannah', 'han'));
        $this->assertEquals('hannah', Str::after('hannah', 'xxxx'));
        $this->assertEquals('hannah', Str::after('hannah', ''));
    }


}