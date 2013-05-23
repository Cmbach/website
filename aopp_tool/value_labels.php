<?php
$html = true;
empty($_POST['aopp_s_value'])? $values = "" :$values = $_POST['aopp_s_value'];
$values = preg_replace("/\\\'/", "'", $values);
empty($_POST['aopp_s_name'])? $s = "" : $s = $_POST['aopp_s_name'] ;
empty($_POST['aopp_s_max'])? $max = "": $max = intval($_POST['aopp_s_max'])+1 ;
$head="VALUE LABELS\n";
$tail = "EXECLUE.\n";

$output = $head;
$output .=$s.'1'.' '.$values;
for ($i=2;$i<$max;$i++)
{
	$output .= "\n".'/'.$s.$i.' '.$values; 	
}
$output .= ".\n".$tail;
if($html)
{
$output = nl2br($output);
}
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Ha o aopp</title>
    <style type="text/css">
    .button
    {
      margin-left:0px;
      width: 80px;
      height:28;
      margin-right:20px;
      cursor: pointer;
      border-radius:5px;
      -moz-border-radius:5px;
      -webkit-border-radius:5px;
      background:whitesmoke;  
    }
    .button:hover
    {
      background:yellow;    
    }
    input[type='text']
    {
      width: 200px;
      float: left;
      margin-bottom: 15px;
    }
    label
    {
      float:right;
      margin-bottom: 15px;
      line-height:21px;
    }
    #form_warper
    {
      width: 500px;
      margin: 20px;
      padding:20px;
      border: #000 dashed 1px;
    }
    .left
    {
      float:left;
      width:220px;
    }
    .right
    {
      margin-left:10px;
      float:left;
      width:220px;
    }
    .clear
    {
      margin-bottom:10px;
      clear:both;
    }
  </style>
    
  </head>
  <body>
    <form action="value_labels.php" method="POST">
      <h2>Aopp's Tool</h2>
      <div id="form_warper">
        <div class="left">
          <label for='aopp_s_name'>Input value serial name:</label>
          
          <label for='aopp_s_value'>Input mo ban:</label>
          
          <label for='aopp_s_max'>Input value serial name:</label>
        </div>
        <div class="right">
          <input type="text" placeholder="eg. t1_tr, not t1_tr1" name="aopp_s_name" value="<?php echo $values;?>"/>
          
          <input type="text" placeholder="eg. 1 'test1' 2 'test2'" name="aopp_s_value" value="<?php echo $s;?>"/>
          
          <input type="text" placeholder="eg. 20, only digit, no space" name="aopp_s_max" value="<?php echo $max;?>"/>
          <input class="button" type="submit" />
          <input class="button" type="reset" />
        </div>
      
      <div class="clear"></div>
      <div style="margin-left: auto;margin-right: auto">
      
      </div>
      </div>
    </form>
    <br>
    <h2>Output is here</h2>
    
    <div style="background: #F0EEE0;font-family: Futura,Arial;color:#06369C">
      <?php echo $output;?>
    </div>
  </body>
</html>