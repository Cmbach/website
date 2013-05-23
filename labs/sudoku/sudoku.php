<?php

  include 'sudoku.inc.php';
  $UNSOLVED = 81;//when it reaches 0 the sudoku should be solved
  $DEFAULT = array(1,2,3,4,5,6,7,8,9);//default options for hints
  $debug_info = '';
  $result_info = '';
  $a[][] = '';//This one record known numbers
  $b[][] = '';//This one record HINTS numbers
  $c[][] = '';//This one record deduced/confirmed ANSWERS
  $ch = $_GET['lang']=='cn'? true: false;
  $attempt = 0;
  if(count($_POST)>0){
    $tag = true;
  }
  else{
    $tag = false;
  }

  if($tag){
    init($a,$b);    
    if(validate($a)){
      if(!key_process($b,$c,$UNSOLVED)){
         /*
        while(adv_clear_hint($b,$c)){
          key_process($b,$c,$UNSOLVED);
        }
        */
        //guess_process_ctrl_horizontal($b,$c,$UNSOLVED);
        
        if(guess_process_ctrl_vertical($b,$c,$UNSOLVED)){
          $result_info = $ch ? "通过 $attempt 次尝试，我解决了这个数独" : "I solved this with $attempt attempts";
        }
        else{
          $result_info = $ch ? "$attempt 次尝试后，这个数独被证明是无解的" : "After $attempt attempts, it is proved that this puzzle is unsolvable";
        }
          
         
      }
      else{
        $result_info = $ch ? "仅仅一次尝试，我就得到了答案" : "I solved this easily with one attempt";
      }
    }
    else{
      $result_info = "<strong class='error'>".( $ch ? '等一下！！！' : 'STOP!!!' )."</strong>".$result_info;
    }
  }
  $debug_info .="<br>";
  $debug_info .= $ch ? " 还剩下 $UNSOLVED 未解决!!! ":"left for $UNSOLVED unsolved!!!";
  
  function guess_process_ctrl_vertical($b,$c,$unsolve){
    global $ch;
    for($hint = 2; $hint < 7; $hint++){
      for($i = 0;$i<9;$i++){
        for($j = 0;$j<9;$j++){
          if($b[$i][$j] !== FALSE && count($b[$i][$j]) == $hint){
            foreach ($b[$i][$j] as $test){
              $GLOBALS['attempt']++;
              $b_copy = $b;
              $c_copy = $c;
              $un_copy = $unsolve;
              $GLOBALS['debug_info'] .= $ch ? " 我猜位置 $i-$j 是 $test <br>" : " I guessed location '$i-$j' to be $test <br>";
              
              set_answer($b_copy,$c_copy,$i,$j,$test);
              $un_copy--;
              $guess_result = key_process($b_copy,$c_copy,$un_copy);

              if($guess_result === true){
                $GLOBALS['debug_info'] .= " <b style='color:green'>".($ch ? "结果是正确的" : "It returns out to be corrected")."</b><br>";
                $GLOBALS['b'] = $b_copy;
                $GLOBALS['c'] = $c_copy;
                $GLOBALS['UNSOLVED'] = $un_copy;
                return TRUE;
              }
              else if ($guess_result === FALSE){
                $GLOBALS['debug_info'] .= " <b style='color:red'>".($ch ? "结果是无解的":"It returns out to be unsolvable")."</b><br>";
                continue;
              }
              else{
                $GLOBALS['debug_info'] .=  " <b style='color:blue'>".($ch ? "需要进一步猜测" : "It needs to guess further")."</b><br>";
                //record unsolved new status of this level
                if(guess_process_ctrl_vertical($b_copy,$c_copy,$un_copy) === true){
                  break;
                }
              }
            }

            if($GLOBALS['UNSOLVED'] == 0){
              return true;
            }
            else{
              return false;
            }
          }
        }
      }
    } 
  }
  

    
  function key_process(&$b,&$c,&$unsolve){
    //global $steps;
    for($i = 0;$i<9;$i++){
      for($j = 0;$j<9;$j++){
        if($b[$i][$j] !== FALSE){
          if(count($b[$i][$j]) == 1){
            if(set_answer($b,$c,$i,$j,end($b[$i][$j]))){
              $unsolve--;
            }
            if($unsolve == 0){
              return true;
            }
            else{
              if(key_process($b,$c,$unsolve)){
                return true;
              }
            }
          }
          else if(count($b[$i][$j]) == 0){
            //Dead end
            return false;
          }
        }
      }
    }
    
    
  }

    //Advanced method check hints if exist 2 identical array with 2 digit like (1,3),(1,3) in a row. There should not be more 1,3 in this row.
    
     
    //output of the answer
  function get_answer($a,$b,$c,$i,$j){
    if(isset($a[$i][$j])){
      $output = $a[$i][$j];
    }
    else{
      if($b[$i][$j]){
        $output .= "<span class='hint'>";
        foreach ($b[$i][$j] as $hint){
          $output .= "$hint".",";
        }
        $output .= "</span>";
      }
      else{
        $output = "<strong>".$c[$i][$j]."</strong>";
      }
    }
    return $output;
  }
    
    
    
    
    
    //html 
    $debug = true;
    $debug = false;
    if($debug)
    {
    echo "<pre>";
    
    print_r($b);
    echo "\n";
    var_dump(count($b[0][8]));
    
    echo "</pre>";
    }
    
    
    echo "
    <html>
    <head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf8\">
    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
    <script src='sudoku.js'></script>
        <style type='text/css'>
        a{
          color:#39c!important;
          text-decoration: none !important;
        }
        a:hover{
          text-decoration: underline !important;
        }
        body{
           font-family:Microsoft YaHei;
        }
        .debug{
          display:none;
          margin-top:50px;
        }
        .highlight{
          background-color:#FF0 !important;
        }
        .main-input-warper{
          float:left;
          margin :5px;
          width:300px;
        }
        .demo-warper{
          float:left;
          margin:5px;
        }
        .demo-warper a{
          display:block;
        }
        .clear{
          clear:both;
        }
        span.hint
        {
            color:gray;
            font-size:60%;
        }
