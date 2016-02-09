<?php
$this->widget('bootstrap.widgets.TbListView',array(
								'id'=>'posts-list',
								'ajaxUpdate'=>false,
								'dataProvider'=>$dataProvider,
								'template'=>'{items}{pager}',
								'itemView'=>'application.views.news._viewPost'));
?>