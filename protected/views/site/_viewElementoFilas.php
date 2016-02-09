<?php
echo '<div class="row-fluid">';
$html='<div class="elemento-container">';
$html.= '<h3 >'.$data->tituloT.'</h3>';
$html.='<div  style="width:100%;" class="elemento-shared-container">';
if($data->subtituloT!=""){
	$html.='<div  style="width:100%;" class="elemento-name-container">';
	$html.= '<h4>'.$data->subtituloT.'</h4>';
	$html.='</div>';
}	
if($data->descripcionT!=""){
	$html.='<div class="elemento-caption-container">';
	$html.= '<p>'.$data->descripcionT.'</p>';
	$html.='</div>';
}	
$html.='</div>';
$html.='<div class="clear"></div>';
$html.= '</div>';
if($data->con_link)
	$html=CHtml::link($html,$this->createUrl('/site/r/',array('p'=>$data->codigo)));
echo $html;
echo '</div>';
?>