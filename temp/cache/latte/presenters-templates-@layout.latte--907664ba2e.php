<?php
// source: C:\Users\Roman Hronza\OneDrive\Php\htdocs\nette-blog\app\presenters/templates/@layout.latte

use Latte\Runtime as LR;

class Template907664ba2e extends Latte\Runtime\Template
{
	public $blocks = [
		'head' => 'blockHead',
		'scripts' => 'blockScripts',
	];

	public $blockTypes = [
		'head' => 'html',
		'scripts' => 'html',
	];


	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title><?php
		if (isset($this->blockQueue["title"])) {
			$this->renderBlock('title', $this->params, function ($s, $type) {
				$_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($_fi, 'html', $this->filters->filterContent('striphtml', $_fi, $s));
			});
			?> | <?php
		}
?>Nette Sandbox</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 13 */ ?>/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('head', get_defined_vars());
?>
</head>

<body>
    
    <div style="top: 10px; position: fixed; height: 70px;background-color: #333; 
		width: 100%; margin: -10px 0px 0px -5px;  padding: -5px 0px 0px 0px; 
		border-radius: 0px; border-style: none; font: 20px Georgia">
    <font style="color: white">
    
    <ul style="margin: 20px 0px 0px 40px; list-style-type: none">
<?php
		if ($uzivatel<>"") {
			?>            <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:out")) ?>">
		    <font style="color: white">
			<i style="font-size:36px" class="fa">
			    <div class="tooltip">
				&#xf011;
				<span class="tooltiptext">
				    odhlášení uživatele: <?php echo LR\Filters::escapeHtmlText($uzivatel) /* line 39 */ ?>

				</span>
			    </div>
			</i>
		    </font>
		</a>
	    </li>
<?php
		}
		else {
			?>            <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:in")) ?>">
		    <font style="color: white">
			<i style="font-size:36px" class="fa">
			    <div class="tooltip">
				&#xf183;
				<span class="tooltiptext">
				    Přihlášení uživatele
				</span>
			    </div>
			</i>
		    </font>
		</a>
	    </li>
<?php
		}
?>
    </ul>	
<?php
		if ($this->global->uiPresenter->isLinkCurrent("Homepage:default")) {
		}
		else {
?>
	<h3 block="title" style="text-align:right; margin: -35px 40px 0px 0px; padding: 0px">
	    <a  href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>">
		<font style="color: white">
		    <i style="font-size:24px" class="fa">
			<div class="tooltip">
			    &#xf1c0;
			    <span class="tooltiptextVlevo">
				Přechod na seznam příspěvků
			    </span>
			</div>
			
		    </i>
		</font>
	    </a>
	</h3>
<?php
		}
?>
    
    </font>
    </div>
    
  
<?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?>   <div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 91 */ ?></div>
<?php
			$iterations++;
		}
?>

<?php
		$this->renderBlock('content', $this->params, 'html');
?>

<?php
		$this->renderBlock('scripts', get_defined_vars());
?>

</body>
</html>
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 91');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockHead($_args)
	{
		
	}


	function blockScripts($_args)
	{
		extract($_args);
?>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://nette.github.io/resources/js/netteForms.min.js"></script>
	<script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 99 */ ?>/js/main.js"></script>
<?php
	}

}
