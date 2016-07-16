<?php
$this->widget('bootstrap.widgets.TbListView',array(
								'id'=>'posts-list',
								'ajaxUpdate'=>true,
								'dataProvider'=>$dataProvider,
								'template'=>'{items}{pager}',
								'itemView'=>'application.views.news._viewPost'));
?>