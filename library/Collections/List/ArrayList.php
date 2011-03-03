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
 * @package    Collections_List
 * @author     Fabio B. Silva
 * @copyright  Copyright (c) 2009-2010 FlexRia Inc. (http://www.flexria.com.br)
 */


/**
 * @see Collections_Exception
 */
require_once 'Collections/Exception.php';

/**
 * @see Collections_List
 */
require_once 'Collections/List.php';

/**
 * @see Collections_Collection
 */
require_once 'Collections/Collection.php';

/**
 * @see Collections_TypedArray
 */
require_once 'Collections/TypedArray.php';

/**
 * @see Collections_Comparator
 */
require_once 'Collections/Comparator.php';


/**
 * @category   Collections
 * @package    Collections_List
 * @author     Fabio B. Silva
 * @copyright  Copyright (c) 2009-2011 FlexRia Inc. (http://www.flexria.com.br)
 */
class Collections_List_ArrayList implements Collections_List, Countable, IteratorAggregate {

    /**
     * @var Collections_TypedArray
     */
    protected $_data;


    /**
     * @param string $E
     */
    public function __construct($E) {
        $this->_data = new Collections_TypedArray($E);
    }


    /**
     * @return string
     */
    public function getCollectionsType() {
        return $this->_data->getType();
    }


    /**
     * Returns the number of elements in this collection.
     *
     * @return  int
     */
    public function size() {
        return $this->_data->count();
    }

    /**
     * Returns true if this collection contains no elements.
     *
     * @param   mixed $element
     * @return  bool
     */
    public function isEmpty() {
        return $this->size() == 0;
    }

    /**
     * Returns true if this collection contains the specified element.
     *
     * @param   mixed $element
     * @return  bool
     */
    public function contains($element) {
        return ($this->indexOf($element) != -1);
    }


    /**
     * Adds the specified object at the end of this Collections.
     *
     * @param mixed $element
     */
    public function add($element) {
        $this->_data[] = $element;
    }


    /**
     * Removes the element at the specified position in this list.
     *
     * @param   int $index
     * @return  mixed
     */
    public function remove($index) {
        $element = $this->_data[$index];
        unset($this->_data[$location]);
        return $element;
    }


    /**
     * Return a interator from this collecton
     *
     * @return Iterator
     */
    public function iterator() {
        return new ArrayIterator($this->_data);
    }


    /**
     * Searches this Collections for all other Collections elements.
     *
     * @param   Collections_Collection
     * @return  bool
     */
    public function containsAll(Collections_Collection $c) {
        foreach ($c as $object) {
            if(!$this->contains($object)) {
                return false;
            }
        }
        return true;
    }


    /**
     * Adds a Collections elements at the end of this Collections.
     *
     * @param   Collections_Collection
     * @return  void
     */
    public function addAll(Collections_Collection $c) {
        foreach ($c as $object) {
            $this->add($object);
        }
    }


    /**
     * Remove a Collections elements at this Collections.
     *
     * @param   Collections_Collection
     * @return  void
     */
    public function removeAll(Collections_Collection $c) {
        foreach ($c as $object) {
            $this->remove($object);
        }
    }


    /**
     * Removes all elements from this Collections, leaving it empty.
     */
    public function clear() {
        $this->_data->clear();
    }


    /**
     * Returns a new array containing all elements contained in this Collections
     *
     * @return array
     */
    public function toArray() {
        return $this->_data->toArray();
    }


    /**
     * Returns the element at the specified position in this list.
     *
     * @param mixed $offset The offset to return
     * @return mixed
     */
    public function get($index) {
        return $this->_data[$index];
    }


    /**
     * Replaces the element at the specified position in this list with the specified element.
     *
     * @param   mixed $index
     * @param   mixed $element
     * @return  void
     */
    public function set($index, $element) {
        $this->_data[$index] = $element;
    }


    /**
     * Return the index with the specified element
     *
     * @param   mixed $element
     * @return  int
     */
    public function indexOf($element) {
        foreach ($this->_data as $index => $item) {
            if($element instanceof Collections_Comparator) {
                if($element->equals($item)) {
                    return $index;
                }
            }
            else {
                if($element == $item) {
                    return $index;
                }
            }
        }

        return -1;
    }


    /**
     * Return the last index with the specified element
     *
     * @param   mixed $object
     * @return  int
     */
    public function lastIndexOf($element) {
        $lastIndex = -1;
        foreach ($this->_data as $index -> $item) {
            if($element instanceof Collections_Comparator) {
                if($element->equals($item)) {
                    $lastIndex = $index;
                }
            }
            else {
                if($element == $item) {
                    $lastIndex = $index;
                }
            }
        }
        return $lastIndex;
    }



    /**
     * Return a ArrayIterator form list content
     *
     * @return ArrayIterator
     */
    public function getIterator() {
        return $this->_data->getIterator();
    }



    /**
     * Sort elements.
     */
    public function sort() {
        $class = $this->getCollectionsType();
        if(is_subclass_of($class,'Collections_Comparator')) {
            throw new Collections_Exception("This Collection type not implements Collections_Comparator");
        }
        $this->_data->sort(array($class,'compare'));
    }

    /**
     * Returns the number of elements in this list.
     *
     * @return integer
     */
    public function count() {
        return $this->size();
    }


}