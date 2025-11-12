<?php

    $HOSTNAME = 'alkitab.api';
    
    $url = str_replace( $HOSTNAME, '', $_SERVER['REQUEST_URI']);
    $url = ltrim(rtrim($url, '/'), '/');

    $req = explode('/', $url);

    
    require "class.mysqli.php";

    $db = new MysqliDb (
        Array (
            'host' => 'localhost',
            'username' => 'root', 
            'password' => '',
            'db'=> 'dbbible',
            'port' => 3306,
            'prefix' => '',
            'charset' => 'utf8'
        )
    );

    $sql = "SELECT * FROM tb_content WHERE ";

    $field = [
        'bookid',
        'chapterno',
        'verseno'
    ];

    $qry = '';

    $c = 0;

    foreach( $req as $r ){
        $sql .= ($field[$c]." = '".$r."'") . (($c < count($req) -1 ) ? ' AND ' : ';');
        $c++;
    };

    $content = $db->rawQuery($sql);
    
    if($content){
        echo json_encode($content);
    }
    