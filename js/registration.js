var ERR = {};
ERR.no_err = 'No errors';
ERR.empt_err = 'textbox must be not empty';
ERR.symb_err0 = 'Unavailable characters in username';
ERR.symb_err1 = 'Unavailable characters in first name';
ERR.symb_err2 = 'Unavailable characters in last name';
ERR.pas_short_err = 'The password is too shortly';
ERR.no_correct_pass = 'Password and Repeat password must be identical'
var error = ERR.no_err;

function windowOnLoad()
{
    subm = document.getElementById('subm');
}

function onlyLetNumb()
{
    if (/[^a-zA-Zа-яА-ЯёЁ  -0-9.]/i.test(user_name))
    {
        error = ERR.symb_err1;
    }
}

function onlyLetters()
{
    var r = /[^a-zA-Zа-яА-ЯёЁ  -.]/i;
    if (r.test(first_name))
    {
        error = ERR.symb_err1;
    }
    if (r.test(last_name))
    {
        error = ERR.symb_err2;
    }
}

function emptyCheck()
{
    if ((!user) || (!first_name) || (!last_name) || (!pass) || (!rep_pass))
    {
        error = ERR.empt_err;
    }
}

function shortCheck()
{
    if ((pass.length < 6) || (rep_pass.length < 6))
    {
        error = ERR.pas_short_err;
    }
}

function correctPass()
{
    if (pass != rep_pass)
    {
        error = ERR.no_correct_pass;
    }
}

window.onload = windowOnLoad;

subm.onclick = check;

function check()
{
    error = ERR.no_err;
    onlyLetters();
    correctPass();
    shortCheck();
    emptyCheck();
    if (error != ERR.no_err) 
    {
        alert("Error: " + error);
    }
    else
    {
        alert("saved");
    }
}

