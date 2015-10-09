$(document).ready(function(){
  $('.change div.pix').bind('click',function(){
    var color = $(this).attr('class');
    $(this).removeClass(color);
    $(this).addClass(change_color(color));
    //console.log(color);
    
  });
  
  $('input#a').click(function(){
    console.log('aaa')
    $('div.pix').css('visibility','hidden');
    $('div.imp').css('visibility','show');
  });
});

function change_color(color){
  var num =  color.substr(5,1);
  if(num == 6){
    num = 1;
  }
  else{
    num++;
  }
  return 'color' + num + ' pix imp';
}
