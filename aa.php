<?php
  echo "<HTML>
          <HEAD>
          
          
          <script src='//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
          <script src='aa.js' type='text/javascript'></script>
          <style type='text/css'>
          
          body{
            background: black;
          }
div.pix{
  margin:0px;
  width:40px;
  height:40px;
  float:left;
}
.color1{
  background: red;
}
.color2{
  background: blue;
}
.color3{
  background: yellow;
}
.color4{
  background: orange;
}
.color5{
  background: green;
}
.color6{
  background: white;
}
br{
  height:0px;
}
div.line{
  clear:both;
}
div.block{
  margin-left:50px;
  float:left;
}
</style>
          </HEAD>
          
          <BODY>";
  
  
  
  for ($i = 0 ; $i < 5 ; $i++){
    for ($j = 0 ; $j < 5 ; $j++){
      $num = rand(1,6);
      $map .= "<div class='color$num pix'></div> ";
    }
    $map .= "<div class='line'></div>";
  }
  
  echo "<div class='block'>$map</div>";
  echo "<div class = 'block change' >$map</div>";
  
  echo "<input type='button' id='a' value = 'show answer'>";
  echo "</BODY></HTML>";
?>