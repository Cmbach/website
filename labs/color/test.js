// JavaScript Document

var hsv=rgbToHsv(red,green,blue);

function rgbToHsv(R,G,B){
	var H,V,S;
	max=max(R,G,B);
	min=min(R,G,B);  
	if (R == max) H = (G-B)/(max-min) ; 
	if (G == max) H = 2 + (B-R)/(max-min) ;
	if (B == max) H = 4 + (R-G)/(max-min) ; 

	H *= 60; 
	if (H < 0) H += 360;  
	V=max(R,G,B);  
	S=(max-min)/max;
	var result=(H,S,V);
	return result;
	}
	
	function hsvToRgb(H,S,V){ 
	var R,G,B,i,f,a,b,c; 
		if (s == 0)    
		{R=G=B=V;}
		else    
		{
		H /= 60;    
		i = Math.floor(H);
		f = H - i ;
		a = V * ( 1 - s ) ;   
		b = V * ( 1 - s * f ) ;   
		c = V * ( 1 - s * (1 - f ) ) ;   

		switch(i)  
		{    
			case 0: R = V; G = c; B = a;      
			case 1: R = b; G = v; B = a;      
			case 2: R = a; G = v; B = c;      
			case 3: R = a; G = b; B = v;      
			case 4: R = c; G = a; B = v;      
			case 5: R = v; G = a; B = b;
		}
	}
	var result=(R,G,B);
	return result;
}