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
 * @see Collections_List_ArrayListTest
 */
require 'Collections/List/ArrayListTest.php';


/**
 * @category   Tests
 * @package    Collections
 * @author     Fabio B. Silva
 * @copyright  Copyright (c) 2009-2011 FlexRia Inc. (http://www.flexria.com.br)
 */
class Collections_List_AllTests
{

    /**
     * Regular suite
     *
     * All tests except those that require output buffering.
     *
     * @return PHPUnit_Framework_TestSuite
     */
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite();

        // Start remaining tests...
        $suite->addTestSuite('Collections_List_ArrayListTest');

        return $suite;
    }

}