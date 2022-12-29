<?php namespace ZN\Console;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

use ZN\Singleton;

/**
 * @command run-command / run-external-command
 * @description run-command command:function p1 p2 ...pN
 */
class Library
{
    /**
     * Magic constructor
     * 
     * @param string $command
     * @param array  $parameters
     * @param string $namespace = NULL
     * 
     * @return void
     */
    public function __construct($command, $parameters, $namespace = NULL)
    {   
        $this->classMethod($class, $method, $command);

        $className = $namespace . $class;

        new Result( Singleton::class($className)->$method(...$parameters) );
    }

    /**
     * protected class method
     * 
     * @param string &$class
     * @param string &$method
     * 
     * @return void
     */
    protected function classMethod(&$class = NULL, &$method = NULL, $command = NULL)
    {
        $commandEx = explode(':', (string) $command);
        $class     = $commandEx[0];
        $method    = $commandEx[1] ?? NULL;
    }
}