table,td   {border : 1px solid
;
border-collapse:collapse;
}
strong
{
    color:red;
}
input
{
    width:20px;
}
#lang{
  float:right;
 
}
</style>
    </head>
    <body>
    <div id='lang'><a href='sudoku.php?lang=cn'>中文</a>|<a href='sudoku.php'>English</a></div>
        <form action='sudoku.php". ($ch? '?lang=cn':'')."' method='POST' target='_self'>
          <div class='main-input-warper'>
            <table>";
    $index = 0;
    if($tag)
    {
        for($i = 0;$i<9;$i++)
        {
            echo "<tr>";
        for($j = 0;$j<9;$j++)
            {
              
                $css_issue = css_calc($i,$j);
                $value = $a[$i][$j];
                echo "<td><input name='a$i$j' id='$index' value='$value' autocomplete='off' class='puzzle $css_issue'/></td>";
                $index++;
            }
            echo "</tr>";
        } 
    }
    else
    {
    for($i = 0;$i<9;$i++)
        {
            echo "<tr>";
        for($j = 0;$j<9;$j++)
            {
              $css_issue = css_calc($i,$j);
              echo "<td><input name='a$i$j' id='$index' autocomplete='off' class='puzzle $css_issue'/></td>";
              $index++;
            }
            echo "</tr>";
        } 
    }
    echo       "</table>
    </div>
    <div class='demo-warper'>".
    ($ch ? 
      "<a id='d1' href>例子1 难度 普通</a>
      <a id='d2' href>例子2 难度 困难</a>
      <a id='d3' href>例子3 难度 疯狂</a>
      <a id='save' href>将题目保存为JSON</a>" 
      :
      "<a id='d1' href>Demo 1 Normal</a>
      <a id='d2' href>Demo 2 Hard</a>
      <a id='d3' href>Demo 3 Crazy</a>
      <a id='save' href>Save to JSON</a>")
    ."</div>
    <div class='clear'></div>
    <input type='submit' style='width:60px' />
    <input type='reset' class='reset' style='width:60px' />
        </form><br><br><br><table>";
    
    if ($tag)
    {
            for($i = 0;$i<9;$i++)
        {
            echo "<tr>";
        for($j = 0;$j<9;$j++)
            {
                echo "<td><label>".get_answer($a,$b,$c,$i,$j)."</label></td>";
            }
            echo "</tr>";
        } 
    }
       
    echo" </table>
    <br>
    <div class='result'>$result_info</div>
    
    <br>
    <a href='thoughts.html' target=\"_blank\">".( $ch ? "思路与灵感（未翻译）":"The Idea and Passion to Solve a Sudoku")."</a><br>
    <a href class='debug-trigger'>".($ch?"查看猜测细节":"See Guessing Info")."</a>
    <div class='debug'> $debug_info </div>
</body>
</html>
";
//
/*
function guess_process_ctrl_horizontal($b,$c,$un){
    $tree[0][0] = array(
      'b' => $b,
      'c' => $c,
      'un' => $un,        
    );

    $level = 0;
    if(guess($tree,0,0) !== true){
      while($level < (count($tree)-1)){
        $level = (count($tree)-1);
        foreach($tree[$level] as $version => $value){
          //echo $level ." + "  . $version;
          if( $version > 1000){
            echo 'that is not solvalbe';
            return false;
          }
          if(guess($tree,$level,$version) === true){
            return true;
          }  
        }
      }
    }
  }
  
  function guess(&$tree,$level,$version){
    $next_level = $level +1;
    $b = $tree[$level][$version]['b'];
    $c = $tree[$level][$version]['c'];
    $unsolve = $tree[$level][$version]['un'];
    for($hint = 2; $hint < 7; $hint++){
      for($i = 0;$i<9;$i++){
        for($j = 0;$j<9;$j++){
          if($b[$i][$j] !== FALSE && count($b[$i][$j]) == $hint){
            foreach ($b[$i][$j] as $test){
              $b_copy = $b;
              $c_copy = $c;
              $un_copy = $unsolve;
              $GLOBALS['debug'] .= " I guessed$i,$j to be $test <br>";
              set_answer($b_copy,$c_copy,$i,$j,$test);
              $un_copy--;
              $guess_result = key_process($b_copy,$c_copy,$un_copy);
              if($guess_result === true){
                $GLOBALS['debug'] .=  " <b style='background:green'>It returns out to be right</b><br>";
                $GLOBALS['b'] = $b_copy;
                $GLOBALS['c'] = $c_copy;
                $GLOBALS['UNSOLVED'] = $un_copy;
                return TRUE;
              }
              else if ($guess_result === FALSE){
                $GLOBALS['debug'] .= " <b style='background:red'>It returns out to be wrong</b><br>";
              }
              else{
                $GLOBALS['debug'] .=  " <b style='background:blue'>It returns out to be more</b><br>";
                //record unsolved new status of this level
                $tree[$next_level][] = array(
                'b' => $b_copy,
                'c' => $c_copy,
                'un' => $guess_result,
                );
              }
            }
            return false;
          }
        }
      }
    } 
  }
        
        
     */  
        
        
          
?>