<?php

namespace Application\Core;


class View
{
    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title, $var = [], $file='')
    {
        extract($var);
        if ($file){
            $right_file = $file;
        } else{
            $right_file =$this->path;
        }

        ob_start();
//        require ROOT.DS.'Application/Views/'.$this->path.'.php';
        require ROOT.DS.'Application/Views/'.$right_file.'.php';
        $content = ob_get_clean();
        require ROOT.DS.'Application/Views/Layouts/'.$this->layout.'.php';
    }

    public function redirect($uri)
    {
        header('location: '.$uri);
        exit;
    }

    public static function error($code)
    {
        http_response_code($code);
        require ROOT.DS.'Application/Views/error/'.$code.'.php';
        exit;
    }

}