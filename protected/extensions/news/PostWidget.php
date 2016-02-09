<?php 
class PostWidget extends CWidget {
	
	public $facebook_post_id;
	public $class="";
	public $message="";
	public $name="";
	public $caption="";
	public $description="";
	public $picture="";
	public $link="";
	public $created_time="";
	public $interaction;
	public $likeLink=false;
	
	public function init()
    {
    	parent::init();		
		$html= '<div class="post-container '.$this->class.'">';
			$html.= '<div class="post-message-container">';
				$html.= '<h3>'.$this->message.'</h3>';
			$html.='</div>';
			$html.='<div class="post-shared-container">';
				$html.='<div class="post-image-container">';
					$html.='<img class="post-img" src="'.$this->picture.'">';
				$html.='</div>';
				$html.='<div class="post-text-container">';
					$html.=$this->name.'<br/>';
					$html.=$this->caption.'<br/>';
					$html.=$this->description.'<br/>';
					$html.=$this->created_time.'<br/>';
				$html.='</div>';
				if($this->likeLink!=""){
					$html.='<div class="post-like-link">';
					$html.=CHtml::ajaxLink(Yii::t('iseeci','like',1),Yii::app()->controller->createUrl('//news/likePost',array('facebook_post_id'=>$this->facebook_post_id)),array('success'=>'js: function(data){alert(data);}'));
					$html.='</div>';
				}
				$html.='<div class="clear"></div>';
			$html.='</div>';
		$html.='</div>';
		if($this->link!="")
			$html=CHtml::link($html,$this->link,array('target'=>'_blank','style'=>'text-decoration:none;'));
		echo $html;
    }
}
?>