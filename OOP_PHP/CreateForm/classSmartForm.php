<?php

require ('classForm.php');

class smartForm extends classForm{

    public $name,$text;

    public function saveName(){

        if(isset($_POST['send'])){
            if($_POST['username']){
                return $this->name=$_POST['username'];
            }
        }else {
            return $this->name='';
        }
        return null;
    }
    public function saveText(){

        if(isset($_POST['send'])){
            if($_POST['text']){
                return $this->text=$_POST['text'];
            }
        }else {
            return $this->text='';
        }
        return null;
    }

}

$smartForm = new smartForm;