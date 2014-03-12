<?php

use Zend\Db\Sql\Sql;

$adapter = $this->getServiceLocator()->get('DbAdapter');

//SELECT * FROM posts
$sql = new Sql($adapter);
$select = $sql->select()->from('posts');
$statement = $sql->prepareStatementForSqlObject($select);
$result = $statement->execute();
foreach($result as $r){
    echo $r['id'], ' - ',$r['title'],'<br>';
}