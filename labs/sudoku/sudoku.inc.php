<?php

/*
 *initialize matrix from web 
 * 
 */
function init(&$a,&$b){
  for($i = 0;$i<9;$i++){
    for($j = 0;$j<9;$j++){
      $get_matrix = 'a'."$i"."$j";
      if(!empty($_POST["$get_matrix"])){
        $a[$i][$j] = intval($_POST["$get_matrix"]);
        $b[$i][$j] = FALSE;
        $GLOBALS['UNSOLVED']--;
      }
      else{
        $a[$i][$j] = NULL;
        $b[$i][$j] = $GLOBALS['DEFAULT'];
      }
    }
  } 
  for($i = 0;$i<9;$i++){
    for($j = 0;$j<9;$j++){
      if(isset($a[$i][$j])){
        clear_hint($b,$i,$j,$a[$i][$j]);
      }
    }
  }  
}

function validate($a){
  global $result_info;
  global $ch;
  $tag = true;
  for($i = 0;$i<9;$i++){
    for($j = 0;$j<9;$j++){
      if(isset($a[$i][$j])){
        $valid_check['row'][$i][$a[$i][$j]]++;
      }
    }
  }
  
  for($j = 0;$j<9;$j++){
    for($i = 0;$i<9;$i++){
      if(isset($a[$i][$j])){
        $valid_check['col'][$j][$a[$i][$j]]++;
      }
    }
  }
  
  //$x $y calculate the location of which 3*3 box
  for($x=0;$x<3;$x++){
    for($y=0;$y<3;$y++){
      for($i=$y*3;$i<($y+1)*3;$i++){
        for($j=$x*3;$j<($x+1)*3;$j++){
          if(isset($a[$i][$j])){
            $valid_check['box']["$x-$y"][$a[$i][$j]]++;
          }
        }
      }
    }
  }
  
  foreach ($valid_check as $type => $tmp){
    foreach($tmp as $index => $tmp_check){
      foreach($tmp_check as $key => $sum){
        if($sum > 1){
          $tag = false;
          if ($ch){
            $type == 'row' ? $type = '行' : '' ;
            $type == 'col' ? $type = '列' : '';
            $type == 'box' ? $type = '方格' :'' ;
          }
          if(strstr($index,'-')){
            $index = explode('-', $index);
            $index[0]++;
            $index[1]++;
            $human_index = "$index[0] - $index[1]";
          }
          else{
            $human_index= $index+1;
          }
          
          $result_info .= $ch ? "<br>我在第 $human_index <strong class='error'></strong> $type 发现了重复数字  <strong class='error'>$key</strong>":
          "<br>I found duplicated number <strong class='error'>$key</strong> at $type <strong class='error'>$human_index</strong>";
        }
      }
    }
  }
  
  return $tag;
}

function set_answer(&$b,&$c,$i,$j,$answer){
  $c[$i][$j] = $answer;
  $b[$i][$j] = False;
  clear_hint($b,$i,$j,$answer);
  return true;
}   
  
  
/**
 * clear all the hints after set the answer
 */
function clear_hint(&$b,$i,$j,$answer){
  clear_row($b,$i,$answer);
  clear_col($b,$j,$answer);
  clear_box($b,$i,$j,$answer); 
}
function clear_row(&$b,$i,$answer){
  for($j = 0;$j<9;$j++){
    if($b[$i][$j]){
      if(($index = array_search($answer,$b[$i][$j]))!==FALSE){
        unset($b[$i][$j][$index]);
      }
    }         
  }
}   
function clear_col(&$b,$j,$answer){
  for($i = 0;$i<9;$i++){
    if($b[$i][$j]){
      if(($index = array_search($answer,$b[$i][$j]))!==FALSE){
        unset($b[$i][$j][$index]);
      }
    }
  }
}
function clear_box(&$b,$i,$j,$answer){
  $x = intval(($j)/3);
  $y = intval(($i)/3);
  //$x $y calculate the location of which 3*3 box
  for($i = $y*3;$i<($y+1)*3;$i++){
    for($j =$x*3 ;$j<($x+1)*3;$j++){
      if($b[$i][$j]){
        if(($index = array_search($answer,$b[$i][$j]))!==FALSE){
          unset($b[$i][$j][$index]);
        }
      }
    }
  }
}


//TODO adv

function adv_clear_hint(&$b,&$c){
  return adv_clear_row($b,$c)||adv_clear_col($b,$c)||adv_clear_box($b,$c);
}

