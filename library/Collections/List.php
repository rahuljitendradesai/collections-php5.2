<?php
/**
 * Collections
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 *
 * @category   Collections
 * @package    Collections_Interface
 * @author     Fabio B. Silva
 * @copyright  Copyright (c) 2009-2011 FlexRia Inc. (http://www.flexria.com.br)
 */


/**
 * @see Collections_Collection
 */
require 'Collections/Collection.php';


/**
 * @category   Collections
 * @package    Collections_Interface
 * @author     Fabio B. Silva
 * @copyright  Copyright (c) 2009-2011 FlexRia Inc. (http://www.flexria.com.br)
 */
interface Collections_List extends Collections_Collection
{

    /**
     * Return the element with the specified offset
     *
     * @param mixed $offset The offset to return
     * @return mixed
     */
    public function get($index);


    /**
     * Sets $index to $value
     *
     * @param   mixed $index
     * @param   mixed $element
     * @return  void
     */
    public function set($index, $element);


    /**
     * Return the index with the specified element
     *
     * @param   mixed $object
     * @return  int
     */
    public function indexOf($o);


    /**
     * Return the last index with the specified element
     *
     * @param   mixed $object
     * @return  int
     */
    public function lastIndexOf($o);
}