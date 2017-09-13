<?php
// source: C:\Users\Roman Hronza\OneDrive\Php\htdocs\nette-simple-blog\app\presenters/templates/Post/show.latte

use Latte\Runtime as LR;

class Template471ff33a65 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
?>

<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['komentar'])) trigger_error('Variable $komentar overwritten in foreach on line 41');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
    <div style ="padding-top:15px; padding-left: 40px;text-align: left; margin-top: 70px"> </div>
    <table style="margin: 0px auto; width: 95%; border-collapse: separate; border-style: solid; padding:0px; border-radius: 5px; border-spacing: 0px" >
        <tr>
	    <td class="prispevek">
<?php
		if ($this->global->ifs[] = ($user->loggedIn)) {
			?>                <a style="text-decoration:none" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("edit", [$post33->id])) ?>">
<?php
		}
?>
                    <strong>
                        <div style="font-size: 1.5em; background-color: #006AEB; color: white">
			    <div class="tooltip">
				<?php echo LR\Filters::escapeHtmlText($post33->title) /* line 10 */ ?>

				<span class="tooltiptext">
				    Upravit příspěvek
				</span>
			    </div>
                            
                        </div> 
                    </strong>
<?php
		if (array_pop($this->global->ifs)) {
?>                </a>
<?php
		}
?>
                <div style="font-size: 0.7em;  background-color: #006AEB; color: white">
                    publikován/upraven:<?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $post33->created_at, '%d.%m.%Y'.' ('.'%H:%M:%S'.')' )) /* line 20 */ ?>

                </div>
	    </td>
	</tr>
        <tr>
	    <td>
                <div style="margin-top: 10px"><?php echo LR\Filters::escapeHtmlText($post33->content) /* line 26 */ ?></div>
                
	    </td>
	</tr>
    </table>    
    <br>

    <table class="tabulka" style="width: 80%; margin-top:-10px">
    <th class="bunkaTabulky bunkaNadpisu">Jméno komentátora</th>
    <th class="bunkaTabulky bunkaNadpisu">Email</th>
    <th class="bunkaTabulky bunkaNadpisu">Obsah komentáře</th>
    <th class="bunkaTabulky bunkaNadpisu">Vytvořen</th>                

<?php
		$iterations = 0;
		foreach ($blogcomments as $komentar) {
?>
            <tr>
                <td class="bunkaTabulky">
<?php
			if ($this->global->ifs[] = ($komentar->email)) {
				?>                    <a href="mailto:<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($komentar->email)) /* line 44 */ ?>">
<?php
			}
			?>                        <div><?php echo LR\Filters::escapeHtmlText($komentar->name) /* line 45 */ ?></div><?php
			if (array_pop($this->global->ifs)) {
				?></a><?php
			}
?>
</td>
                <td class="bunkaTabulky"><div><?php echo LR\Filters::escapeHtmlText($komentar->email) /* line 46 */ ?></div></td>
                <td class="bunkaTabulky" style="text-align: left" ><div><?php echo LR\Filters::escapeHtmlText($komentar->content) /* line 47 */ ?></div></td>
                <td class="bunkaTabulky" style="font-size: 0.7em"><div><?php echo LR\Filters::escapeHtmlText($komentar->created_at) /* line 48 */ ?></div></td>
            </tr>
<?php
			$iterations++;
		}
?>
    </table>

    <table class="vycentrujTabulku">
         <tr><td>
<?php
		if ($user->loggedIn) {
?>
                <h1> Vložte nový komentář </h1>
<?php
			/* line 57 */ $_tmp = $this->global->uiControl->getComponent("komponentovyFormular");
			if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(null, false);
			$_tmp->render();
		}
		else {
?>
                <h1> Uživatel není přihlášen - přidání komentáře není povoleno </h1>
<?php
		}
?>
        </td></tr>
    </table>
<?php
	}

}
