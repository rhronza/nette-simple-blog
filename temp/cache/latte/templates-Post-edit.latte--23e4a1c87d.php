<?php
// source: C:\Users\Roman Hronza\OneDrive\Php\htdocs\nette-blog\app\presenters/templates/Post/edit.latte

use Latte\Runtime as LR;

class Template23e4a1c87d extends Latte\Runtime\Template
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
<div style="margin-top: 120px"></div>
<table class="vycentrujTabulku" style="background: #99f999; padding: 30px; border-radius: 12px">
    <tr>
        <td>
            <h1 style="margin-top: 0px">Úprava příspěvku</h1>
<?php
		/* line 7 */ $_tmp = $this->global->uiControl->getComponent("prispevky999");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
?>
        </td>
    </tr>
</table>
<?php
	}

}
