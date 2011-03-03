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
 * @package    Collections_Comparator
 * @author     Fabio B. Silva
 * @copyright  Copyright (c) 2009-2011 FlexRia Inc. (http://www.flexria.com.br)
 */


/**
 * @category   Collections
 * @package    Collections_Comparator
 * @author     Fabio B. Silva
 * @copyright  Copyright (c) 2009-2011 FlexRia Inc. (http://www.flexria.com.br)
 */
interface Collections_Comparator
{
    
    /**
     * Compares the two arguments for order.
     *
     * It returns an integer value based on the comparison result:
     * <code>
     * Returns >  0 if a > b
     * Returns == 0 if a == b
     * Returns <  0 if a < b
     * </code>
     *
     * @param   mixed $a
     * @param   mixed $b
     * @return  integer The comparison result
     */
    public static function compare($a,$b);

    
    /**
     * Compares arguments.
     *
     * It returns boolean value based on the comparison result:
     * <code>
     * Returns true  if this->id == $arg->id
     * Returns false if this->id != $arg->id
     * </code>
     *
     * @param   mixed $arg
     * @return  bool
     */
    public function equals($arg);
}