<?php
// source: C:\Users\Roman Hronza\OneDrive\Php\htdocs\nette-blog\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template3f5f767600 extends Latte\Runtime\Template
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
		if (isset($this->params['post'])) trigger_error('Variable $post overwritten in foreach on line 24');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
    <div style="text-align: center; font: 12px Verdana; padding-top: 70px; margin-top: 10px">
<?php
		if ($user->loggedIn) {
			?>        <a style="font-size: 2em; text-decoration:none" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Post:create")) ?>">
	    <font style="color: #006AEB">
		<div class="tooltip">
		    &#10010
		    <span class="tooltiptext">
			Přidat příspěvek
		    </span>
		</div>
		
	    </font>
	</a>
<?php
		}
?>
    </div>
        
    <table class="tabulka" style="margin-top: 10px">
        <th class="bunkaTabulky bunkaNadpisu">Titulek <br> příspěvku</th>    
                <th class="bunkaTabulky bunkaNadpisu">Obsah příspěvku</th>
                <th class="bunkaTabulky bunkaNadpisu" style="width:50px" >Upravit <br>příspěvek</th>
                <th class="bunkaTabulky bunkaNadpisu">Vytvořeno <br>Aktualizováno</th>
                <th class="bunkaTabulky bunkaNadpisu" style="width:20px" >ID</th>
<?php
		$iterations = 0;
		foreach ($posts as $post) {
?>
            <tr class="radekTabulky">
                <td class="bunkaTabulky">
                    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Post:show", [$post->id])) ?>" >
                        <strong>
			    <div class="tooltip">
				<?php echo LR\Filters::escapeHtmlText($post->title) /* line 30 */ ?> 
				<span class="tooltiptext">
				    Zobrazit příspěvky
				</span>
			    </div>
                            
                        </strong> 
                    </a>
		</td>
		<td class="bunkaTabulky" style="text-align: left"><div> <?php echo LR\Filters::escapeHtmlText($post->content) /* line 39 */ ?></div></td>
		
                <td class="bunkaTabulky" style="width:50px">
<?php
			if ($user->loggedIn) {
?>
                        <!-- <a n:href="Post:edit $post->id"> upravit</a> -->
			
                        <a style="text-decoration: none" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Post:edit", [$post->id])) ?>"> 
			    <i style="font-size:36px; text-decoration: none;color:#006AEB" class="fa">
				<div class="tooltip " >
				    &#xf14b;
				    <span class="tooltiptext">
					Upravit příspěvek
				    </span>
				</div>
				
			    </i>
			</a>
<?php
			}
			else {
?>
                        <div>nepřihlášen<br>nepovoleno</div>
<?php
			}
?>
                </td>
                <td class="bunkaTabulky"><div> <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $post->created_at, '%d.%m.%Y'.' ('.'%H:%M:%S'.')' )) /* line 60 */ ?></div></td>
                <td class="bunkaTabulky" style="width:20px"> <?php echo LR\Filters::escapeHtmlText($post->id) /* line 61 */ ?></td>
            </tr>
<?php
			$iterations++;
		}
?>
    </table>
    <br>
<?php
	}

}
