<?php

use Zend\Db\Sql\Sql;

$adapter = $this->getServiceLocator()->get('DbAdapter');

//SELECT * FROM posts
/*
$sql = new Sql($adapter);
$select = $sql->select()->from('posts');

}

//SELECT * FROM posts WHERE id=10
/*
$sql = new Sql($adapter);
$select = $sql->select()
        ->from('posts')
        ->where(array('id' => 10));

//SELECT * FROM posts WHERE id>10
/*
$sql = new Sql($adapter);
$select = $sql->select()
->columns(array('id','title'))
->from('posts')
->where('id > 10');

*/



$statement = $sql->prepareStatementForSqlObject($select);
$result = $statement->execute();
foreach($result as $r){
    echo $r['id'], ' - ',$r['title'],'<br>';

}