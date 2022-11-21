<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.formvalidator');
class JFormFieldMtextarea extends JFormField{

	protected $type = 'mtextarea';
	protected $rows = 10;
	protected $columns = 100;

	
	public function getInput()
	{
		

		$html = '<textarea  name="' . $this->name . '" id="' . $this->id . '"   class="form-control validate-victory"  aria-describedby="'.$this->id.'-desc">'.$this->value.'</textarea>';
		$html.="<div>Copy and paste the structure below and change url, language, messege and message title as you require:</div>";
		$html.="<div>|index.php?option=com_jshopping&view=user&task=login&Itemid=137&lang=en@en-GB@Your credentials are  wrong!@Error!@|index.php?option=com_jshopping&view=user&task=login&Itemid=137&lang=fr@fr-FR@L'identite n'est pas juste!@Erreur@|</div>";
		return $html;
	}

	public function getLabel() {
		//var_dump($this->_get('rows'));
		//var_dump($this);
		//return $this->getAttribute('label');
		return (string) $this->element['label'];
		
	}
   
}
?>
<script type="text/javascript">
jQuery(document).ready(function(){
document.formvalidator.setHandler('victory', function(value){
		
		regex=/^(\|(\@?([a-zA-Z0-9\?\/\.\-\=&_:])+\@([a-zA-Z\-])+\@([a-zA-Z0-9\?\.\-&\s\'!])+\@([a-zA-Z\?\-\s\'!])+\@\|)+)+$/;
	return regex.test(value);
	
})

});
</script>
