var x = window.location.href.split('?');
var mobile = true;
$(document).ready(function(){
  $('body').bind("keydown", function(e){
    if(e.keycode == 18){
      mobile = false;
    }
});

$('body').bind("keyup", function(e){
    if(e.keycode == 18){
      mobile = true;
    }
});
  
  var bus = 'http://www.ctabustracker.com/bustime/eta/eta.jsp?id=';
  var train = 'http://www.transitchicago.com/traintracker/arrivaltimes.aspx?sid=';
  var bus_mobile = 'http://www.ctabustracker.com/bustime/wireless/html/eta.jsp?route=---&direction=---&displaydirection=---&stop=---&id=';
  var train_mobile = 'http://www.transitchicago.com/mobile/traintrackerarrivals.aspx?sid=';
  
  $('a.bus').attr('href',function(){
    var link =  mobile ? bus_mobile : bus;
    link = link+$(this).attr('id');
    return link;
  });
  $('a.bus').attr('target','_blank');
  
  $('a.train').attr('href',function(){
 
    var link =  mobile ? train_mobile : train;
    link = link+$(this).attr('id');
    return link;
  });
  $('a.train').attr('target','_blank');
  
  $('.info div').hide();
  

  $('.tab a').click(function(){
    $('.info div').hide();
    $('.tab').hide();
    var the_class = $(this).attr('value');
    the_class = '.'+the_class;
    console.log(the_class);
    $(the_class).show();
    
    handle_aopp();
  });
  
  $('.backtotab').click(function(){
    $('.tab').show();
    $('.info div').hide();
  })
});





function handle_aopp(){
  if(x[1] == 'aogg'){
    $('.aopp').hide();
    $('.aogg').show();
  }
  else if (x[1] == 'aopp'){
    $('.aogg').hide();
    $('.aopp').show();
  }
}
