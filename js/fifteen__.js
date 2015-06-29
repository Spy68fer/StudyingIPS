window.onload = newGame;
var empty_i;
var empty_j;

function mixingNumbs(i, ii, j, jj, numbs) // обмен местами
{
    temp = numbs[i][j];
	numbs[i][j] = numbs[ii][jj];
	numbs[ii][jj] = temp;
}

function moveCells(e)
{				
    var el = e.srcElement || e.target;
    var i = el.id.charAt(1);
    var j = el.id.charAt(2);
    if((i == empty_i && Math.abs(j - empty_j) == 1) || (j == empty_j && Math.abs(i - empty_i) == 1))
    {
        document.getElementById(empty_i + " " + empty_j).innerHTML = el.innerHTML;
        el.innerHTML = "";
        empty_i = i;
        empty_j = j;
        var q = true;
        //Провека на выигрышную комбинацию
        for(i = 0; i < 3; ++i)
        {
            for(j = 0; j < 3; ++j)
            {
                if(i + j != 4 && document.getElementById(i + " " + j).innerHTML != i * 3 + j + 1)
                {
                    q = false;
                    break;
                }
            }
			
        }
	if(q) alert("Victory!");
	}
}


function newGame()
{
    // заполняем исходную (выигрышную) позицию
    var numbs = [];
    for(i = 0; i < 3; ++i)
    {
        numbs[i] = [];
        for(j = 0; j < 3; ++j)
        {
            if(i + j != 4)
            {
                numbs[i][j] = i * 3 + j + 1; 
            }
            else
            {
                numbs[i][j] = "";
            }
        }
    }
    
    // производим перемешивание позиции в массиве
    empty_i = 2;
    empty_j = 2;
    var tmp = 0;
    for (i = 0; i < 5000; i++)
    {
        tmp = Math.round(3 * Math.random());
        if ((empty_i != 0) && (tmp == 0))
        {
            mixingNumbs(empty_i, empty_j, --empty_i, empty_j, numbs);
        }
        if ((empty_j != 2) && (tmp == 1))
        {
            mixingNumbs(empty_i, empty_j, empty_i, ++empty_j, numbs);
        }
        if ((empty_i != 2) && (tmp == 2))
        {
            mixingNumbs(empty_i, empty_j, ++empty_i, empty_j, numbs);
        }
        if ((empty_j != 0) && (tmp == 3))
        {
            mixingNumbs(empty_i, empty_j, empty_i, --empty_j, numbs);
        }
    }
    
    // создаем таблицу 3 x 3 в блоке div 
    var table = document.createElement("table");
    for(i = 0; i < 3; i++)
    {
        var row = document.createElement("tr");
        for(j = 0; j < 3; j++)
        {
            var cell = document.createElement("td");
			cell.id = i + " " + j;
            cell.onclick = moveCells;
			cell.innerText = numbs[i][j];
            cell.style.width = '150px';
            cell.style.height = '150px';
            cell.style.font = 'bold 30px Tahoma'; 
            cell.style.border = '1px solid black'; 
            
            row.appendChild(cell);
		}
        table.appendChild(row);
    }
    var field = document.getElementById("field");
    if (field.childNodes.length == 1)
    {
        field.removeChild(field.firstChild);
    }
    field.appendChild(table);
}



