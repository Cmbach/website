<?php
if(!$_GET['file']){
  die('oh no');  
}
$trivial = false;
session_start();
$filename = $_GET['file'];
$init_relation = array();
$find_relation = array();
$reference = array();
$reference_plain = array();
$table = '';
$table_first = true;
$result = new stdClass();
$check_uniq = new stdClass();
$error_msg = '';
$filename = "uploaded_file/".$_SESSION['who']."/".$filename;
$handle = fopen($filename, "r");
while($line = fgets($handle)){
  if($pre_model){
    $pre_model = table_handler($line);
    continue;
  }
  $line = trim($line); //important
  if($line == ''){
    continue;
  }
  if($start_init && $line != ''){
    init_relation($line);
  }
  
  if(stristr($line,'output:')){
    isset($check_uniq->output) ? $check_uniq->output++ : $check_uniq->output = 1;
    $start_init = false;
  }
  
  if($chi_s && strstr($line,'P-Value')){
    isset($check_uniq->p_value) ? $check_uniq->p_value++ : $check_uniq->p_value = 1;
    $chi_s = false;
    $vars = line_breaker($line);
    if(isset($result->chi_s)){
      $result->chi_s_bm = $vars[1];
    }
    else{
      $result->chi_s = $vars[1];
    }
  }
  
  
  if($rmsea){
    if(strstr($line,'C.I.')){
      isset($check_uniq->ci) ? $check_uniq->ci++ : $check_uniq->ci = 1;
      $vars = line_breaker($line);
      $index = count($vars)-1;
      $result->ci = $vars[$index];
    }
    else if(strstr($line,'CFI') && !strstr($line,'/')){
      isset($check_uniq->cfi) ? $check_uniq->cfi++ : $check_uniq->cfi = 1;
      $vars = line_breaker($line);
      $index = count($vars)-1;
      $result->cfi = $vars[$index];
    }
    else if(strstr($line,'TLI') && !strstr($line,'/')){
      isset($check_uniq->tli) ? $check_uniq->tli++ : $check_uniq->tli = 1;  
      $vars = line_breaker($line);
      $index = count($vars)-1;
      $result->tli = $vars[$index];
    }
  }
  if($srmr){
    if(strstr($line,'Value')){
      isset($check_uniq->srmr_value) ? $check_uniq->srmr_value++ : $check_uniq->srmr_value = 1;
      $vars = line_breaker($line);
      $index = count($vars)-1;
      $result->srmr = $vars[$index];
    }
  }
  if($mi){
    if(strstr($line,'Statements')){
      continue;
    }
    
    if(stristr($line,'on') || stristr($line,'by') || stristr($line,'with')){
      new_relation($line);
    }
    else{
      $mi = false;
    }
  }
 
    

  
  //------------------------------------------------------------------------------
  
  
  
  
  
  
  
  if(stristr($line,'model:')){
    if(strtolower($line) != 'model:'){
      $error_msg .= '<li> model: line has some trouble.</li>';
    }
    $start_init = true;
    isset($check_uniq->model) ? $check_uniq->model++ : $check_uniq->model = 1;
  }
  
  if(strstr($line,'Chi-Square')){
    $chi_s = true;
    isset($check_uniq->chi_s) ? $check_uniq->chi_s++ : $check_uniq->chi_s = 1;
  }
  
  if(strstr($line,'RMSEA') && !strstr($line,'Probability')){
    $rmsea = true;
    isset($check_uniq->rmsea) ? $check_uniq->rmsea++ : $check_uniq->rmsea = 1;
  }

    
  if(strstr($line,'SRMR')){
    $rmsea = false;
    $srmr = true;
    isset($check_uniq->srmr) ? $check_uniq->srmr++ : $check_uniq->srmr = 1;
  }
  
  if(strstr($line,'MODEL RESULTS') && !strstr($line,'STANDARDIZED')){
    $srmr = false;
    isset($check_uniq->model_results) ? $check_uniq->model_results++ : $check_uniq->model_results = 1;
  }
  
  
  if(strstr($line,'M.I.') && strstr($line,'E.P.C')){
    $mi = true;
    isset($check_uniq->mi) ? $check_uniq->mi++ : $check_uniq->mi = 1;
  }
  
  
  if($line == 'STDYX Standardization'){
    $pre_model = true;
    isset($check_uniq->stdyx) ? $check_uniq->stdyx++ : $check_uniq->stdyx = 1;
  }
}

function init_relation(&$str){
  global $init_relation;
  $vars = array();
  $vars = line_breaker($str);
  $key = false;
  $left =array();
  for($index = 0; $index<count($vars);$index++){
    $check = strtolower($vars[$index]);
    if($check == 'on' || $check == 'with' || $check == 'by'){
      $key = true;
      continue;
    }
    if($key){
      foreach($left as $b){
        $a = strtoupper($vars[$index]);  
        $b = strtoupper($b);
        $init_relation[] = $b.'@'.$a;
        $init_relation[] = $a.'@'.$b;
      }
    }
    else{
      $left[] = $vars[$index];
    }
  }
}


