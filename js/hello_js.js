function change_text()
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

    clr = getRandomColor();
    document.getElementById("h1_text").style.color = clr;
    
    var txt = document.getElementById("h1_text");
    if (document.getElementById("user_name").value != "")
    {
        var usrnm = document.getElementById("user_name").value;
        txt.innerText = "JavaScript is greeting your, " + usrnm + "!";
    }
    else
    {
        alert("Нужно ввести имя пользователя!");
        txt.innerText = "Hello, JavaScript!!";
    }
}
