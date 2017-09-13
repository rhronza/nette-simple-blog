<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;

/**
 * Description of ArticleManager
 *
 * @author Roman Hronza
 */
class ArticleManager {
    
    private $databaze;
    
    public function __construct( \Nette\Database\Context $databaze) 
    {
        $this->databaze=$databaze;
    }
    
    public function getPublicArticles() 
    {
        $tabulka=$this->databaze
                            ->table('blogposts')
                            ->where('created_at <', new \DateTime())
                            ->order('created_at DESC');
        return $tabulka;
    }
    
    
}
