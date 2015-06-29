var pictures = new Array();    
var files = new Array();
var empt = 0;
window.onload = onWindowLoad;

function onWindowLoad()
{
    var newGame = document.getElementById('reset');
    newGame.onclick = reset;
    reset();
}

function reset()
{
    for(var i = 0; i < 9; i++)
    {
        pictures[i] = document.getElementById('img' + (i + 1));
    }
    
    for(var i = 0; i < 9; i++)
    {
        files[i] = 'images/img' + (i + 1) + '.png';
    }
   
    for (var i = 0, num = 8; i < 9; i++, num--)
    {
        var rand = Math.round(Math.random()*num);
        pictures[i].src = files[rand];
        if (files[rand] == 'images/img9.png')
        {
            window.empt = i;
        }
        var temp = files[rand];
        files[rand] = files[num];
        files[num] = temp;
    } 
    for(var i = 0; i < 9; i++)
    {
        pictures[i].onclick = changePict;
    } 
} 

function getNumbFromName(str)
{
    return str[str.length-1]
}

function changePict()
{
    var str = this.id;
    var currPos = getNumbFromName(str) - 1;
    if (pictures[currPos - 3])
    {
        alert(pictures[currPos - 3].value)
    }
    
    (str.lastIndexOf('img9.png') == -1)
  
}