function adv_clear_row(&$b,&$c){
  $tag = FALSE;
  for($i = 0;$i<9;$i++){
    $unique_check = array();
    $pair_check = array();
    
    for($j = 0;$j<9;$j++){
      if($b[$i][$j] !== FALSE){
        foreach($b[$i][$j] as $hint){
          $unique_check[$hint]++;
        }
        if(count($b[$i][$j])==2){
          $pair_check[]=$b[$i][$j];
        }
      }
    }
      
    foreach($unique_check as $hint => $check_result){
      if ($check_result == 1){
        for($j = 0;$j<9;$j++){
          if($b[$i][$j] !== FALSE && ($index = array_search($hint,$b[$i][$j]))!==FALSE){
            $b[$i][$j] = array($hint); 
            $tag = TRUE;
          }
        }
      }
    }
    /*
    if(count($pair_check)>1){
      if($pair_founded = check_equal_array($pair_check)){
        for($j = 0;$j<9;$j++){
          if($b[$i][$j] && !compare_array($b[$i][$j],$pair_founded)){
            foreach($pair_founded as $kill){
              if (($index = array_search($kill,$b[$i][$j]))!==FALSE){
                unset($b[$i][$j][$index]);
                $tag = TRUE;
              }
            }
          }
        }
      }
    }
     * 
     */     
  }

  return $tag;
}

function adv_clear_col(&$b,&$c){
  $tag = FALSE;
  for($j = 0;$j<9;$j++){
    $unique_check = array();
    $pair_check = array();
    
    for($i = 0;$i<9;$i++){
      if($b[$i][$j] !== FALSE){
        foreach($b[$i][$j] as $hint){
          $unique_check[$hint]++;
        }
        if(count($b[$i][$j])==2){
          $pair_check[]=$b[$i][$j];
        }
      }
    }
      
    foreach($unique_check as $hint => $check_result){
      if ($check_result == 1){
        for($i = 0;$i<9;$i++){
          if($b[$i][$j] !== FALSE && ($index = array_search($hint,$b[$i][$j]))!==FALSE){
            $b[$i][$j] = array($hint); 
            $tag = TRUE;
          }
        }
      }
    }
    /*
    if(count($pair_check)>1){
      if($pair_founded = check_equal_array($pair_check)){
        for($i = 0;$i<9;$i++){
          if($b[$i][$j] && !compare_array($b[$i][$j],$pair_founded)){
            foreach($pair_founded as $kill){
              if (($index = array_search($kill,$b[$i][$j]))!==FALSE){
                unset($b[$i][$j][$index]);
                $tag = TRUE;
              }
            }
          }
        }
      }
    } 
     * 
     */    
  }

  return $tag;
}

function adv_clear_box(&$b,&$c){
  $tag = FALSE;
  for($x=0;$x<3;$x++){
    for($y=0;$y<3;$y++){
      $unique_check = array();
      $pair_check = array();
      
      for($i=$y*3;$i<($y+1)*3;$i++){
        for($j=$x*3;$j<($x+1)*3;$j++){
          if($b[$i][$j] !== FALSE){
            foreach($b[$i][$j] as $hint){
              $unique_check[$hint]++;
            }
            if(count($b[$i][$j])==2){
              $pair_check[]=$b[$i][$j];
            }
          }
        }
      }
        
      foreach($unique_check as $hint => $check_result){
        if ($check_result == 1){
          for($i=$y*3;$i<($y+1)*3;$i++){
            for($j=$x*3;$j<($x+1)*3;$j++){
              if($b[$i][$j] !== FALSE && ($index = array_search($hint,$b[$i][$j]))!==FALSE){
                $b[$i][$j] = array($hint); 
                $tag = TRUE;
              }
            }
          }
        }
      }
      /*
      if(count($pair_check)>1){
        if($pair_founded = check_equal_array($pair_check)){
          for($i=$y*3;$i<($y+1)*3;$i++){
            for($j=$x*3;$j<($x+1)*3;$j++){
              if($b[$i][$j] && !compare_array($b[$i][$j],$pair_founded)){
                foreach($pair_founded as $kill){
                  if (($index = array_search($kill,$b[$i][$j]))!==FALSE){
                    unset($b[$i][$j][$index]); 
                    $tag = TRUE;
                  }
                }
              }
            }
          }
        }
      }
       * 
       */
    }     
  }

  return $tag;
}
    

function check_equal_array($pair_check){ 
  //compare each array with others
  for($i = 0 ; $i < count($pair_check)-1 ;$i++){
    for($j = $i+1; $j <count($pair_check);$j++){
      if(compare_array($pair_check[$i],$pair_check[$j]))
      {
        return $pair_check[$i];  
      }
    }
  }
  return FALSE;
}

function compare_array($arr_1,$arr_2){
  return !(array_diff($arr_1,$arr_2) || array_diff($arr_2,$arr_1));
}

function css_calc($i,$j){
  $i = floor($i/3);
  $j = floor($j/3);
  $style = ($i+$j) % 2 == 1 ? 'style-B' : 'style-A';
  return $style;
}
?>