<?php
/**
 * Created by PhpStorm.
 * User: prestataire
 * Date: 09/11/15
 * Time: 17:28
 */

namespace Test;

use ClassExample\DynamicPropertyExample;
use ClassExample\PropertyExample;
use ClassExample\ReferenceExample;
use \Interfaces\TestInterface;

class MainTest implements TestInterface
{
    public function runTest()
    {
        $this->testOne();
        $this->testTwo();
        $this->testThree();
        $this->testFoor();
        $this->testFive();
        $this->testSix();
        $this->testSept();
        $this->testHuit();
    }

    public function testOne()
    {
        $var = array(
            'a simple string' => "in an array of 5 elements",
            'a float' => 1.0,
            'an integer' => 1,
            'a boolean' => true,
            'an empty array' => array(),
        );

        dump($var);
    }

    public function testTwo()
    {
        $var = "This is a multi-line string.\n";
        $var .= "Hovering a string shows its length.\n";
        $var .= "The length of UTF-8 strings is counted in terms of UTF-8 characters.\n";
        $var .= "Non-UTF-8 strings length are counted in octet size.\n";
        $var .= "Because of this `\xE9` octet (\\xE9),\n";
        $var .= "this string is not UTF-8 valid, thus the `b` prefix.\n";

        dump($var);
    }

    public function testThree()
    {
        $var = new PropertyExample();
        dump($var);
    }

    public function testFoor()
    {
        $var = new DynamicPropertyExample();
        $var->undeclaredProperty = 'Runtime added dynamic properties have `"` around their name.';
        dump($var);
    }

    public function testFive()
    {
        $var = new ReferenceExample();
        $var->aCircularReference = $var;
        dump($var);
    }

    public function testSix()
    {
        $var = new \ErrorException(
            "For some objects, properties have special values\n"
            ."that are best represented as constants, like\n"
            ."`severity` below. Hovering displays the value (`2`).\n",
            0,
            E_WARNING
        );
        dump($var);
    }

    public function testSept()
    {
        $var = array();
        $var[0] = 1;
        $var[1] =& $var[0];
        $var[1] += 1;
        $var[2] = array("Hard references (circular or sibling)");
        $var[3] =& $var[2];
        $var[3][] = "are dumped using `&number` prefixes.";
        dump($var);
    }

    public function testHuit()
    {
        $var = new \ArrayObject();
        $var[] = "Some resources and special objects like the current";
        $var[] = "one are sometimes best represented using virtual";
        $var[] = "properties that describe their internal state.";
        dump($var);
    }
}