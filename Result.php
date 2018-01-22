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

use ZN\Lang;
use ZN\Buffering;

class Result
{
    /**
     * Magic constructor
     * 
     * @param mixed $result
     * 
     * @return void
     */
    public function __construct($result)
    {

        $this->return = Buffering\Callback::do(function() use($result)
        {
            $success = Lang::select('Success', 'success');
            $error   = Lang::select('Error', 'error');
            $nodata  = 'No Data';
    
            if( $result === true || $result === NULL )
            {
                echo $success;
            }
            elseif( $result === false )
            {
                echo $error;
            }
            else
            {
                if( is_array($result) )
                {
                    if( ! empty($result) )
                    {
                        print_r($result);
                    }
                    else
                    {
                        echo $nodata;
                    }
                }
                else
                {
                    if( ! empty($result) )
                    {
                        echo $result;
                    }
                    else
                    {
                        echo $nodata;
                    }
                }
            }
        });

        $line = $this->line();

        echo $line;
        echo $this->title();                                                                                         
        echo $line;
        echo '| ' . $this->return . ' |'.EOL;
        echo $line;
    }

    /**
     * Protected Line
     */
    protected function line()
    {
        return '+' . str_repeat('-', strlen($this->return)) . '--+' . EOL;
    }

    /**
     * Protected Title
     */
    protected function title()
    {
        $result = ' Result';

        return '| Result ' . str_repeat(' ', strlen($this->return) - strlen($result)) . ' |' . EOL;
    }
}