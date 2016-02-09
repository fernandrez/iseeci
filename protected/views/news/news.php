<div class="row-fluid">
<?php
	if(isset($loginUrl) && 
	Yii::app()->user->isAdmin() /*Quitar esta condicion de admin cuando cuadre el tema de likes para usuarios normales*/){
		echo '<p>'.CHtml::link(Yii::t('iseeci','loginFacebook'),$loginUrl).'</p>';
	}
	$likeLink=false;
	if(isset($fbUser)){
		$likeLink=true;
	}
?>
</div>
<div class="row-fluid">
<div class="span9">
<h3><?php echo CHtml::link(Yii::t('app','facebookFeed'),'https://www.facebook.com/iSeeCI/',array('target'=>'_blank')); ?></h3>
<?php
	if(isset($page)){
		if(Yii::app()->user->isAdmin()){
			$this->renderPartial('application.views.news._form',array('post'=>$post));
		}
	}
?>
	<div id="posts-container">
	<?php
		$this->renderPartial('application.views.news.postRender',array('dataProvider'=>$dataProvider),false,true);
	?>
	</div>
</div><?php /**/ ?>
<div class="span3">
	<h3><?php echo CHtml::link(Yii::t('app','googleNews'),'http://news.google.com/?topic=t&ned='.(Yii::app()->language=='es'?'co':Yii::app()->language),array('target'=>'_blank')); ?></h3>
	<div id="news-container">
		<div class="elemento-container" style="text-align:center">
		<?php echo CHtml::image(Yii::app()->baseUrl.'/images/site/ajax-loader.gif','loader',array('class'=>'ajax-loader')); ?>
		</div>
	</div>	
</div>
<?php /**/ ?>
</div>
