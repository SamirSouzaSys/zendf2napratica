<?php

use Zend\Db\Sql\Predicate\Predicate;

//SELECT * FROM posts
/*
$sql = new Sql($adapter);
$select = $sql->select()
        ->columns(array('id','title'))
        ->from('posts');

//WHERE e INNER JOIN, como um SELECT posts. id, posts. title, comments. description, comments.name FROM posts INNER JOIN comments ON comments.post_id = post.id WHERE posts.id > 10 order by title:
*/

$sql = new Sql($adapter);
$select = $sql->select();
$select->columns(array('id','title'))
    ->from('posts')
    ->join(
        'comments',
        'comments.post_id = posts.id',
        array('description'),
        $select::JOIN_INNER
    )
    ->order(array('title'));


$where = new Predicate();
$where->greaterThan('id',10);
$select->getRawState($select::WHERE)->addPredicate($where);

//$statement = $sql->prepareStatementForSqlObject($select);
//$result = $statement->execute();
//foreach($result as $r){
//    echo $r['id'], ' - ',$r['title'],'<br>';
//
//}

foreach ($results as $r) {
    echo $r['id'], ' - ', $r['title'], '-', $r['name'], ' - ', $r['description'] . '<br>';
}

//Imprimir consulta gerada
//echo $select->getSqlString();