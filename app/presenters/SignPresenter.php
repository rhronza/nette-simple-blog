<?php

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;

class SignPresenter extends BasePresenter
{
    function renderIn() {
     
         }
   
    protected function createComponentSignInForm()
    {
        $formular = new Form;
        $formular   ->addText('username', 'Přihlašovací jméno:')
                    ->setRequired('Zadejte prosím své uživatelské jméno');
        $formular   ->addPassword('password', 'Přihlašovací heslo:')
                    ->setRequired('Zadejte prosím své uživatelské heslo');
        $formular   ->addSubmit('submit', 'Potvrďte');
        $formular   ->onSuccess[]=[$this,'signInFormSucceeded'];
        return $formular;
    }
    /* call back pro SignInForm */
    function signInFormSucceeded ($formular, $hodnoty) {
        //echo "<script type='text/javascript'>alert('call back');</script> ";
        //echo "call back";
        //die;
        try {
            /* @var $hodnoty type */
            $this->getUser()->login($hodnoty->username , $hodnoty->password);
            $this->redirect('Homepage:');
        } catch (Nette\Security\AuthenticationException $exc) {
            //echo $exc->getTraceAsString();
            $formular->addError('Nesprávné přihlašovací jméno nebo heslo.');
        }
            
    }
    public function actionOut()
    {
        $this->getUser()->logout();
        /*$this->flashMessage('Odhlášení bylo úspěšné.');*/
        $this->redirect('Homepage:');
    }


 
}
