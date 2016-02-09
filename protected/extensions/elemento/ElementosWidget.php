<?php 
class ElementosWidget extends CWidget {
	
	public $elementos = array();	
	
	public function init()
    {
    }
 
    public function run()
    {
    	$i = 0;
		$len = count($this->elementos);
		if($len>0){
	    	foreach($this->elementos as $elemento){
	    		$last=false;	
	    		if($i+1==$len)
					$last=true;
	    		Yii::app()->controller->widget('ext.elemento.ElementoWidget',array(
	    							'id'=>$elemento->id,
	    							'class'=>$elemento->parent->titulo,
									'titulo'=>$elemento->tituloT,
									'dirImagen'=>$elemento->dir_imagen,
									'subtitulo'=>$elemento->subtituloT,
									'descripcion'=>$elemento->descripcionT,
									'link'=>(($elemento->con_link==1)?Yii::app()->controller->createUrl('/site/r',array('p'=>$elemento->titulo)):""),
									'last'=>$last,
									));
				$i++;
	    	}
			echo '<div class="clear"></div>';
		}
    }
}
?>