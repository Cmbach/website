<?
$bar = 1920;
$w = $bar;
$h = $bar/2;
$q = $bar/4;
$e = $bar/8;
$s = $bar/16;
$t = $bar/32;

$dot = 1.5;
$l_rate = 0.9;

$force = 80;

// c-1 = 0 c1 = 12
switch($i){
  case 0: 'C';
  break;
  case 1: 'C#';
  break;
  case 2: 'D';
  break;
  case 3: 'D#';
  break;
  case 4: 'E';
  break;
  case 5: 'F';
  break;
  case 6: 'F#';
  break;
  case 7: 'G';
  break;
  case 8: 'G#';
  break;
  case 9: 'A';
  break;
  case 10: 'A#';
  break;
  case 11: 'B';
  break;
  default:
    die('wrong note pitch to note name');
}


//octave C4 is middle C from 0 to 8
