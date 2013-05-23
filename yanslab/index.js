// JavaScript Document
// index.js
$(function(){
				
				$('#pub,#teach,#research,#yansPj,#michellesPj,#mikesPj').hide();
			
				//tabs
				
				$('.contents').hide();
				$('.contents:first').show();				
				
				
				
				
				$('#home').addClass('current');
				$('div #tabs > a > div').hover(
					function() { $(this).addClass('ui-state-hover'); },
					function() { $(this).removeClass('ui-state-hover'); }
				);
				$('div #tabs > a > div').click(function() {
				//$('#home_content,#lab_content').hide();
					$('div #tabs > a > div').removeClass('current');
					$(this).addClass('current');
					$('.contents').hide()
					var currentTab = $(this).parent().attr('href');
					$(currentTab).show();
					return false;	
					});	
				$('#pub_t').click(function(){	
				if ($("#pub").is(":hidden")) 
					{
					$('#pub').slideDown("slow");
					$(this).removeClass("hint");
					}
				else 
					{
					$("#pub").slideUp("slow");
					$(this).addClass("hint");
					}
				});
				$('#research_t').click(function(){	
				if ($("#research").is(":hidden")) 
				{
					$('#research').slideDown("slow");
					$(this).removeClass("hint");
				}
				else 
				{
					$("#research").slideUp("slow");
					$(this).addClass("hint");
				}
				});
				$('#teach_t').click(function(){	
				if ($("#teach").is(":hidden")) 
					{
					$('#teach').slideDown("slow");
					$(this).removeClass("hint");
					}
				else 
				{	
				$("#teach").slideUp("slow");
				$(this).addClass("hint");
				}
				});
				
				$('#yansPj_t').click(function(){	
				if ($("#yansPj").is(":hidden")) 
					{
					$('#yansPj').slideDown("slow");
					$(this).removeClass("hint");
					}
				else 
				{	
				$("#yansPj").slideUp("slow");
				$(this).addClass("hint");
				}
				});
				
				$('#michellesPj_t').click(function(){	
				if ($("#michellesPj").is(":hidden")) 
					{
					$('#michellesPj').slideDown("slow");
					$(this).removeClass("hint");
					}
				else 
				{	
				$("#michellesPj").slideUp("slow");
				$(this).addClass("hint");
				}
				});
				
				$('#mikesPj_t').click(function(){	
				if ($("#mikesPj").is(":hidden")) 
					{
					$('#mikesPj').slideDown("slow");
					$(this).removeClass("hint");
					}
				else 
				{	
				$("#mikesPj").slideUp("slow");
				$(this).addClass("hint");
				}
				});
		
		////Form check
});

	function isEmail(strEmail) {
		if (strEmail.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1)
		{return true;}
		else
		{
		return false;
		}
	}

	function isNameEmpty()
	{  
		if   (email_form.name.value.length == 0)   { 
			$("#noname").slideDown().delay(1500).slideUp();   return false;}
		else {$("#noname").hide(); return true;}
	}
	
	function isEmailEmpty()
	{  
		if   (email_form.email.value.length == 0)    { 
			$("#noemail").slideDown().delay(1500).slideUp();   return false;}
		else {$("#noemail").hide(); return true;}
	}
	function isEmailValid()
	{  
		if(isEmailEmpty())
			{var str = email_form.email.value;
				if(isEmail(str))
					return true;
				else 	
					{
						$("#noemail").slideDown().delay(1500).slideUp();  
						return false;
					}
			}
		else
			return false;
	}
	
	function isQuestionEmpty()
	{  
		if   (email_form.question_details.value.length < 15)    {  
			$("#noquestion").slideDown().delay(1500).slideUp();   return false;}
		else {$("#noquestion").hide(); return true;}
	}
	
	function formCheck()
	{
		if(isNameEmpty() && isEmailValid() && isQuestionEmpty())
			return true;
		else
			return false; 
	}