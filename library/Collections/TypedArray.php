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
 * @package    Collections
 * @author     Fabio B. Silva
 * @copyright  Copyright (c) 2009-2011 FlexRia Inc. (http://www.flexria.com.br)
 */


/**
 * @category   Collections
 * @package    Collections
 * @author     Fabio B. Silva
 * @copyright  Copyright (c) 2009-2011 FlexRia Inc. (http://www.flexria.com.br)
 */
class Collections_TypedArray implements ArrayAccess, Countable, IteratorAggregate {

    const TYPE_OBJECT   = 'object';
    const TYPE_INTEGER  = 'integer';
    const TYPE_BOOLEAN  = 'boolean';
    const TYPE_STRING   = 'string';
    const TYPE_ARRAY    = 'array';


    /**
     * @var array
     */
    protected $_data;

    /**
     * @var string
     */
    protected $E;


    /**
     * @var array
     */
    protected static $simpleType=array(
            self::TYPE_INTEGER,
            self::TYPE_BOOLEAN,
            self::TYPE_STRING,
            self::TYPE_ARRAY,
    );


    /**
     * @param string $E
     */
    public function __construct($E) {
        if(!is_string($E)) {
            throw new InvalidArgumentException("The construct argument must be a string");
        }

        if(!in_array($E, self::$simpleType)) {
            if(!class_exists($E)) {
                throw new Collections_Exception("Invalid collection type [$E]");
            }
        }
        $this->E = $E;
    }


    /**
     * @return array
     */
    protected function _getData() {
        return $this->_data;
    }


    /**
     * @param array $data
     */
    protected function _setData(array $data) {
        $this->_data = $data;
    }


    /**
     * Return the element with the specified offset
     *
     * @param mixed $index The offset to return
     * @return mixed
     */
    private function get($index) {
        $this->validateInteger($index);

        if(!$this->offsetExists($index)) {
            throw new OutOfBoundsException("Out Of Bounds Index [$index]");
        }
        return $this->_data[$index];
    }

    /**
     * Sets $index to $value
     *
     * @param   mixed $index
     * @param   mixed $value
     * @return  void
     */
    private function set($index, $value) {
        $this->validateInteger($index);
        $this->validateType($value);

        if(is_null($index)) {
            $this->_data[] = $value;
        }
        else {
            $this->_data[$index] = $value;
        }
    }

    /**
     * Check if an offset axists
     *
     * @param   mixed $index
     * @return  boolean Whether or not this object contains $offset
     */
    public function __isset($index) {
        $this->validateInteger($index);
        return isset($this->_data[$index]);
    }


    /**
     * Unset a given offset
     *
     * @param int $index
     */
    public function __unset($index) {
        $this->validateInteger($index);

        if($this->__isset($index)) {
            unset($this->_data[$index]);
        }
    }

    /**
     * @return string
     */
    public function getType() {
        return $this->E;
    }


    /**
     * Check type of item
     *
     * @param   mixed $arg
     * @return  boolean
     */
    public function isValidType($arg) {
        $type = (string) gettype($arg) ;
        if($type == self::TYPE_OBJECT) {
            return ($arg instanceof $this->E);
        }
        return ($type == $this->E);
    }

    /**
     * Check type integer key
     *
     * @param   mixed $arg
     * @return  boolean
     */
    public function isInteger($arg) {
        if(!is_null($arg)) {
            if(!is_int($arg)) {
                return false;
            }
        }
        return true;
    }


    /**
     * Validate integer key
     *
     * @param   mixed $arg
     * @return  void
     */
    private function validateInteger($arg) {
        if(!$this->isInteger($arg)) {
            throw new InvalidArgumentException("The key argument must be integer");
        }
    }


    /**
     * Validate type of item
     *
     * @param   mixed $arg
     * @return  void
     */
    private function validateType($arg) {
        if(!$this->isValidType($arg)) {
            $type = (string) gettype($arg) ;
            if($type == self::TYPE_OBJECT) {
                $type = get_class($type);
            }
            throw new InvalidArgumentException("The collection element must be {$this->E}, but $type given");
        }
    }


    /**
     * Check if an offset axists
     *
     * @param   mixed $index
     * @return  boolean Whether or not this object contains $offset
     */
    public function offsetExists($index) {
        return $this->__isset($index);
    }

    /**
     * Return the element with the specified offset
     *
     * @param mixed $index The offset to return
     * @return mixed
     */
    public function offsetGet($index) {
        return $this->get($index);
    }

    /**
     * Sets $offset to $value
     *
     * @param   mixed $index
     * @param   mixed $value
     * @return  void
     */
    public function offsetSet($index, $value) {
        $this->set($index, $value);
    }

    /**
     * Unset a given offset
     *
     * @param int $index
     */
    public function offsetUnset($index) {
        $this->__unset($index);
    }


    /**
     * Return a ArrayIterator form list content
     *
     * @return ArrayIterator
     */
    public function getIterator() {
        return new ArrayIterator($this->_data);
    }

    /**
     * clear array
     *
     */
    public function clear() {
        $this->_data = array();
    }

    /**
     * Returns the number of elements in this list.
     *
     * @return integer
     */
    public function count() {
        return sizeof($this->_data);
    }


    /**
     * Sort elements.
     *
     * @param mixed
     */
    public function sort($callback) {
        usort($this->_data,$callback);
    }


    /**
     * Filter elements order
     *
     * @return array
     */
    public function filter($callback) {
        return array_filter($this->_data,$callback);
    }


    /**
     * Refresh elements
     *
     * @return void
     */
    public function refresh() {
        $this->_data = array_values($this->_data);
    }


    /**
     * Reverse elements order
     *
     * @return void
     */
    public function reverse() {
        $this->_data = array_reverse($this->_data);
    }


    /**
     * Returns a new array containing all elements contained in this Collections
     *
     * @return array
     */
    public function toArray() {
        return array_values($this->_data);
    }
}