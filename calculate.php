<?php
  abstract class calculator {
    protected $num1, $num2, $num3;

    public function __construct($num1=0,$num2=0,$num3=0) {
      $this->setNum1($num1);
      $this->setNum2($num2);
      $this->setNum3($num3);
    }

    public function setNum1($num1) {
      $this->num1 = $num1;
    }
    public function getNum1() {
      return $this->num1;
    }

    public function setNum2($num2) {
      $this->num2 = $num2;
    }
    public function getNum2() {
      return $this->num2;
    }

    public function setNum3($num3) {
      $this->num3 = $num3;
    }
    public function getNum3() {
      return $this->num3;
    }

    abstract protected function calc();
  }

  class sum extends calculator {
    protected function sumCal() {
      return $this->getNum1()+$this->getNum2()+$this->getNum3();
    }
    public function calc() {
      return $this->sumCal();
    }
  }

  class avg extends sum {
    public function calc() {
      return $this->sumCal()/3;
    }
  }

  class mult extends calculator {
    protected function multCal() {
      return $this->getNum1()*$this->getNum2()*$this->getNum3();
    }
    public function calc() {
      return $this->multCal();
    }
  }  
?>