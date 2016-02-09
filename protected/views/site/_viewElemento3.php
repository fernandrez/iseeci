<?php
echo '<div class="span4">';
$html='<div class="elemento-container">';
//var_dump($data);die;
if($data->con_link)
	$html.=CHtml::link('<div class="pull-left"><h2>'.$data->tituloT.'</h2></div>',$this->createUrl('/site/r/',array('p'=>$data->codigo)));
if($data->wiki_titulo!=''){
	$html.='<div class="pull-left"><p>'.CHtml::link('wiki',$data->wikiTituloT,array('target'=>'blank')).'</p></div>';
}
$html.='<div class="clear"></div>';
$html.='<div  style="width:100%;" class="elemento-shared-container">';
$html.='<div class="elemento-image-container">';
//$html.= '<img src="'.Yii::app()->baseUrl.'/'.$data->dir_imagen.'" alt="ImagenElemento" width=200px height=150px/>';
$html.= '</div>';
$html.='<div  style="width:100%;" class="elemento-name-container">';
$html.= '<h3>'.$data->subtituloT.'</h3>';
$html.='</div>';
$html.='</div>';
$html.='<div class="clear"></div>';
$html.='</div>';
echo $html;
echo '</div>';
?>