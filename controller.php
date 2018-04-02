<?php
  include ('calculate.php');

  global $num1, $num2, $num3, $func;

  switch($_SERVER['REQUEST_METHOD'])  {
    case 'PUT': 
      parse_str(file_get_contents("php://input"), $inputArr);
      $num1 = (int)$inputArr['num1'];
      $num2 = (int)$inputArr['num2'];
      $num3 = (int)$inputArr['num3'];
      $func = $inputArr['func'];
      break;
    case 'POST':
      $num1 = (int)$_POST['num1'];
      $num2 = (int)$_POST['num2'];
      $num3 = (int)$_POST['num3'];
      $func = $_POST['func'];
      break;
    case 'GET':
      $num1 = (int)$_GET['num1'];
      $num2 = (int)$_GET['num2'];
      $num3 = (int)$_GET['num3'];
      $func = $_GET['func'];
      break;
    }

    $retVal = compute($num1, $num2, $num3, $func);
    $a = array('retVal' => $retVal);
    header('Content-Type: application/json');
    echo json_encode($a);

    function compute($num1=0, $num2=0, $num3=0, $func="sum") {
      switch ($func) {
        case "sum":
          $cal = new sum($num1, $num2, $num3);
          return $cal->calc();
        case "avg":
          $cal = new avg($num1, $num2, $num3);
          return $cal->calc();
        case "mult":
          $cal = new mult($num1, $num2, $num3);
          return $cal->calc();
      }
    }

?>