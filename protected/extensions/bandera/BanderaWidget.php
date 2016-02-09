<?php 
class BanderaWidget extends CWidget {
	
	public $size=32;
	
	public function init()
    {
    	//echo TranslateModule::translator()->dropdown();
    	/**/
    	echo CHtml::form('', 'post', array('id'=>'language-form','style'=>'margin:0;'));
		echo CHtml::hiddenField('language');
		echo CHtml::endForm();/**/
		$languages=getLanguages();
    	//echo CHtml::openTag('div',array('id'=>'banderas'));
    	$lastElement = end($languages);
    	$lastElement = end($languages);
        foreach($languages as $key=>$lang) {
                     echo CHtml::openTag('li',array('data-value'=>$lang,'class'=>Yii::app()->language==$lang?'active':'','style'=>'float:right;')).
					 CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/flags_iso/'.$this->size.'/'.$lang.'.png',strtoupper($lang).' - '.Yii::app()->name,array('height'=>$this->size,'width'=>$this->size)),$this->getOwner()->createMultilanguageReturnUrl($lang)).
                     CHtml::closeTag('li');
        }
		echo CHtml::tag('div',array('class'=>'clear'));
		//echo CHtml::closeTag('div');
    }
}
?>