<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo Yii::app()->language; ?>" />
	<meta name="keywords" content="<?php echo $this->keywords; ?>" />
	<meta name="description" content="<?php echo $this->description; ?>"/>
	<meta name="robots" content="<?php echo $this->robots; ?>"/>
	<link rel="canonical" href="<?php echo $this->canonical; ?>"/>
	<link rel="author" href="<?php echo $this->author; ?>">
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<?php Yii::app()->bootstrap->register(); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/iseeci.css" />
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/site/favicon.png" type="image/png" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<?php include_once("ga/ga.php"); ?>
<?php
	$menuModels=Elemento::model()->with(array('tipoElemento'=>array('condition'=>'tipoElemento.titulo="Menu" and activo=1')))->findAll(array('order'=>'posicion'));
	$menuItems=array();
	foreach($menuModels as $menuModel){
		$submenuItems=array();
		if(count($menuModel->children)>0){
			foreach($menuModel->children as $child){
				$submenuItems[]=array(
				'label'=>$child->tituloT,
				'url'=>$this->createUrl('/site/r',array('p'=>$child->codigo)),
				'active'=>($child->codigo==$this->activeSubMenu));
			}
			$menuItems[]=array(
				'label'=>$menuModel->tituloT,
				'items'=>$submenuItems,
				'active'=>($menuModel->codigo==$this->activeMenu));
		} else {
			$menuItems[]=array(
				'label'=>$menuModel->tituloT,
				'url'=>$menuModel->link!=''?$this->createUrl($menuModel->link):$this->createUrl('/site/r',array('p'=>$menuModel->codigo)),
				'active'=>($menuModel->codigo==$this->activeMenu));
		}
	}
	$this->widget('bootstrap.widgets.TbNavbar', array(
					'collapse'=>true,
				    'brandLabel' => Yii::app()->name.' (alpha)',
				    'display' => null, // default is static to top
				    'items' => array(
			        array(
			            'class' => 'bootstrap.widgets.TbNav',
			            'items' => $menuItems
			        ),
			        array(
			            'class' => 'bootstrap.widgets.TbNav',
			            'htmlOptions'=>array('id'=>'banderas','style'=>'float:right;'),
			            'items' => array(  
			                		  $this->widget('ext.bandera.BanderaWidget',array(),true)                      
					            )
			            
			        ),
			    ),
				)); ?>
		<?php /*if(isset($this->breadcrumbs) && count($this->breadcrumbs)>0){
			 $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
				'homeLink' => CHtml::link(Yii::t('app','home'), Yii::app()->homeUrl),
			));
			}
			else{
				echo '<div class="breadcrumbs">'.Yii::t('app','home').'</div>';
				}*/
			?>
			<!-- breadcrumbs -->
	<div class="container" id="page">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
			'homeLabel'=>'iSeeCI',
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
		<?php echo $content; ?>
	<div class="clear"></div>
	</div>
	
	<div id="footer">
		Copyright &copy; 2012 - <?php echo date('Y'); ?><br> iSee Corporate Intelligence
	</div><!-- footer -->
</div><!-- subpage -->
</div><!-- page -->

</body>
</html>

