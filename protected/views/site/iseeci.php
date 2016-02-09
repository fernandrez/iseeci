<?php
/* @var $this SiteController */

$this->pageTitle= 'iSee Corporate Intelligence | iSeeCI';
?>
<script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "url": "http://www.iseeci.com",
      "logo": "http://www.iseeci.com/images/site/iseeci.png",
      "sameAs" : [
	    "http://www.facebook.com/iseeci",
	    "http://www.twitter.com/iseeci",
	    "http://plus.google.com/+iseeci"
	  ]
    }
</script>
<div id="content">
	<div id="presentacion" style="text-align: center;">
		<h1><?php echo Yii::t('app','Bienvenido a iSee Corporate Intelligence'); ?></h1>
		<h2><?php echo Yii::t('app','Ingeniería del siglo XXI a la medida de tus necesidades'); ?></h2>
		<p></p>
		<div class="row-fluid">
			<div class="span4 center">
				<h3><?php echo CHtml::link(Yii::t('app','Matemáticas'),'https://'.Yii::app()->language.'.wikipedia.org/wiki/'.Yii::t('app','Matemáticas'),array('target'=>'blank')); ?></h3>
			</div>
			<div class="span4 center">
				<h3><?php echo CHtml::link(Yii::t('app','Ingeniería'),'https://'.Yii::app()->language.'.wikipedia.org/wiki/'.Yii::t('app','Ingeniería'),array('target'=>'blank')); ?></h3>
			</div>
			<div class="span4 center">
				<h3><?php echo CHtml::link(Yii::t('app','Administración'),'https://'.Yii::app()->language.'.wikipedia.org/wiki/'.Yii::t('app','Administración'),array('target'=>'blank')); ?></h3>
			</div>
		</div>
		<div class="center">
			<?php echo CHtml::image(Yii::app()->baseUrl.'/images/site/iseeci.png','iSee Corporate Intelligence - iSeeCI Business Intelligence Colombia',array('width'=>'200'));?>
		</div>
		<div style="margin-top:10px;text-align:center;">
			<div class="fb-like" data-href="https://www.facebook.com/iSeeCI" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
		</div>
	</div>
</div>
<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: <?php echo Yii::app()->language; ?></script>
<div class="text-center" style="margin-top:10px;">
<script type="IN/FollowCompany" data-id="2819896" data-counter="top"></script>
</div>
