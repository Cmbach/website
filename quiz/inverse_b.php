<?php

$input = 13;

function inverse_bin($input){
  if($input < 1 || $input >= 1000000000){
    die('Out laws');
  }
  $array = array();  
  for($i = 0;$input != 1;$i++){
    $array[] = ($input%2);
    $input = intval ($input / 2);
  }
  $array[] = 1;
  for($i = 0; $i < count($array);$i++){
    if($array[$i]>0){
      $output += pow(2,count($array)-$i-1);
    }
  }
  return $output;
}


echo inverse_bin($input);

