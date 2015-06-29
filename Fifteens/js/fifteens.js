$(document).ready
(
    function()
    {
        var button = $('#button');
        var resett = $('#resett');
        
    }
);

button.onclick = start_game;
resett.onclick = start_game;
var count = 0;
function start_game()
{  
    $('.start_button_field').hide('fast');
    $('.stat_field').show();
    count = 0;
    document.getElementById('count').innerText = count;
    mixing();
}
        
var game_array = [0, 1, 2, 3, 4, 5, 6, 7, 8, false];

function mixing()
    {
        for(var i = 0; i < 400; i++)
        {
            var direct = Math.floor(Math.random() * 4) + 1;
            var free_pos = 0;
            for(var j = 1; j<=9;j++)
            {
                if(game_array[j] == false)
                {
                    free_pos = j;
                    break;
                }
            }
            switch(direct)
            {
                case 1:
                    move_top(free_pos);
                    break;
                case 2:
                    move_bottom(free_pos);
                    break;
                case 3:
                    move_left(free_pos);
                    break;
                case 4:
                    move_right(free_pos);
                    break;
                default:
                    break;
            }
        }
    }

$('.block').click
(
    function()
    {

        var curr = ($(this).attr('id'));
        curr = curr[6];
        var free_pos = 0;
        for(var j = 1; j<=9;j++)
        {
            if(game_array[j] == false)
            {
                free_pos = j;
                break;
            }
        }
        if (free_pos == curr) return;

        if (free_pos == (parseInt(curr) - 3))
        {
            move_bottom(free_pos);
            count++;
        }
        if (free_pos == (parseInt(curr) + 3))
        {
            move_top(free_pos);
            count++;
        }
        if (free_pos == (parseInt(curr) - 1))
        {
            move_right(free_pos);
            count++;
        }
        if (free_pos == (parseInt(curr) + 1))
        {
            move_left(free_pos);
            count++;
        }
        document.getElementById('count').innerText = count;        
        win_check();
    }    
);

    function move_top(free_pos)
    {
        if (free_pos > 3)
        {
            $('#block_'+(free_pos-3)).css('background','url(../images/img9.png)');
            $('#block_'+(free_pos)).css('background','url(../images/img'+game_array[free_pos-3]+'.png)');
            game_array[free_pos] = game_array[free_pos-3];
            game_array[free_pos - 3] = false;
        }
    }
    
     function move_left(free_pos)
    {
        if (free_pos != 1 && free_pos != 4 && free_pos != 7)
        {
            $('#block_'+(free_pos-1)).css('background','url(../images/img9.png)');
            $('#block_'+(free_pos)).css('background','url(../images/img'+game_array[free_pos-1]+'.png)');
            game_array[free_pos] = game_array[free_pos-1];
            game_array[free_pos-1] = false;
        }
    }
   
   function move_bottom(free_pos)
    {
        if (free_pos < 7)
        {
            $('#block_'+(free_pos+3)).css('background','url(../images/img9.png)');
            $('#block_'+(free_pos)).css('background','url(../images/img'+game_array[free_pos+3]+'.png)');
            game_array[free_pos] = game_array[free_pos+3];
            game_array[free_pos+3] = false;
        }
    }
   
   function move_right(free_pos)
    {
        if (free_pos != 3 && free_pos != 6 && free_pos != 9)
        {
            $('#block_'+(free_pos+1)).css('background','url(../images/img9.png)');
            $('#block_'+(free_pos)).css('background','url(../images/img'+game_array[free_pos+1]+'.png)');
            game_array[free_pos] = game_array[free_pos+1];
            game_array[free_pos+1] = false;
        }
    }

    function win_check()
    {
        if (game_array.toString() == [0, 1, 2, 3, 4, 5, 6, 7, 8, false].toString())
        {
            alert('WIN!! Your result: ' + count + ' moves');
            $('.start').hide();
            $('.start_button_field').show();
            $('.win').show();
            $('.win').css('display','block');
            $('.win').css('z-index','6000');
            $('.resett').css('display','block');
            return;
        }
    }