function new_relation(&$str){
  global $find_relation;
  global $reference;
  global $reference_plain;
  $vars = array();
  $vars = line_breaker($str);
  if($vars[3]  == '/'){
    return true;  
  }
  $check = strtolower($vars[1]);
  if($check == 'on' || $check == 'with' || $check == 'by'){
    $key  = $vars[0].'@'.$vars[2];
    
    $find_relation[$key] = $vars[3];
    $reference[$key] = "<mark class='keyword'>".$vars[0]."</mark> <mark class='keyword2'>".$check."</mark> <mark class='keyword'>".$vars[2].'</mark>';
    $reference_plain[$key] = $vars[0]." ".$check." ".$vars[2];
  }
  else{
    global $error_msg;
    $error_msg .= '<li>MI results reading error,ask Aogg for help</li>';
    global $mi;
    $mi = false;
  }
  
}

function line_breaker(&$str){
  $str = trim($str,';');
  $str = preg_replace('/\s+/', '|', $str);
  $vars = explode('|',$str);
  return $vars;
}





function table_handler(&$str){
  global $table_first;
  global $table;
  global $trivial;
  if(preg_match('/^\s/', $str)){
    $tmp = '';
    $str = trim($str);
    if($str == '' || stristr($str,'Two-Tailed')){
      return true;
    }
    $vars = line_breaker($str);
    
    if($table_first){
      $table .= "<thead>
                <tr>
                <th scope='col'></th>
                <th scope='col'>$vars[0]</th>
                <th scope='col'>$vars[1]</th>
                <th scope='col'>$vars[2]</th>
                <th scope='col'>Two-Tailed<br>$vars[3]</th>
                </tr>
                </thead>
                <tbody>
                ";
      $table_first = false;
    }
    
    else if(count($vars) == 5){
      $test = floatval($vars[4]);
      $mark = ($test <= 0.1) ? ( ($test <= 0.05) ? 'pass': 'natural' ): 'failed';
      
      $vars[4] = '<mark class="' . $mark . '">' . $vars[4] . '</mark>';
      
      $tmp = $trivial ?'<tr class="trivial stdxy-values ' .$mark .'">' :'<tr class="stdxy-values ' .$mark .'">';
      foreach ($vars as $value){
         $tmp .= "<td>".$value."</td>";
      }
      $tmp .= '</tr>';
    }
    else{
      
      
       $tmp = $trivial ? '<tr class="trivial stdxy-title">': '<tr class="stdxy-title">';
      foreach ($vars as $value){
        if(!$trivial && $value == 'Intercepts'){
          $trivial = true;
          $tmp .= "<td><h2 id='trivial'>".$value."</h2></td>"; 
        }
        else{
          $tmp .= "<td><h2>".$value."</h2></td>"; 
        }
         
      }
      
      $tmp .= '</tr>';
    }
    $table .= $tmp;
    return true;
  }
  else{
    $trivial = false;
    return false;
  }
}


//---------------------  Result ----------------------

$result_output = '';
if(isset($result->chi_s)){
  if($result->chi_s >= 0.05){
    $result_output .= '<li class="pass">Chi-Square Passed! <mark class="right">('.$result->chi_s.' > 0.05 oh yeah)</mark></li>';
  }
  else{
    $result_output .= '<li class="failed">Chi-Square FAILED! <mark class="right">('.$result->chi_s.' , expected > 0.05)</mark></li>';
  }
}
else{
  $result_output .= '<li class="error">Missing Chi-Square Value!</li>';
}

if(isset($result->ci)){
  if($result->ci <= 0.08){
    $result_output .= '<li class="pass">C.I. > 90% Passed! <mark class="right">('.$result->ci.' < 0.08 oh yeah)</mark></li>';
  }
  else{
    $result_output .= '<li class="failed">C.I. > 90% FAILED! <mark class="right">('.$result->ci.' , expected < 0.08)</mark></li>';
  }
}
else{
  $result_output .= '<li class="error">Missing C.I. Value!</li>';
}

if(isset($result->cfi)){
  if($result->cfi >= 0.9){
    $result_output .= '<li class="pass">CFI Passed! <mark class="right">('.$result->cfi.' > 0.9 oh yeah)</mark></li>';
  }
  else{
    $result_output .= '<li class="failed">CFI FAILED! <mark class="right">('.$result->cfi.' , expected > 0.9)</mark></li>';
  }
}
else{
  $result_output .= '<li class="error">Missing CFI Value!</li>';
}


if(isset($result->tli)){
  if($result->tli >= 0.9){
    $result_output .= '<li class="pass">TLI Passed! <mark class="right">('.$result->tli.' > 0.9 oh yeah)</mark></li>';
  }
  else{
    $result_output .= '<li class="failed">TLI FAILED! <mark class="right">('.$result->tli.' , expected > 0.9)</mark></li>';
  }
}
else{
  $result_output .= '<li class="error">Missing TLI Value!</li>';
}

