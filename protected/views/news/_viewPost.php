<?php 
$html='<div class="row-fluid">';
$html.= '<div class="elemento-container '.$data->type.'">';
			$html.= '<div class="row-fluid">';
				$html.= '<div class="elemento-titulo-container pull-left">';
					$html.= '<h3 style="margin-top:0">'.$data->message.'</h3>';
				$html.='</div>';
				$html.='<div class="elemento-date-container pull-right">';
					$html.=$data->created_time.'<br/>';
				$html.='</div>';
			$html.='</div>';
			$html.='<div class="elemento-shared-container">';
				$html.='<div class="elemento-image-container"style="float:left;margin:0 10px 0 0;">';
					$html.='<img class="elemento-img" src="'.$data->picture.'" style="float:left">';
				$html.='</div>';
					$html.='<div class="elemento-name-container">';
						$html.=$data->name;
					$html.='</div>';
					$html.='<div class="elemento-caption-container">';
						$html.=$data->caption;
					$html.='</div>';
					$html.='<div class="elemento-description-container">';
						$html.=$data->description;
					$html.='</div>';
				/*if($data->likeLink!=""){
					$html.='<div class="post-like-link">';
					$html.=CHtml::ajaxLink(Yii::t('iseeci','like',1),Yii::app()->controller->createUrl('//news/likePost',array('facebook_post_id'=>$data->facebook_post_id)),array('success'=>'js: function(data){alert(data);}'));
					$html.='</div>';
				}*/
				$html.='<div class="clear"></div>';
			$html.='</div>';
		$html.='</div>';
$html.='</div>';
		if($data->link!="")
			$html=CHtml::link($html,$data->link,array('target'=>'_blank','style'=>'text-decoration:none;'));
		echo $html;
?>