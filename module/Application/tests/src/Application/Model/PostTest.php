<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Model;

use Core\Test\ModelTestCase;
use Application\Model\Post;
use Zend\InputFilter\InputFilterInterface;

/**
 * @group Model
 */

class PostTest extends ModelTestCase{
    public function testGetInputFilter()
    {
        $post = new Post();
        $if = $post->getInputFilter();
        //testa se existem filtros
        $this->assertInstanceOf("Zend\InputFilter",$if);
        return $if;
    }
    /**
     * @depends testGetInputFilter
     */
    public function testInputFilterValid($if){
        //testa os filtros
        $this->assertEquals(4,$if->count());
        
        $this->assertTrue($if->has('id'));
        $this->assertTrue($if->has('title'));
        $this->assertTrue($if->has('description'));
        $this->assertTrue($if->has('post_date'));
    }
    /**
     * @expctedException Core\Model\EntityException
     */
    public function testInputFilterinvalido(){
        //testa se os filtros estão funcionando
        $post = new Post();
        //title só pode ter 100 caracteres
        $post->title = 'Lorem Ipsum e simplesmente uma simulacao de texto da industria tipografica e de impressos. Lorem Ipsum é simplesmente uma simulacao de texto da industria tipografica e de impressos';
    }
}