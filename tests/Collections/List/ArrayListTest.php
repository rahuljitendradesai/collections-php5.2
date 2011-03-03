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
 * @see Collections_List_ArrayList
 */
require 'Collections/List/ArrayList.php';

/**
 * @see Helper_CollectionObject
 */
require 'Helper/CollectionObject.php';



/**
 * @category   Tests
 * @package    Collections
 * @author     Fabio B. Silva
 * @copyright  Copyright (c) 2009-2010 FlexRia Inc. (http://www.flexria.com.br)
 */
class Collections_List_ArrayListTest extends PHPUnit_Framework_TestCase
{

    /**
     * providerConstructValid
     *
     * @return array
     */
    public function providerConstructValid()
    {
        return array(
                array('stdClass'),
                array('integer'),
                array('boolean'),
                array('string'),
                array('array'),
        );
    }

    /**
     * providerConstructValid
     *
     * @return array
     */
    public function providerConstructInvalid()
    {
        return array(
                array('InvalidClassType'),
                array(new stdClass()),
                array(array('')),
                array(1),
        );
    }


    /**
     * @test
     * @dataProvider    providerConstructValid
     */
    public function testConstruct($E)
    {
        $list = new Collections_List_ArrayList($E);
    }


    /**
     * @test
     */
    public function testIsNotEmpty()
    {
        $list = new Collections_List_ArrayList('Helper_CollectionObject');
        $list->add(new Helper_CollectionObject(1,'name 1'));
        $this->assertFalse($list->isEmpty());
    }


    /**
     * @test
     */
    public function testSize()
    {
        $list = new Collections_List_ArrayList('Helper_CollectionObject');

        $list->add(new Helper_CollectionObject(1,'name 1'));
        $list->add(new Helper_CollectionObject(2,'name 2'));
        $list->add(new Helper_CollectionObject(3,'name 3'));

        $this->assertTrue($list->size() == 3);
    }


    /**
     * @test
     */
    public function testContains()
    {
        $list = new Collections_List_ArrayList('Helper_CollectionObject');

        $list->add(new Helper_CollectionObject(1,'name 1'));
        $list->add(new Helper_CollectionObject(2,'name 2'));
        $list->add(new Helper_CollectionObject(3,'name 3'));

        $this->assertTrue($list->contains(new Helper_CollectionObject(1)));
    }


}