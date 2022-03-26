<?php

$resComm=file_get_contents('https://jsonplaceholder.typicode.com/comments');
$dataComm=json_decode($resComm,true);


echo '
<html>
<head>
<link type="text/css" rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="formS">
    <form action="" method="POST">
        <p>Введите слово для поиска:</p>
        <input type="text" name="textS" value=""></br></br>
        <input type="submit" name="search" value="Найти">
    </form>';


if (isset($_POST['textS'])) 
{  
    if(strlen($_POST['textS'])<3)
    {
        echo '<p>малосимволов</p>';
        return false;
    } else 
    {
        $pattern='/'.$_POST['textS'].'/';
        for($i=0;$i<count($dataComm);$i++)
        {
            $substr=$dataComm[$i]['body'];
            if(preg_match($pattern, $substr)>0){
                echo '<pre><b>Заголовок</b>: '.$dataComm[$i]['name'].'<br>';
                echo '<b>Текст комментария</b>: '.$dataComm[$i]['body'].'<pre>';
            }
        }
    }



}






echo '</div> 
</body>
</html>';

?>





