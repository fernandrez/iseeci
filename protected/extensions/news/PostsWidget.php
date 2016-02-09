<?php
class PostsWidget extends CWidget{

	public $posts=array();
	public $likeLink=false;
	public $filter="link,video,status";
	
	public function init(){
		Yii::app()->clientScript->registerCssFile(Yii::app()->assetManager->publish(dirname(__FILE__).'/assets/post.css'));
		foreach($this->posts as $_post){
			if(in_array($_post->type,explode(',', $this->filter))){
				echo $this->widget('ext.news.PostWidget',array(
					'facebook_post_id'=>$_post->facebook_post_id,
					'message'=>$_post->message,
					'name'=>$_post->name,
					'caption'=>$_post->caption,
					'description'=>$_post->description,
					'link'=>$_post->link,
					'picture'=>$_post->picture,
					'created_time'=>$_post->created_time,
					'likeLink'=>$this->likeLink,
					),
					true
				);
			}
		}
	}
}
?>