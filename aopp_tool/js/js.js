$(document).ready(function(){
  $('h1#magic').on('click',function(){
    if($(this).hasClass('a')){
      $('.candidate').fadeToggle(400);
      $('.candidate_plain').delay(400).fadeToggle(400);
      $(this).addClass('b');
      $(this).removeClass('a');
      console.log('triger a');
    }
    else{
      $('.candidate_plain').fadeToggle(400);
      $('.candidate').delay(400).fadeToggle(400);
      $(this).addClass('a');
      $(this).removeClass('b');
      console.log('triger b');
    }
  });
  
  $('.trivial').hide();
  
  $('#trivial').on('click',function(){
    $('.trivial').toggle();
  });
  
  $('a#run-line').click(function(e){
    e.preventDefault();
    split_line(6);
  })
  $('a#show-tool').click(function(e){
    e.preventDefault();
    $('div.line_break').slideToggle(400);
  });
  
  $('a#clear-line').click(function(e){
    e.preventDefault();
    $('#get-line').val('');
  });
  
})

function split_line(max){
  var text = $('#get-line').val();
  var output = '';
  var n = [];
  n = text.split(/\s+/);
  console.log(n);
  var tmp = '';
  for (index in n){
    var tmp2 = parseInt(index) +1;
    //console.log((index+1)%max);
    if((tmp2)%max == 0){
      tmp = "\n";
    }
    else{
      tmp = " ";
    }
    output += n[index]+tmp;
  }
  $('#get-line').val(output);
}
