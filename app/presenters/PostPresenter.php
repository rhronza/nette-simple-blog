<?php
 namespace App\Presenters;
 
 use Nette;
 use Nette\Application\UI\Form;

/** * Description of PostPresenter
 *
 * @author Roman Hronza
 */
class PostPresenter extends BasePresenter
 {
    private $databazeSimpleNetteBlog;
    
    public function __construct(Nette\Database\Context $databaze11) {
	/*echo ("<script type='text/javascript'> alert ('Konstruktor PostPresenter');</script>");*/
        $this->databazeSimpleNetteBlog = $databaze11;
    }
    
    function renderShow($paramID) {
        $radekTabulkyKomentare=$this->databazeSimpleNetteBlog->table('blogposts')->get($paramID);
        if (!$radekTabulkyKomentare){
            $this->error("Stránka nebyla nalezena");
        } else {
            $this->template->post33=$radekTabulkyKomentare;
            $this->template->blogcomments = $radekTabulkyKomentare->related('blogcomments')->order('created_at');
        }
    }
    
    function renderCreate() {
        /* funkcionalita přidání příspěvku: prázdná protože se do šablony nic nerendruje */
    }
    
    function actionCreate() {
        if (!$this->getUser()->isLoggedIn()) $this->redirect('Sign:in');
    }
    /* formulář přidání KOMENATRE*/
    protected function createComponentKomponentovyFormular() {
        $formular = new Form();
        $formular   ->addText('name','Jméno:') 
                    ->setRequired();
        $formular   ->addEmail('email','Email:')->setAttribute('size', 50);
        $formular   ->addTextArea('content','Komentář')->setAttribute('cols', 100)->setAttribute('rows', 7)
                    /*->addRule(Form::MAX_LENGTH,'Maximální délka komentáře je %d znaků',200)*/
                    ->setRequired();
        $formular   ->addSubmit('submit','Publikovat komentář')->setAttribute('style', 'padding: 20px; border-radius: 7px');
        $formular   ->onSuccess[] = [$this,'komponentovyFormularSucceeded'];
        return $formular;
    }
    /* call back*/
    public function komponentovyFormularSucceeded($formular, $hodnoty) {
        // získá hodnotu která je uložena ve vstupním parametru 
        // $paramID metody renderShow:
        $postId = $this->getParameter('paramID'); 
        $this->databazeSimpleNetteBlog->table('blogcomments')->insert(
                [
                'post_id'=> $postId,
                'name'=> $hodnoty->name,
                'email' => $hodnoty->email,
                'content'=> $hodnoty->content
                ] 
        ) ;
        /*$this->flashMessage('Děkujeme za komentář k příspěvku', 'success');*/
        $this->redirect('this');
    }
    
    /* formulář přidání a úpravy příspěvku */
    protected function createComponentPrispevky999() {
        if (!$this->getUser()->isLoggedIn()) {
        $this->error('Pro vytvoření, nebo editování příspěvku se musíte přihlásit.');}
        $formular = new Form();
        $formular->addText('title','Titulek příspěvku:')->setRequired()->setAttribute('size', 99)->setAttribute('style', 'margin-bottom: 10px');
        $formular->addTextArea('content','Obsah příspěvku:')->setAttribute('cols', 100)->setAttribute('rows', 10)
                /*->addRule(Form::MAX_LENGTH,'max počet znaků je: %d',200)*/
                ->setRequired(FALSE);
        
        $formular->addSubmit('tlacitko', 'Publikovat příspěvek')->setAttribute('style', ' border-radius: 7px; padding:10px; margin-top:10px');
        $formular->onSuccess[]=[$this, 'prispevkyObslouzit'];
          
        return $formular;
    }
    /* call back */
    public function prispevkyObslouzit ($formular, $hodnoty) {
        /* toto je pro jistotu a slouží hlavně pro vyšší bezpečnost !*/
        if (!$this->getUser()->isLoggedIn()) {
        $this->error('Pro vytvoření, nebo editování příspěvku se musíte přihlásit.');}
        else {
            //vrátí parametr funkce ze které je formulář volán: actionEdit (dostanu 
            //primární klíč) nebo renderShow(dostanu NULL):
            $posts77Id=$this->getParameter('postId111');
            //var_dump($posts77Id); die;
            if ($posts77Id) {
                // UPDATOVAT:
                $post = $this->databazeSimpleNetteBlog->table('blogposts')->get($posts77Id);
                $post->update($hodnoty);

            } else {
                // PŘIDAT:
                $post = $this->databazeSimpleNetteBlog->table('blogposts')->insert($hodnoty);
            }
            /*$this->flashMessage('Příspěvek byl úspěšně publikován.', 'success');*/
        }
        $this->redirect('show', $post->id);
    }
     
     public function actionEdit($postId111)
    {
        /*echo ("<script type='text/javascript'> alert ('actionEdit()');</script>");*/
	if (!$this->getUser()->isLoggedIn()) {$this->redirect('Sign:in');}
         // načtení řádku (kromě jiného)
        $post = $this->databazeSimpleNetteBlog->table('blogposts')->get($postId111);
        
        //var_dump($post); die;
        // jestliže řádek neexistuje:
        if (!$post) {
            $this->error('Příspěvek nebyl nalezen');
        }
        // nastav hodnoty řádku tabulky do Fomruláře 'prispevky'
        $this['prispevky999']->setDefaults($post->toArray());
    }
} // konec třídy

