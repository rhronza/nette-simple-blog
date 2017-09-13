<?php

namespace App\Presenters;

use Nette;

class HomepagePresenter extends BasePresenter
{
    private $articleManager;
                
    public function __construct(\App\Model\ArticleManager $articleManager) {
        //parent::__construct();
        $this->articleManager= $articleManager;
        
    }
    public function renderDefault(){
        $this->template->posts=$this->articleManager->getPublicArticles();
    }
    
    public function actionKrizovatka(){
	if ($this->getUser()->loggedIn) 
        {
	    $this->redirect("Homepage:default");
        } else {
	    $this->redirect("Sign:in");
        }
    }
    
}

