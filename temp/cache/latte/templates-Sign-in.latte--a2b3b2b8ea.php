<?php
// source: C:\Users\Roman Hronza\OneDrive\Php\htdocs\nette-blog\app\presenters/templates/Sign/in.latte

use Latte\Runtime as LR;

class Templatea2b3b2b8ea extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'title' => 'blockTitle',
	];

	public $blockTypes = [
		'content' => 'html',
		'title' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div style="margin-top: 170px"></div>
<table class="vycentrujTabulku" style="background: #99f999; padding: 20px; border-radius: 12px" >
    <td>
<?php
		$this->renderBlock('title', get_defined_vars());
		/* line 6 */ $_tmp = $this->global->uiControl->getComponent("signInForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
?>
    </td>
</table>



<?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?>    <h1 style="margin: 0px">Přihlášení do systému</h1>
<?php
	}

}
