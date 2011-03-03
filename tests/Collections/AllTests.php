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
 * @see Collections_List_AllTests
 */
require_once 'Collections/List/AllTests.php';


/**
 * @see Collections_TypedArrayTest
 */
require_once 'Collections/TypedArrayTest.php';


/**
 * @category   Tests
 * @package    Collections
 * @author     Fabio B. Silva
 * @copyright  Copyright (c) 2009-2010 FlexRia Inc. (http://www.flexria.com.br)
 */
class Collections_AllTests
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
        $suite->addTest(Collections_List_AllTests::suite());

        // Start remaining tests...
        $suite->addTestSuite('Collections_TypedArrayTest');
        return $suite;
    }

}