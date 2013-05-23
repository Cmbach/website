<?php
$lifetime = 5 * 24 * 60 * 60;
session_set_cookie_params($lifetime);
session_start();
$error = '';
//ini_set('display_errors',1);
//error_reporting(E_ALL);

if($_GET['logout'] == 'logout'){
  unset($_SESSION['who']);
}
if(!$login){
  if(isset($_POST['aogg'])){
    switch($_POST['aogg']){
      case 'aopp':
        $_SESSION['who'] = 'aopp';
        break;
      case 'liyan':
        $_SESSION['who'] = 'liyan';
        break;
      case 'demo123':
        $_SESSION['who'] = 'demo';
        break;
      default :
        $error = 'What is the password?';
        break;
    }
  }
}
$name = ucfirst($_SESSION['who']);
$login = isset($_SESSION['who']) ? true: false;
$base_dir = "uploaded_file/".$_SESSION['who']."/";
$output_file = '';

if(isset($_FILES['upload_file'])){
    if($_FILES['upload_file']['error'] === 0 ){
      if($_FILES['upload_file']['type'] =="text/plain" || $_FILES['upload_file']['type'] =="application/octet-stream"){
        $index = 1;
        $test_name = $_FILES["upload_file"]["name"];
        while (file_exists($base_dir . $test_name)){
          $test_name = $_FILES["upload_file"]["name"] . "_$index";
          $index++;
        }
        print ($base_dir.$test_name); 
        if(!move_uploaded_file($_FILES["upload_file"]["tmp_name"],$base_dir.$test_name)){
          $error .= '<br>failed to save this file';
        }
        
      }
      else {
        $error .= '<br>'.$_FILES['upload_file']['type'];
        $error .= '<br>unexpected file';
        die();
      }
    }
  
}

if($_GET['action']=='delete' && isset($_GET['filename'])){
  delete_file($_GET['filename']);
}

function delete_file($fname){
  global $base_dir;
  if(file_exists($base_dir.$fname)){
    unlink($base_dir.$fname);
  }
}

//-------------------------   reading files -------------------------

$fso  = opendir($base_dir);
$output_file .= "<div class='filelist'>";
while($fname=readdir($fso)){
  if($fname == '.' || $fname == '..' || $fname == '.DS_Store'){
    continue;
  }
$output_file .= "<a href='mplus_reader.php?file=$fname' target='_blank'>".$fname."</a> 
<a class='delete' href='file_m.php?filename=$fname&action=delete'>delete</a> <br/>" ;
}

$output_file .= "</div>";
closedir($fso);

$final_output = "

<!DOCTYPE html>
<html>
<head>
<script src='//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
    <script src='js/js.js'></script>
<style>
a{
  color:#39c!important;
  text-decoration: none !important;
}
a:hover{
  text-decoration: underline !important;
}

a.delete{
  float:right;
}
.Liyan{
  background-color:#EFF;
}
.Aopp{
  background-color:#FEF;
}
.filelist{
  border: dashed 1px #666;
  padding: 15px;
  clear:both;
  }
.logout{
  float:right;
}
.line_break{
  display:none;
}

.line_break a{
  display:block
  
}
a#show-tool {
  display: block;
  margin-top: 20px;
  font-size: 18px;
}
</style>
</head>
<body class='$name'>
<form action='file_m.php' method='post' enctype='multipart/form-data'>";

if($login){
  $final_output .= "<h1> Welcome back $name</h1>
  <div class='logout'><a href='file_m.php?logout=logout'> LOG OUT </a></div>
  $output_file";
  $final_output .= "<input type='file' name='upload_file' multiple>";
}
else{
  $final_output .= "<input type='password' name='aogg'>";
}
$final_output .= "
   <input type='submit'>
   <a href='#' id='show-tool'>Show the Tool</a>
</form>
<div class='error'>
    $error
</div>
<div class='line_break'>
  <textarea id='get-line' rows='8' cols='80'></textarea>
  <a href='#' id='run-line'>Magic!!</a>
  <a href='#' id='clear-line'>Clear Content!!</a>
</div>


</body>
</html>
";


echo $final_output;
?>
