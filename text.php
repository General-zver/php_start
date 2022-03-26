<?php

require_once('config/config.php');
require_once('app/DBconnect.php');

$connect=DBconnect::ConnectDataBase(HOST,USER,PASSWORD,DB);

if(!$connect)
{ 
    require('./public/error.html');
    return false;
}

$countPosts = 0;
$countComments = 0;

echo '<p align="center">Заголовок страницы</p>';
$resPosts = file_get_contents('https://jsonplaceholder.typicode.com/posts');
$resComments = file_get_contents('https://jsonplaceholder.typicode.com/comments');

$dataPosts = json_decode($resPosts, true);
$dataComments = json_decode($resComments, true);
$c=0;
$q=0;

for($i=0; $i<count($dataPosts); $i++)
{
    DBconnect::writePosts($connect,$dataPosts[$i]['id'],$dataPosts[$i]['userId'],$dataPosts[$i]['title'],$dataPosts[$i]['body']);
    $c++; 
}

for($j=0; $j<count($dataComments);$j++)
{
    DBconnect::writeComments($connect,$dataComments[$j]['id'],$dataComments[$j]['postId'],$dataComments[$j]['name'],$dataComments[$j]['email'],$dataComments[$j]['body']);
    $q++;
}

echo 'Количество загруженных записей блога: ' . $c . ' комментариев: ' . $q;

?>