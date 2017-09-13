
var x=1;
var total=6;
	function slide()
	{
		var id=setInterval(move,800);
	}
	function move()
	{
		if(x<=total)
		{
		var elem=document.getElementById("swipe");
		elem.style.background="url"+"("+x+"."+"jpg"+")";
		x++;
	}
	else
	{
		x=1;
	}
}
