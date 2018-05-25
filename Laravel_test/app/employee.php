<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    public function getRecords(){
        $records = employee::all();
        return $records;
    }

    public function createTree($arr) {
        $parent_arr = [];

        foreach ($arr as $key=>$item) {
            $parent_arr[$item->boss_id][$item->id] = $item;
        }

        $treeElem = $parent_arr[0];
        $this->generateElementTree($treeElem,$parent_arr);

        return $treeElem;
    }

    public function generateElementTree(&$treeElem, $parent_arr){
        foreach ($treeElem as $key=>$item) {
            if (!isset($item->vassal)){
                $item->push('vassal');
                $item->vassal = array();
            }

            if (array_key_exists($key,$parent_arr)) {
                $treeElem[$key]->vassal = $parent_arr[$key];

                $treeElemVassal = $treeElem[$key]->vassal;
                $this->generateElementTree($treeElemVassal, $parent_arr);
            }
        }
    }

    public function renderTemplate($path, $arr) {
        $output = '';

        if (file_exists($path)) {
            extract($arr);

//            ob_start();
            if ($path = __DIR__.'/template/menuPart.php'){
                $path = __DIR__.'/Http/Controllers/template/menuPart.php';
            }
            require($path);

//            $output = ob_get_clean();
        }

        return $output;
    }

    public function d($path, $arr){
        $this->renderTemplate($path,$arr);
    }
}
