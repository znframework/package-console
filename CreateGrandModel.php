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

use Generate;

class CreateGrandModel
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
        new Result(Generate::model($command,
        [
            'extends' => 'GrandModel'
        ]));
    }
}