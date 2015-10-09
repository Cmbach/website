<?php

  for($j = 0; $j < 1000; $j++){
    if($temp = test()){
      $a[$temp]++;
      $b[] = $temp;
    }
  }
 
/*
var_dump($worst);

echo sum($worst)/100;
*/

function test(){
  for($i=0;$i<10000;$i++){
    if(rand(0,100)<0.25){
      //return $i;
      //echo 'A ';
      if(rand(0,100)<0.25){
        return $i;
      }
    }
  } 
  return 0;
}

function sum($array){
  
  $sum = 0; 
  foreach($array as $value){
    $sum += $value;
  }
  return $sum;
}

ksort($a);
var_dump($a);
echo '<br>';
echo sum($b) / 2000;

$sum = 0;
$x = array();
foreach($a as $key => $value){
  $sum += $value;
  $x[$key] = $sum/2000;
}

var_dump($x);

///mail('bach.genius@gmail.com','aaa','fff');
?>