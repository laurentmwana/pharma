<?php

namespace App\Router;

use App\Controller\other;
use App\Exception\RouteException;

class Router {

    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private array $routes = [];

    /**
     * @var array
     */
    private  array $nameRoute = [];


    /**
     * Router constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = trim($url , '/');
    }

    /**
     * with
     *
     * @param  mixed $params
     * @param  mixed $regex
     * @return self
     */
    public function with ($params , $regex): self
    {
        $this->params[$params] = str_replace('(' , '(?:' , $regex);
        return $this;
    }

    /**
     * @param $path
     * @param $callable
     * @param null $name
     * @return $this
     */
    /**
     * @param mixed $path
     * @param mixed $callable
     * @param null $name
     * 
     * @return self
     */
    public function get ($path , $callable , $name = null) : self
    {
        $this->add($path , $callable , $name , 'GET');
        return $this;
    }


    /**
     * @param mixed $path
     * @param mixed $callable
     * @param null $name
     * 
     * @return self
     */
    public function post ($path , $callable , $name = null) : self
    {
        $this->add($path , $callable , $name , 'POST');
        return $this;
    }


    /**
     * @param $method
     * @param $path
     * @param $callable
     * @param null $name
     * @return Route
     */
    private function add($path , $callable , $name , $method)
    {
        $route = new Route($path , $callable , $name);
        $this->routes[$method][] = $route;

        if ($name) {
            $this->nameRoute[$name] = $route;
        }
    
        return $route;
    }


    /**
     * @return mixed
     * @throws RouteException
     */
    public function run ()
    {
       if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new RouteException(" Pro");
       }


        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->match($this->url)) {
                return $route->call();
            }
        }

       throw new RouteException("Ce page n'existe pas ");
  
    }

 
    public  function generate (string $name , bool $action = false , array $params = []): string 
    {
        if (!isset($this->nameRoute[$name])) {
            throw new RouteException("Ce route n'existe pas ");
        }

        return $this->nameRoute[$name]->getUrl($params , $action);
    }

}