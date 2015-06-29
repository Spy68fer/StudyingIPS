window.onload = function()
{
    function getRandomColor()
    {
        var letters = '0123456789ABCDEF'.split('');
        var color = '#';
        for (var i = 0; i < 6; i++) 
        {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }


    var greet = document.getElementById('greet');    
    var txt = document.getElementById("h1_text");
    
    greet.onclick = function()
    {
        if (document.getElementById("user_name").value != "")
        {
            clr = getRandomColor();
            document.getElementById("h1_text").style.color = clr;
            var usrnm = document.getElementById("user_name").value;
            txt.innerText = "JavaScript is greeting your, " + usrnm + "!";
        }
        else
        {
            alert("Нужно ввести имя пользователя!");
            txt.innerText = "Hello, JavaScript!!";
        }
    }
}