if(isset($result->srmr)){
  if($result->srmr <= 0.1){
    $result_output .= '<li class="pass">SRMR Passed! <mark class="right">('.$result->srmr.' < 0.1 oh yeah)</mark></li>';
  }
  else{
    $result_output .= '<li class="failed">SRMR FAILED! <mark class="right">('.$result->srmr.' , expected <0.1)</mark></li>';
  }
}
else{
  $result_output .= '<li class="error">Missing SRMR Value!</li>';
}

//---------------------  Candidates ----------------------

$candidate_output = '';
arsort($find_relation,SORT_NUMERIC);
//distory candidates from hope

foreach($init_relation as $check_dup){
  if(isset($find_relation[$check_dup])){
    $debug_distroyed .= $check_dup." ";
    unset($find_relation[$check_dup]);
  }
}

$i = 0;
foreach($find_relation as $key => $value){
  if($i == 10 ){
    break;
  }
  $candidate_output .=  "<li class='candidate'><mark class='candidate'></mark>" . $reference[$key] . "  <mark class='right'>Value is " .$value ."</mark>\n";
  $candidate_plain_output .= $reference_plain[$key].";\n";
  $i++;
}


//---------------------- TABLES -----------------------------


                
        

$table_head = "<table>
             <caption> STDYX Standardization </caption>";
             
$table_tail= "
          
          </tbody> 
          <tfoot>
                <tr>
                        <td><h4>---End of data---<h4></td>
                </tr>
        </tfoot>
        
</table>";

$table = $table_head.$table.$table_tail;

check_error();

function check_error(){
global $check_uniq;
global $error_msg;
if($check_uniq->output != 1){
  $error_msg .= '<li>output: error, found'. $check_uniq->output.", should be 1</li>";
}

if($check_uniq->ci != 1){
  $error_msg .= '<li>ci: error, found'. $check_uniq->ci.", should be 1</li>";
}

if($check_uniq->chi_s != 2){
  $error_msg .= '<li>chi_s: error, found'. $check_uniq->chi_s.", should be 2</li>";
}

if($check_uniq->p_value != 2){
  $error_msg .= '<li>p_value: error, found'. $check_uniq->p_value.", should be 2</li>";
}

if($check_uniq->rmsea != 1){
  $error_msg .= '<li>rmsea: error, found'. $check_uniq->rmsea.", should be 1</li>";
}

if($check_uniq->cfi != 1){
  $error_msg .= '<li>cfi: error, found'. $check_uniq->cfi.", should be 1</li>";
}
if($check_uniq->tli != 1){
  $error_msg .= '<li>tli: error, found'. $check_uniq->tli.", should be 1</li>";
}


if($check_uniq->srmr != 1){
  $error_msg .= '<li>srmr: error, found'. $check_uniq->srmr.", should be 1</li>";
}

if($check_uniq->srmr_value != 1){
  $error_msg .= '<li>srmr_value: error, found'. $check_uniq->srmr_value.", should be 1</li>";
}

if($check_uniq->model_results != 1){
  $error_msg .= '<li>"MODEL RESULTS && !STANDARDIZED": error, found'. $check_uniq->model_results.", should be 1</li>";
}
if($check_uniq->stdyx != 1){
  $error_msg .= '<li>"STDYX Standardization": error, found'. $check_uniq->stdyx.", should be 1</li>";
}
if($check_uniq->mi != 1){
  $error_msg .= '<li>"M.I. && E.P.C": error, found'. $check_uniq->mi.", should be 1</li>";
}
  
}
$final_output ="


<!DOCTYPE html>
<html>
  <head>
    <link type='text/css' rel='stylesheet' href='css/mp.css'>
    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
    <script src='//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js'></script>
    <script src='js/js.js'></script>
  </head>
  <body>
  <audio autoplay='autoplay' >
  <source src='/aopp_tool/track.mp3' type='audio/mp3'>
  </audio>
    <div class='warp'>
  ";
  if($error_msg == ''){
    $final_output .= '<div class="no_error"><li class="correct">No Error Found</li></div>';
  }
  else{
    $final_output .="
      <div class='error_check'>
        $error_msg
      </div>
    ";
  }
    
    $final_output .= "
    <h1>Results</h1>
    <div class='result'>
      <ul>
        $result_output
      </ul>
    </div>
    <h1 class='a' id='magic'>M.I.</h1>
    <div class='candidate'>
      <ul>
         $candidate_output
      </ul>
    </div>
    
    <div class='candidate_plain' style='display:none'>
      <pre>$candidate_plain_output</pre>
    </div>
    
    <div class='std_table'>
       $table
    </div>
    
    </div><!-- end of warp -->
  </body>
</html>
";

echo $final_output;



?>


    
