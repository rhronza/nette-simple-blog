<?php

namespace App\Presenters;

use Nette ;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    public function beforeRender()
    {
        if ($this->getUser()->loggedIn) 
        {
            $this->template->uzivatel=  $this->getUser()->getId();
        } else {
            $this->template->uzivatel='';
        }
    }
}
