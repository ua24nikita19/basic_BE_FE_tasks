<?php

trait actionsWithString
{
    function arrayToString(array $arr)
    {
        foreach ($arr as $key => $item) {
            if ($item == '.' || $item == '..'){
                unset($arr[$key]);
            }
        }
        $string = implode(' ', $arr);

        return $string;
    }

    function createBlock($img, $name, $empty = false)
    {
        if (!$empty){
            if (!is_dir($this->currentDir . '/' . $name)){
                $block = '<button type="submit" class="main-block">'
                    . '<div class="main-block-img">' . $img .'</div>'
                    . '<div class="main-block-footer">' . $name . '</div>'
                    . '</button>';
            } else{
                $block = '<button type="submit" class="main-block" name="'.$name .'">'
                        . '<div class="main-block-img">' . $img .'</div>'
                        . '<div class="main-block-footer">' . $name . '</div>'
                        . '</button>';
            }
        } else {
            $block = '<div class="block-empty">' . $img . '<br><span class="block-empty-txt">' . $name
                   . '</span></div>';
        }

        return $block;
    }

    function itemsInDirectory(){
        $items = explode(' ', $this->arrayToString(scandir($this->currentDir)));
        return $items;
    }
}

/** Class to make actions on a files or di rectory*/
class FilesActions
{
    use actionsWithString;

    public $basedir = '';
    public $itemsInDirectory = [];
    protected $currentDir = '';
    protected $nextDir = '';

    public function __construct()
    {
        $this->basedir = '/Place';
        $this->currentDir = dirname(__FILE__) . '/Place';
    }

    public function getBaseDir()
    {
        $workPlace = dirname(__FILE__) . $this->basedir;
        return $workPlace;
    }

    public function getCurrentDir(){
        return $this->currentDir;
    }

    public function setNextDir($dirName){
        $this->nextDir = $this->nextDir . '/' . $dirName;
        $this->currentDir = $this->currentDir . $this->nextDir;
        $this->basedir = $this->basedir . $this->nextDir;
    }

    public function getContentsDirectory($currentPath)
    {
        $items = $this->arrayToString(scandir($currentPath));
        $items = explode(' ',$items);

        for($i=0;$i<count($items);$i++){
            if (is_dir($currentPath.'/'.$items[$i]) && $items[0]!='') {
                echo $this->createBlock('<img src="https://png.icons8.com/color/100/000000/folder-invoices.png">'
                    , $items[$i]);
            } else if (!is_dir($currentPath.'/'.$items[$i])) {
                echo $this->createBlock('<img src="https://png.icons8.com/color/100/000000/file.png">'
                    , $items[$i]);
            } else {
                echo $this->createBlock('<img src="https://png.icons8.com/color/100/000000/empty-box.png">'
                    , 'There is empty', true);
            }

        }
    }
}

$filesActions = new FilesActions();