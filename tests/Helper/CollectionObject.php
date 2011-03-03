<?php
/**
 * ObjectElement
 * @author     Fabio B. Silva
 * @copyright  Copyright (c) 2009-2011 FlexRia Inc. (http://www.flexria.com.br)
 */

/**
 * @see Collections_Comparator
 */
require_once 'Collections/Comparator.php';

/**
 * @author     Fabio B. Silva
 * @copyright  Copyright (c) 2009-2011 FlexRia Inc. (http://www.flexria.com.br)
 */
class Helper_CollectionObject implements Collections_Comparator
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }



    /**
     * construct
     *
     * @param   int $id
     * @param   string $name
     */
    public function __construct($id = null, $name = null)
    {
        $this->setId($id);
        $this->setName($name);
    }

    /**
     * Compares the two arguments for order.
     *
     * @param   CollectionObject $arg0
     * @param   CollectionObject $arg1
     * @return  int
     */
    public static function compare($arg0,$arg1)
    {
        if($arg0->name > $arg1->name)
        {
            return 1;
        }
        elseif($arg0->name < $arg1->name)
        {
            return -1;
        }
        else
        {
            return 0;
        }
    }


    /**
     * Compares arguments.
     *
     * @param  mixed $arg
     * @return bool
     */
    public function equals($arg)
    {
        if($arg instanceof self)
        {
            if($this->id == $arg->id)
            {
                return true;
            }
        }
        return false;
    }
}