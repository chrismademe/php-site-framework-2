<?php

/**
 * Class Autoloader
 *
 * The autoloader loads
 * classes based on their
 * names and namespaces.
 *
 * E.G. to load a class
 * called Bar under the
 * namespace Foo, it will
 * look for Bar.php in the
 * scripts/Foo folder
 *
 * If a class cannot be found
 * an error will throw.
 */

class Autoloader
{

    static public function loader($class) {

        $class = str_replace('\\', '/', $class);
        $filename = 'scripts/classes/'. $class .'.php';

        if (file_exists($filename)) {

            include($filename);
            if (class_exists($class)) {
                return true;
            }

        } else {
            return false;
        }

    }

}

spl_autoload_register('Autoloader::loader');
