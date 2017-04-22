/**
 * Mouseenter & mouseleave on dashboard
 */

window.onload =	function hoverDashboard(){
	
	var cookiename = document.getElementById("cookiename");
	
	if(window.innerWidth > 590 ){

cookiename.onmouseover = function showPopup(){
	document.getElementById("user").style.borderRadius = "0 0 0 0";
	document.getElementById("usertooltip").style.display = "block";
	
};

cookiename.onmouseleave = function showPopup(){
	document.getElementById("user").style.borderRadius = "0 0 0.7em 0.7em";
		document.getElementById("usertooltip").style.display = "none";
};
	}else{
		
		cookiename.onmouseover = function showPopup(){
		
			document.getElementById("usertooltip").style.display = "block";
			
		};

		cookiename.onmouseleave = function showPopup(){
				document.getElementById("usertooltip").style.display = "none";
		};
		
	}
}