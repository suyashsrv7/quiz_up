var x=1;
var total=6;
function slide(k)
{
	var elem=document.getElementById("img1");
	var elem1=document.getElementById("img2");
	if(x<total&&x>0)
	{
	x=x+k;
}
else if(x<=0)
{
	x=total-1;
}
else if(x>=total)
{
	x=1;
}
elem.style.background="url"+"("+x+"."+"jpg"+")";
	elem1.style.background="url"+"("+(x+1)+"."+"jpg"+")";
}

















