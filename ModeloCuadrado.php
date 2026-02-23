<?php
class ModeloCuadrado {
    private $isShow;
    public $id;
    public $style;

    public function __construct($id) {
        $this->id = $id;
        $this->isShow = false;
        $this->style = '';
    }

    public function getIsShow() {
        return $this->isShow;
    }

    public function setIsShow($value) {
        $this->isShow = $value;
        if ($value) {
            $this->style = 'mole';
        } else {
            $this->style = '';
        }
    }
}

?>
