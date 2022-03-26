<?php

class DBconnect {

public static function ConnectDataBase($host, $user, $pass, $basename)
{
    $Connect = mysqli_connect($host, $user, $pass, $basename);

    if(!$Connect) 
    {
        return false;
    }
    return $Connect;
}


public static function writePosts($connect, $postId, $userId, $title, $body)
{
    if(!$connect)
    {
        return false;
    }
    
    mysqli_query($connect, "
    INSERT INTO `posts` (`post_id`,`userId`, `title`, `body`) 
    VALUES ('".$postId."', '".$userId."', '".$title."', '".$body."');
    ");

}

public static function writeComments($connect, $commId, $postId, $name, $email, $body)
{
    
if(!$connect)
{
    return false;
}

mysqli_query($connect, "
INSERT INTO `comments` (`comment_id`,`post_id`, `name`, `email`, `body`) 
VALUES ('".$commId."', '".$postId."', '".$name."', '".$email."', '".$body."');
");

}

}


?>