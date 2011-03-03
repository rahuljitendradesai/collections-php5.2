<?php
/**
 * Collections
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 *
 * @category   Tests
 * @package    Collections
 * @author     Fabio B. Silva
 * @copyright  Copyright (c) 2009-2011 FlexRia Inc. (http://www.flexria.com.br)
 */


/**
 * @see Collections_TypedArray
 */
require_once 'Collections/TypedArray.php';

/**
 * @category   Tests
 * @package    Collections
 * @author     Fabio B. Silva
 * @copyright  Copyright (c) 2009-2011 FlexRia Inc. (http://www.flexria.com.br)
 */
class Collections_TypedArrayTest extends PHPUnit_Framework_TestCase {

    public function sortFunction($arg0,$arg1) {
        if($arg0 > $arg1) {
            return 1;
        }
        elseif($arg0 < $arg1) {
            return -1;
        }
        else {
            return 0;
        }
    }

    public function filterFunction($arg) {
        return ($arg % 2) == 0;
    }


    /**
     * @test
     */
    public function testConstruct() {
        $list = new Collections_TypedArray(Collections_TypedArray::TYPE_STRING);
    }


    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function testConstructInvalidArgumentException() {
        new Collections_TypedArray(123);
    }


    /**
     * @test
     * @expectedException Collections_Exception
     */
    public function testConstructCollectionsException() {
        new Collections_TypedArray('InvalidClassType');
    }


    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function testElementType() {
        $array   = new Collections_TypedArray(Collections_TypedArray::TYPE_INTEGER);
        $array[] = "string";
    }


    /**
     * @test
     */
    public function testArrayAccess() {
        try {
            $array      = new Collections_TypedArray(Collections_TypedArray::TYPE_INTEGER);
            $array[1]   = 1;
            $array[2]   = 2;
            $array[3]   = $array[2] + 1;
            $array[4]   = $array[3] + 1;

            $this->assertTrue(true);
        }
        catch (Exception $exc) {
            $this->fail($exc->getMessage());
        }
    }


    /**
     * @test
     */
    public function testArrayIterator() {
        $array      = new Collections_TypedArray(Collections_TypedArray::TYPE_INTEGER);
        $array[1]   = 1;
        $array[2]   = 2;
        $iterator   = $array->getIterator();

        $this->isInstanceOf('ArrayIterator')->evaluate($iterator);
    }

    /**
     * @test
     */
    public function testClear() {
        $array      = new Collections_TypedArray(Collections_TypedArray::TYPE_INTEGER);
        $array[1]   = 1;
        $array[2]   = 2;

        $array->clear();

        $this->assertEquals(count($array), 0);
    }

    /**
     * @test
     */
    public function testCount() {
        $array      = new Collections_TypedArray(Collections_TypedArray::TYPE_INTEGER);
        $array[1]   = 1;
        $array[2]   = 2;
        $array[3]   = 3;
        $array[4]   = 4;
        $this->assertEquals(count($array), 4);
    }


    /**
     * @test
     */
    public function testSort() {
        $array     = new Collections_TypedArray(Collections_TypedArray::TYPE_INTEGER);
        $array[]   = 2;
        $array[]   = 1;
        $array[]   = 0;

        $array->sort(array(&$this,'sortFunction'));

        $this->assertEquals($array[0], 0);
        $this->assertEquals($array[1], 1);
        $this->assertEquals($array[2], 2);
    }


    /**
     * @test
     */
    public function testFilter() {
        $array     = new Collections_TypedArray(Collections_TypedArray::TYPE_INTEGER);
        $array[]   = 2;
        $array[]   = 3;
        $array[]   = 4;

        $filterArr = $array->filter(array(&$this,'filterFunction'));

        $this->assertEquals(count($filterArr), 2);
    }


    /**
     * @test
     */
    public function testRefresh() {
        $array     = new Collections_TypedArray(Collections_TypedArray::TYPE_INTEGER);
        $array[1]  = 1;
        $array[2]  = 2;
        $array[3]  = 3;

        $array->refresh();

        $this->assertEquals($array[0], 1);
        $this->assertEquals($array[1], 2);
        $this->assertEquals($array[2], 3);
    }


    /**
     * @test
     */
    public function testReverse() {
        $array    = new Collections_TypedArray(Collections_TypedArray::TYPE_INTEGER);
        $array[]  = 1;
        $array[]  = 2;
        $array[]  = 3;

        $array->reverse();

        $this->assertEquals($array[0], 3);
        $this->assertEquals($array[1], 2);
        $this->assertEquals($array[2], 1);
    }


    /**
     * @test
     */
    public function testToArray() {
        $array      = new Collections_TypedArray(Collections_TypedArray::TYPE_INTEGER);
        $array[]    = 2;
        $array[]    = 1;
        $array[]    = 0;
        $toArray    = $array->toArray();

        $this->assertTrue(is_array($toArray) && sizeof($toArray) == 3);
    }

}