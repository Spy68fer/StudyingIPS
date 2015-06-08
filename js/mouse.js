document.onmousemove = function(e)
{
    document.getElementById('x_coord').innerText = e.pageX;
    document.getElementById('y_coord').innerText = e.pageY;
}
