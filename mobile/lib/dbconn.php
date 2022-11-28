<?
    $connect=mysql_connect( "localhost", "imfulll", "qwer!10101") or  
        die( "SQL server에 연결할 수 없습니다."); 

    mysql_select_db("imfulll",$connect);
?>
