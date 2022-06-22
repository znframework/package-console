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
 * @command command:method
 * @description Run short command 
 */
class ShortCommand
{
    /**
     * Magic constructor
     * 
     * @param string $command
     * 
     * @return void
     */
    public function __construct($command)
    {   
        $commandEx   = explode(':', $command ?? '');
        $classEx     = explode('\\', $commandEx[0]);
        $funcparamEx = explode(' ', $commandEx[1] ?? '');
        $function    = $funcparamEx[0];
        $parameters  = [];

        if( $funcparamEx[1] ?? NULL )
        {
            array_shift($funcparamEx);

            $parameters = $funcparamEx;
        }

        if( strtolower($classEx[0]) === 'external' )
        {
            $class = EXTERNAL_COMMANDS_NAMESPACE . $classEx[1]; // @codeCoverageIgnore
        }
        else
        {
            $class = PROJECT_COMMANDS_NAMESPACE . $classEx[0];
        }
        
        new Result( Singleton::class($class)->$function(...$parameters) );
    }
}