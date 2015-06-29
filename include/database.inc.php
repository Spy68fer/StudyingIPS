<?php
    $g_dbLink = null; // использовать только внутри этого модуля!!!

    function dbConnect($db_name)
    {
        global $g_dbLink;
        $g_dbLink = @mysqli_connect(
                            DB_HOST,
                            DB_USER,
                            DB_PASS, 
                            $db_name, 
                            DB_PORT);
        if (mysqli_connect_errno())
        {
            die('Unable to connect to database.');
        }
    }
            
    /* Выполняет SQL-запрос, переданный в переменную query,
     * возвращает ассоциативный массив с данными, если они есть.
     * Возвращает пустой массив, если данных нет.
     * @param string $query
     * @return array
     */
    function dbQuery($query)
    {
        global $g_dbLink;
        $data = array();

        $result = mysqli_query($g_dbLink, $query);
        if ($result && $result !== true)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                array_push($data, $row);
            }
            mysqli_free_result($result);
        }
        return $data;
    }
    
    
    
    function dbClose()
    {
        global $g_dbLink;
        mysqli_close($g_dbLink);
    }
    
    
    function dbQuote($str) // функция экранирования
    {
        global $g_dbLink;
        return mysqli_real_escape_string($g_dbLink, $str);
    }