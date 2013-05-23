// JavaScript Document
// color.js for Kevin's color lab
//Author: Kevin Xi
var red,green,blue,hsv,hsl,cmyk;

$(document).ready(function() {
	
	//sliders
	
	
	
	
	$('label.validation').hide();
	
	readColor();
	getRgb();
	getHs();	
	getCmyk();
	makeSliders();
	//change radio events
	$('input[name="RGB_type"][type="radio"]').click(function(){
		$(this).siblings().removeAttr("checked");
		$(this).attr("checked","checked");
		if($(this).val() == "Hex") $('div#RGB input').attr("onKeyUp","onlyHex(this)");
		else $('div#RGB input').attr("onKeyUp","onlyNum(this)");
		getRgb();
	})
	$('input[name="HS_type"][type="radio"]').click(function(){
		$(this).siblings().removeAttr("checked");
		$(this).attr("checked","checked");
		getHs();
	})

	//get RGB 255
	function getRgb255(){
	$('input#picker_Red').attr("value",red);
	$('input#picker_Gree').attr("value",green);
	$('input#picker_Blue').attr("value",blue);
	}
	//get RGB hex
	function getRgbHex(){
	$('input#picker_Red').attr("value",(red.toString(16)).toUpperCase());
	$('input#picker_Gree').attr("value",(green.toString(16)).toUpperCase());
	$('input#picker_Blue').attr("value",(blue.toString(16)).toUpperCase());
	}
	//get RGB percent
	function getRgbPercent(){
	$('input#picker_Red').attr("value",Math.round(red/255*100));
	$('input#picker_Gree').attr("value",Math.round(green/255*100));
	$('input#picker_Blue').attr("value",Math.round(blue/255*100));
	}
	//put RGB together
	function getRgb(){
		var radioRgb=$('input[name="RGB_type"][checked]').val();
		if(radioRgb == "255") 
		{
			getRgb255();
		}
		else if(radioRgb == "Hex") 
		{
			getRgbHex();
		}
		else if(radioRgb == "Percent") 
		{
			getRgbPercent();
		}
	}
	//get HSV_B
	function getHsv(){
	$('input#picker_Hue').attr("value",hsv[0]);
	$('input#picker_Satu').attr("value",hsv[1]);
	$('input#picker_VB').attr("value",hsv[2]);
	}
	//get HSL 
	function getHsl(){
	$('input#picker_Hue').attr("value",hsl[0]);
	$('input#picker_Satu').attr("value",hsl[1]);
	$('input#picker_VB').attr("value",hsl[2]);
	}
	//put HS together
	function getHs(){
	var radioHs=$('input[name="HS_type"][checked]').val();
		if(radioHs == "HSV")
		{	
			$('label[for="picker_VB"]').html("Value/Brightness");
			getHsv();
		}
		else if(radioHs == "HSL")
		{
			$('label[for="picker_VB"]').html("Lightness");
			getHsl();
		}
	}
	//get CMYK
	function getCmyk(){
	$('input#picker_Cyan').attr("value",cmyk[0]);
	$('input#picker_Mage').attr("value",cmyk[1]);
	$('input#picker_Yell').attr("value",cmyk[2]);
	$('input#picker_Blac').attr("value",cmyk[3]);
	}
	
	//convertions
	//convert RGB to HSV
	function rgbToHsv(R,G,B){
	var H,V,S;
	var theMax=Math.max(R,G,B);
	var theMin=Math.min(R,G,B);  
	if (R == theMax) H = (G-B)/(theMax-theMin) ; 
	if (G == theMax) H = 2 + (B-R)/(theMax-theMin) ;
	if (B == theMax) H = 4 + (R-G)/(theMax-theMin) ; 

	H *= 60; 
	if (H < 0) H += 360; 
	H = Math.round(H); 
	V = Math.round(100*theMax/255);  
	S = Math.round(100*(theMax-theMin)/theMax);
	return [H,S,V];
}
//convert RGB to HSL
	function rgbToHsl(R,G,B){
	R /= 255; G /= 255; B /= 255;
	var H,L,S,ls_G,ls_B,ls_R;
	var theMax=Math.max(R,G,B);
	var theMin=Math.min(R,G,B); 

	var L = (theMax + theMin) / 2;

    if (theMax - theMin == 0)
    {
            H = 0;
            S = 0;
    }
    else
    {
            if (L < 0.5)
            {
                    S = (theMax - theMin) / (theMax + theMin);
            }
            else
            {
                    S = (theMax - theMin) / (2 - theMax - theMin);
            };

            ls_R = (((theMax - R) / 6) + ((theMax - theMin) / 2)) / (theMax - theMin);
            ls_G = (((theMax - G) / 6) + ((theMax - theMin) / 2)) / (theMax - theMin);
            ls_B = (((theMax - B) / 6) + ((theMax - theMin) / 2)) / (theMax - theMin);

            if (R == theMax)
            {
                    H = ls_B - ls_G;
            }
            else if (G == theMax)
            {
                    H = (1 / 3) + ls_R - ls_B;
            }
            else if (B == theMax)
            {
                    H = (2 / 3) + ls_G - ls_R;
            };

            if (H < 0)
            {
                    H += 1;
            };

            if (H > 1)
            {
                    H -= 1;
            };
    };
	H = Math.round(H*360);
	S = Math.round(S*100);
	L = Math.round(L*100);
	return [H,S,L];
}	
	//convert HSV to RGB
 function hsvToRgb(H,S,V){ 
 	 S/=100; V/=100;
	var R,G,B,i,f,a,b,c; 
		if (S == 0)    
		{B=R=G=V;}
		else    
		{
		H /= 60;    
		i = Math.floor(H);
		f = H - i ;
		a = V * ( 1 - S ) ;   
		b = V * ( 1 - S * f ) ;   
		c = V * ( 1 - S * (1 - f ) ) ;   
		switch (i)  
			{    
			case 0: R = V, G = c, B = a;  break;    
			case 1: R = b, G = V, B = a;  break;    
			case 2: R = a, G = V, B = c;  break;    
			case 3: R = a, G = b, B = V;  break;    
			case 4: R = c, G = a, B = V;  break;    
			case 5: R = V, G = a, B = b;  break;
			default: R = 0, G = 0, B = 0; 
			}
		}
		R *=255; G *=255; B*=255;
		R = Math.round(R); G = Math.round(G); B = Math.round(B);
	return [R,G,B];
	}

	//convert HSL to RGB
	function hslToRgb(H,S,L){
		S /= 100;
		L /= 100;
	var P,Q,i;
	var t = new Array();
	if( L < 0.5 )
		Q = L * ( 1 + S );
	else
		Q = L + S - L * S ;
	P = 2 * L - Q;
	H = ( H == 360 ) ? 0: H/360;
	t[0] = H + 1/3;
	t[1] = H;
	t[2] = H - 1/3;
	for ( i = 0; i < 3; i++)
	{ 
		if ( t[i] < 0 ) t[i]++;
		if ( t[i] > 1 ) t[i]--;
		
		if ( t[i] < 1/6 ) t[i] = P + ( Q - P ) * 6 * t[i] ;
		else if ( t[i] < 1/2 ) t[i] = Q;
		else if ( t[i] < 2/3 ) t[i] = P + ( Q - P ) * 6 * ( 2/3 - t[i] );
		else t[i] = P;	
		t[i] *= 255;
		t[i] = Math.round(t[i]);
	}
	
	return [t[0],t[1],t[2]];
}
	
	//convert RGB to CMYB
	function rgbToCmyk (r,g,b) {
	var C = 0;
	var M = 0;
	var Y = 0;
	var K = 0;
	// BLACK
	if (r==0 && g==0 && b==0) {K = 1;return [0,0,0,1];}
	C = 1 - (r/255);
	M = 1 - (g/255);
	Y = 1 - (b/255);
	var minCMY = Math.min(C,M,Y);
	C = Math.round(100 * (C - minCMY) / (1 - minCMY)) ;
	M = Math.round(100 * (M - minCMY) / (1 - minCMY)) ;
	Y = Math.round(100 * (Y - minCMY) / (1 - minCMY)) ;
	K = Math.round(100 * minCMY);
	return [C,M,Y,K];
	}
	
	//CMYB to RGB
	function cmykToRgb(C,M,Y,K){
	C /= 100;
	M /= 100;
	Y /= 100;
	K /= 100;
	var C3 = C * (1 - K) + K;
	if (C3>1) {C3=1;}
	var M3 = M * (1 - K) + K;
	if (M3>1) {M3=1;}
	var Y3 = Y * (1 - K) + K;
	if (Y3>1) Y3=1;
	R = Math.round(255 * (1 - C3));
	G = Math.round(255 * (1 - M3));
	B = Math.round(255 * (1 - Y3));
	return([R,G,B]);
	}
	
	//get current RGB function
	function readColor(){
    var color=$('div#output1').css("background-color");
	var patt=/([0-9]+), ([0-9]+), ([0-9]+)/;
	color=patt.exec(color);
	red=Number(color[1]);
	green=Number(color[2]);
	blue=Number(color[3]);
	//read others
	hsv=rgbToHsv(red,green,blue);
	hsl=rgbToHsl(red,green,blue);
	cmyk=rgbToCmyk(red,green,blue);
	}
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//inputs
	
	//change rgb
	$('#picker_Red,#picker_Gree,#picker_Blue').each(function(){
		$(this).change(function(){
		var radioRgb=$('input[name="RGB_type"][checked]').val();
		var whichColor=$(this).attr("name");
		if(radioRgb == "255") 
		{
			temp = Number($(this).val());
		}
		else if(radioRgb == "Hex") 
		{
			temp = parseInt($(this).val(),16);
		}
		else if(radioRgb == "Percent") 
		{
			temp =  $(this).val();
			temp = Math.round( temp * 2.55);
		}
		
		if ( temp < 0 || temp > 255  ) 
		$('label[for="rgbValidation"]').show('slow').delay(1500).hide('slow');
		if (temp < 0) temp = 0; 
		if (temp > 255) temp = 255;
		
		if( whichColor == "picker_Red" ) red=temp;
		else if( whichColor =="picker_Gree" ) green=temp;
		else if( whichColor == "picker_Blue" ) blue=temp;
		setColor(red,green,blue);
		getHs();	
		getCmyk();
		});
	});
	//change HSV/L	
	$('#picker_Hue,#picker_Satu,#picker_VB').each(function(){
		$(this).change(function(){
		var radioHs=$('input[name="HS_type"][checked]').val();
		var newRgb = new Array();
		var h,s,v;
		h=$('input[name="picker_Hue"]').val();
		s=$('input[name="picker_Satu"]').val();
		v=$('input[name="picker_VB"]').val();
		if ( h < 0 || h > 360 || s < 0 || s > 100 || v < 0 || v > 100 ) 
			$('label[for="hsValidation"]').show('slow').delay(1500).hide('slow');
		if (h <0 || h > 359) h=0; 
		if (s < 0 ) s = 0; 
		if (s > 100 ) s = 100;
		if (v < 0 ) v = 0; 
		if (v > 100 ) v = 100; 

		if (radioHs == "HSV")
		newRgb = hsvToRgb(h,s,v);
		else if (radioHs == "HSL")
		newRgb = hslToRgb(h,s,v);
		setColor(newRgb[0],newRgb[1],newRgb[2]);
		getRgb();
		getCmyk();
		})
	})
	//change CMYK
	$('#picker_Cyan,#picker_Mage,#picker_Yell,#picker_Blac').each(function(){
		$(this).change(function(){
			var test = $(this).val();
			if ( test < 0 || test > 100  )
			$('label[for="cmykValidation"]').show('slow').delay(1500).hide('slow');
		var newRgb = new Array();
		var newCmyk = new Array();
		newCmyk[0]=$('input[name="picker_Cyan"]').val();
		newCmyk[1]=$('input[name="picker_Mage"]').val();
		newCmyk[2]=$('input[name="picker_Yell"]').val();
		newCmyk[3]=$('input[name="picker_Blac"]').val();
		
		for (i = 0 ;i < 4; i++)
			{
			if ( newCmyk[i] < 0 ) newCmyk[i] = 0;
			if ( newCmyk[i] > 100) newCmyk[i] = 100;
			}
		newRgb = cmykToRgb(newCmyk[0],newCmyk[1],newCmyk[2],newCmyk[3]);
		setColor(newRgb[0],newRgb[1],newRgb[2]);
		getRgb();
		getHs();	
	
		});
	});
	
	
	function setColor(R,G,B){
		var C = new Array();
		C[0]=R.toString(16);
		C[1]=G.toString(16);
		C[2]=B.toString(16);
		var i;
		for( i = 0 ; i<3;i++)
		{
			if(C[i].length == 0) C[i] = "00";
			else if (C[i].length == 1) C[i] = "0" + C[i];
			else if (C[i].length == 2) ;
			else C[i] = "FF";
		}
		
		var newColor = "#"+C[0]+C[1]+C[2];
		$('div#output1').css('background-color',newColor);	
	readColor();
	}
	
	function hexFromRGB(r, g, b) {
		var hex = [
			r.toString( 16 ),
			g.toString( 16 ),
			b.toString( 16 )
		];
		$.each( hex, function( nr, val ) {
			if ( val.length === 1 ) {
				hex[ nr ] = "0" + val;
			}
		});
		return hex.join( "" ).toUpperCase();
	}
	function refreshSwatch() {
		    red = $( "#slider_Red" ).slider( "value" ),
			green = $( "#slider_Gree" ).slider( "value" ),
			blue = $( "#slider_Blue" ).slider( "value" ),
			hex = hexFromRGB( red, green, blue );
		$( "#output1" ).css( "background-color", "#" + hex );
		
	}
	
	
	function makeSliders(){
	
		$( "#slider_Red, #slider_Gree, #slider_Blue" ).slider({
			orientation: "horizontal",
			range: "min",
			max: 255,
			value: 127,
			slide: refreshSwatch,
			change: refreshSwatch
		});
		$( "#slider_Cyan,#slider_Mage,#slider_Satu,#slider_VB,#slider_Yell,#slider_Blac" ).slider({
			orientation: "horizontal",
			range: "min",
			max: 100,
			value: 50,
			slide: refreshSwatch,
			change: refreshSwatch
		});
		$( "#slider_Hue" ).slider({
			orientation: "horizontal",
			range: "min",
			max: 359,
			value: 100,
			slide: refreshSwatch,
			change: refreshSwatch
		});
		
		
		$( "#picker_Red" ).slider( "value", red );
		$( "#picker_Gree" ).slider( "value", green );
		$( "#picker_Blue" ).slider( "value", blue );
		$("#picker_Hue" ).slider("value",hsv[0]);
		$("#picker_Satu" ).slider("value",hsv[1]);
		$("#picker_VB" ).slider("value",hsv[2]);
		$("#picker_Cyan" ).slider("value",cmyk[0]);
		$("#picker_Mage" ).slider("value",cmyk[1]);
		$("#picker_Yell" ).slider("value",cmyk[2]);
		$("#picker_Blac" ).slider("value",cmyk[3]);
	}
	//sliders end
	
	
	
	
// end of Jquery...
});
//////////////////////////////////validators
function onlyNum(obj)
	{
		
		obj.value = obj.value.replace(/[^\d.]/g,"");
		obj.value = obj.value.replace(/\.{2,}/g,".");
		obj.value = obj.value.replace(".","$#$").replace(/\./g,"").replace("$#$",".");
		
	}
	
function onlyHex(obj)
	{
		
		obj.value = obj.value.replace(/[^\dabcdef]/gi,"");
		obj.value = obj.value.replace(".","$#$").replace(/\./g,"").replace("$#$",".");
	}

