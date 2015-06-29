window.onload = WindowOnLoad;

function WindowOnLoad()
{
    var circle = document.getElementById("circle")
}

document.onmousemove = function(e)
{
    var mouse_x = e.pageX;
    var mouse_y = e.pageY;
}

function moveIt(e)
{ 
    y=Math.floor(Math.random()*301);
    x=Math.floor(Math.random()*401);
    circle.style.top = y+"px";
    circle.style.left = x+"px";
} 


circle.onmouseover = moveIt;