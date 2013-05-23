


$(document).ready(function(){
  var temp1 = {1: "8", 5: "4", 8: "6", 10: "3", 12: "7", 13: "1", 15: "9", 
  18: "9", 19: "1", 21: "6", 26: "3", 29: "1", 32: "9", 36: "3", 37: "6", 
  43: "5", 44: "7", 48: "3", 51: "8", 54: "1", 59: "7", 61: "3", 62: "4", 
  65: "3", 67: "5", 68: "8", 70: "7", 72: "6", 75: "4", 79: "2"};
  
  var temp2 = {4: "1", 5: "3", 12: "8", 13: "5", 15: "3", 16: "2", 18: "3", 
  20: "2", 25: "8", 27: "8", 33: "9", 34: "6", 35: "7", 36: "2", 38: "1", 
  42: "8", 44: "3", 45: "7", 46: "9", 47: "4", 53: "2", 55: "8", 60: "4", 
  62: "1", 64: "1", 65: "6", 67: "3", 68: "8", 75: "9", 76: "4"};
  
  var temp3 = {1: "8", 2: "9", 3: "3", 13: "6", 18: "6", 19: "7", 21: "9", 
  24: "2", 28: "3", 33: "7", 35: "9", 37: "2", 40: "4", 43: "5", 45: "9", 
  47: "5", 52: "6", 56: "3", 59: "8", 61: "1", 62: "5", 67: "1", 77: "4", 
  78: "6", 79: "8"};
  
  
  $('a.debug-trigger').click(function(e){
    e.preventDefault();
    $('div.debug').slideToggle('slow');
  })
  
  $('input.reset').click(function(e){
    e.preventDefault();
    clear_all();
  })
  
  $('input.puzzle').focusin(function(){$(this).addClass('highlight');}).keyup(function(e){
    var i = $(this).attr('name').substr(1,1);
    var j = $(this).attr('name').substr(2,1);
    //console.log($(this).attr('name')+"bind over");
    
    i = parseInt(i);
    j = parseInt(j);
      if(e.keyCode == 38){
        m = i-1;
        n = j;
        m = m < 0 ? 0 : m;
        $('input[name="a'+m+n+'"]').focus();
      }
      if(e.keyCode == 40){
        m= i + 1;
        n=j;
        m = m > 8 ? 8 : m;
        $('input[name="a'+m+n+'"]').focus();
      }
      if(e.keyCode == 37){
        m=i;
        n=j-1;
        if(n < 0){
          m = m == 0 ? 0 : m - 1;
          n = 8;
        }
        $('input[name="a'+m+n+'"]').focus();
      }
      if(e.keyCode == 39){
        m = i ;
        n = j + 1 ;
        if( n > 8){
          m = m == 8 ? 8 : m + 1;
          n = 0;
        }
        $('input[name="a'+m+n+'"]').focus();
      }
  });
  $('input.puzzle').focusout(function(){
    $(this).removeClass('highlight');
  });
    
    $('input.style-A').css('background','#CEE').parent().css('background','#CEE');
    $('input.style-B').css('background','#EEE').parent().css('background','#EEE');
    $('td').css('border','1px solid #FFF');
    $('input.style-B,input.style-A').css({opacity:"0.5",border:"none"});
    
    
    
    $('#d1').click(function(e){
      e.preventDefault();
      clear_all();
      for (id in temp1){
        $('input.puzzle#'+id).val(temp1[id]);
      }
    });
    
    $('#d2').click(function(e){
      e.preventDefault();
      clear_all();
      for (id in temp2){
        $('input.puzzle#'+id).val(temp2[id]);
      }
    });
    
    $('#d3').click(function(e){
      e.preventDefault();
      clear_all();
      for (id in temp3){
        $('input.puzzle#'+id).val(temp3[id]);
      }
    });
    
    
    
    $('#save').click(function(e){
      var json = {};
      $('input.puzzle').each(function(){
        if($(this).val()>0){
          json[this.id] = $(this).val();
        }
      });

      console.log(json);
      e.preventDefault();
    });
});

function clear_all(){
  $('input.puzzle').each(function(){
    $(this).val('');    
  });
}

function sp(){
      clear_all();
      for (id in weird){
        $('input.puzzle#'+id).val(weird[id]);
      }
    }

var weird = {0: "1", 1: "2", 2: "3", 3: "4", 4: "5", 5: "6", 6: "7", 7: "8",
   8: "9", 9: "4", 10: "5", 11: "6", 12: "7", 13: "8", 14: "9", 15: "1", 
   16: "2", 17: "3", 18: "7", 19: "8", 20: "9", 21: "1", 22: "2", 23: "3", 
   24: "4", 25: "5", 26: "6", 27: "2", 28: "3", 29: "4", 30: "5", 31: "6", 
   32: "7", 33: "8", 34: "9", 35: "1", 36: "5", 37: "6", 38: "7", 39: "8", 
   40: "9", 41: "1", 42: "2", 43: "3", 44: "4", 45: "8", 46: "9", 47: "1", 
   48: "2", 49: "3", 50: "4", 51: "5", 52: "6", 53: "7", 54: "3", 55: "4", 
   56: "5", 57: "6", 58: "7", 59: "8", 60: "9", 61: "1", 62: "2", 63: "6", 
   64: "7", 65: "8", 72: "9", 73: "1", 74: "2"};   
    
 
// css('background','#FFE')
/*37 - left

38 - up

39 - right

40 - down
*/