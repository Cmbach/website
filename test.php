<?php

function test(&$a,&$b){
  $a = 0;
  $b[1] = 'aaa';
}
$x = 5;
$y = array(1,2);

test($x,$y);
var_dump($x);
echo "\n";
var_dump($y);
die();


$filename = 'to_delete.txt';
  if(! $handle = fopen($filename, 'r'))
    die($filename);   
  
   while (($buffer = fgets($handle, 4096)) !== false)
    {
        $buffer = trim($buffer);
        echo "update content_type_song set field_song_sku_value='' where field_song_sku_value= '$buffer';\n";
        
        
    }
die();
/*
$inputfilename = 'input00.txt';
$outputfilename = 'output00.txt';
if(!$stdin = fopen($inputfilename, 'r')){
  die('failed to find input00.txt');
}
$test_string = fgets($stdin);
$len = strlen($test_string);
if($len<1 || $len >= 1000){
  die('length must be within 1-1000 characters');
}

//easy way but slow in avearage cases .tested, it is common, and it is working -mx
/*


$count = 0;
for($len = strlen($test_string);$len >0;$len--){
  for($start= 0;$start<(strlen($test_string)-$len+1);$start++){
    if(isset($array[substr($test_string,$start,$len)])){
      continue;
    }
    else{
      $array[substr($test_string,$start,$len)] = true;
      $count++;
    }
  }
}

echo $count;
*/

//better solution
//this solution works better/faster in random cases it looking for duplicates pattern.

$count = $max_combination = $len*($len+1)/2;
global $duplicates ; //this should be a better treated if change the way to 'Object oriented';
$duplicates = 0 ;
  

$temp_char = array();

//----- this part may be imporved and intergrated into the find function-------
for($start= 0;$start <strlen($test_string);$start++){
  if(isset($temp_char[substr($test_string,$start,1)])){
    $duplicates++;
    $temp_char[substr($test_string,$start,1)][]=substr(($test_string),($start+1));
  }
  else{
    $temp_char[substr($test_string,$start,1)][]=substr(($test_string),($start+1));
  }
}

//var_dump($temp_char);
foreach($temp_char as $temp){
  if (count($temp)>1){
    find($temp);
  }
}

$count = $count - $duplicates;
//-------------------------------------------------------------------------------

$stdout = $count;
if(!$stdout = fopen($outputfilename, 'w')){
  die('failed to write output00.txt');
}
fwrite($stdout,$count);




function find($sub_str_arr){
  global $duplicates;
  $temp_char = array();
  foreach($sub_str_arr as $sub){
    if(isset($temp_char[substr($sub,0,1)])){
      $duplicates++;
      if(strlen($sub)>1){
        $temp_char[substr($sub,0,1)][]=substr($sub,1);
      }
    }
    else{
      if(strlen($sub)>1){
        $temp_char[substr($sub,0,1)][]=substr($sub,1);
      }
      else{
        $temp_char[substr($sub,0,1)] = array();
      }
    }
  }
  
  foreach($temp_char as $temp){
    if (count($temp)>1){
      find($temp);
    }
  } 
}



