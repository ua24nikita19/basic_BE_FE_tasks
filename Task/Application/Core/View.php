<?php

namespace Application\Core;

/** Class for render page*/

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

    /** Render page with params
     * @param $title - title of page
     * @param $var - array with some sata which will be extract
     * @param $file - string is path to executable file
     */
    public function render($title, $var = [], $file='')
    {
        extract($var);

        if ($file){
            $right_file = $file;
        } else{
            $right_file =$this->path;
        }

        ob_start();
        require ROOT.DS.'Application/Views/'.$right_file.'.php';
        $content = ob_get_clean();
        require ROOT.DS.'Application/Views/Layouts/'.$this->layout.'.php';
    }

    /** Redirect to other page
     * @param $uri - uri of web site
     */
    public function redirect($uri)
    {
        header('location: '.$uri);
        exit;
    }

    /** Send headers with response code
     * @param $code - number of error
     */
    public static function error($code)
    {
        http_response_code($code);
        require ROOT.DS.'Application/Views/error/'.$code.'.php';
        exit;
    }

}