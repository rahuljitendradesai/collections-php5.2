<?php
/**
 * Collection
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 *
 * @author     Fabio B. Silva
 * @copyright  Copyright (c) 2009-2011 FlexRia Inc. (http://www.flexria.com.br)
 */

/*
 * Set error reporting.
*/
error_reporting(E_ALL|E_STRICT);

/*
 * include_path.
*/
set_include_path(implode(PATH_SEPARATOR, array(
        './tests',
        '../library',
        get_include_path()
)));


if (extension_loaded('xdebug'))
{
    ini_set('xdebug.show_exception_trace', 0);
}

if (strpos('@php_bin@', '@php_bin') === 0)
{
    set_include_path(dirname(__FILE__) . PATH_SEPARATOR . get_include_path());
}


/*
 * Include dependencies
 */
require 'PHPUnit/Autoload.php';