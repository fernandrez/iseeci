<?php 
class ElementoWidget extends CWidget {
	
	public $id = 'id';	
	public $class = 'class';
	public $name = 'elemento';	
	public $titulo = 'titulo';
	public $dirImagen = '';
	public $subtitulo = 'subtitulo';
	public $descripcion = 'descripcion';
	public $ancho;
	public $alto = 180;
	public $link = '';
	public $padding = 10;
	public $last = false;
	
	public function init()
    {
    	parent::init();
		$html= '<div style="margin: 0 auto; padding:'.$this->padding.'px;'.(isset($this->ancho)?'width:'.($this->ancho).'px;':'').'height:'.($this->alto).'px;" class="'.$this->class.'" id="elemento-frame-'.$this->id.'">';
			$html.= '<div style="padding:'.$this->padding.'px;" id="elemento-inner-frame">';
		        $html.= '<img src="'.Yii::app()->baseUrl.'/'.$this->dirImagen.'" alt="ImagenElemento" width=200px height=150px/ style="float:left;display:inline;">';
		        $html.= '<div style="float:left;'.((!$this->last)?'border-bottom:solid 1px #3D5E8F;':'').'">';
					if($this->link!="") 
			        	$html.= CHtml::link('<h1>'.$this->titulo.'</h1>',$this->link);
					else
						$html.= '<h1>'.$this->titulo.'</h1>';
					$html.= '<h3>'.$this->subtitulo.'</h3>';
					$html.= '<h4 style="width:600px;">'.$this->descripcion.'</h4>';
		echo $html;
    }
 
    public function run()
    {
	    		$html='</div>';
				$html.='<div class="clear"></div>';
	    	$html.='</div>';
			$html.='<div class="clear"></div>';
		$html.='</div>';
		echo $html;
    }
}
?>