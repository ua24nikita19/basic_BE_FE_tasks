<?php

class classForm
{
    private $isForm = false;

    public function openForm(array $attributes = [])
    {
        if (!empty($attributes)) {
            $this->isForm = true;
            return '<form ' . $this->addAttributes($attributes) . ' >';
        } else {
            return '<form action="classForm.php" method="POST" >';
        }
    }

    public function closeForm()
    {

        if ($this->isForm == true) {
            return '</form>';
        }
        return NULL;
    }

    public function createElement($element = false, array $attributes = [])
    {
        if (!empty($element)) {
            return '<' . $element . ' ' . $this->addAttributes($attributes) . '>';
        }
        return NULL;
    }

    public function addAttributes($attributes)
    {
        $str = '';

        if (!empty($attributes)) {
            foreach ($attributes as $key => $val) {
                if (!is_int($key)) {
                    $str .= $key . '="' . $val . '" ';
                } else {
                    $str .= ' ' . $val;
                }

            }
        }
        return $str;
    }
}

$form = new classForm;

