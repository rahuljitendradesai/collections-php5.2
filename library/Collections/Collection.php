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
 * @package    Collections_Collection
 * @author     Fabio B. Silva
 * @copyright  Copyright (c) 2009-2011 FlexRia Inc. (http://www.flexria.com.br)
 */

/**
 * @category   Collections
 * @package    Collections_Collection
 * @author     Fabio B. Silva
 * @copyright  Copyright (c) 2009-20101 FlexRia Inc. (http://www.flexria.com.br)
 */
interface Collections_Collection
{
    /**
     * Return the size of this Collections
     *
     * @return  int
     */
    public function size();

    /**
     * Check if the list is empty
     *
     * @param   mixed $object
     * @return  bool
     */
    public function isEmpty();

    /**
     * Searches this Collections for the specified object.
     *
     * @param object the object to search for.
     * @return bool
     */
    public function contains($element);


    /**
     * Adds the specified object at the end of this Collections.
     *
     * @param mixed
     */
    public function add($element);


    /**
     * Remove a element
     *
     * @param   mixed $object
     * @return  int
     */
    public function remove($element);


    /**
     * Return a interator from this collecton
     *
     * @return Iterator
     */
    public function iterator();


    /**
     * Searches this Collections for all other Collections elements.
     *
     * @param   Collections_Collection
     * @return  bool
     */
    public function containsAll(Collections_Collection $c);


    /**
     * Adds a Collections elements at the end of this Collections.
     *
     * @param   Collections_Collection
     * @return  bool
     */
    public function addAll(Collections_Collection $c);


    /**
     * Remove a Collections elements at this Collections.
     *
     * @param   Collections_Collection
     * @return  bool
     */
    public function removeAll(Collections_Collection $c);


    /**
     * Removes all elements from this Collections, leaving it empty.
     */
    public function clear();


    /**
     * Sort     elements.
     */
    public function sort();

    
    /**
     * Returns a new array containing all elements contained in this Collections
     *
     * @return array
     */
    public function toArray();
}