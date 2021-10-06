<?php
namespace App\Router;

use App\Database\Database;

class Route {
    
    /**
     * path
     *
     * @var mixed
     */
    private $path;
    
    
    /**
     * callable
     *
     * @var mixed
     */
    private $callable;    

    /**
     * matches
     *
     * @var array
     */
    private $matches = [];
    
    /**
     * params
     *
     * @var array
     */
    private $params = [];

    public function __construct($path , $callable)
    {
        $this->path = trim($path , '/');
        $this->callable = $callable;
    }

    
    /**
     * match
     *
     * @param  mixed $url
     * @return bool
     */
    public function match ($url): bool
    {
        $path = preg_replace_callback('#:([\w]+)#' , [$this , 'ParamMatch'] , $this->path);
        $regex = "#^$path$#i";

        if (!preg_match($regex , $url , $matches)) {
            return false;
        }

        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    public function ParamMatch ($match): string
    {
        if (!isset($this->params[$match[1]])) {
            return '([^/]+)';
           
        }

        return '(' .  $this->params[$match[1]] . ')';
    }


    public function getUrl($params , $action = null)
    {
        if (is_null($action)) {
            $path = $this->callable;
            foreach ($params as $key => $value) {
                $path = str_replace(":$key" , $value , $path);
            }

            return $path;
        }


        $path = $this->path;
        foreach ($params as $key => $value) {
            $path = str_replace(":$key" , $value , $path);
        }

        return $path;
    }
    
    /**
     * call
     *
     * @return void
     */
    public function call ()
    {
        if (is_string(($this->callable))) {
            
            $params = explode('#' , $this->callable);
            $controller = $params[0];
            $controller = new $controller(
                (new Database())
            );
            return call_user_func_array([
                $controller ,
                $params[1]
             ], $this->matches);
            
        } 
        
        else {
            return call_user_func_array($this->callable , $this->matches);
        }
        
    }
}