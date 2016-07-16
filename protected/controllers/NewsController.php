<?php
class NewsController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'actualizarPostsDb', 'printPosts', 'printNews', 'likePost'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('like','share'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','create','publish'),
				'users'=>UserModule::getAdmins(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	

	/**
	 * This is the 'index' action to render the 'News' page
	 */
	public function actionIndex($pars=array())
	{
		$this->pageTitle= Yii::app()->name;
		//Create a Post model
		$post=new Post;
		//Currently just for iSeeCI FB App
		$post->page_id = Yii::app()->params['fbPageId'];
		//Get token and user if available
		$fb=Yii::app()->facebook;
		$token_user=$fb->getAccessToken();
		$fbUser=$fb->getUser();
		//$this->breadcrumbs=array(Yii::t('app','news',1));
		if(empty($fbUser)){
			$permissions='manage_pages, publish_stream';
			$returnUrl=$this->createUrl('news');
			$loginUrl=Yii::app()->facebook->getLoginUrl(array('scope'=>$permissions,'redirect-uri'=>$returnUrl));
		}
		else{
			$query='select page_id, name from page where page_id = '.Yii::app()->params['fbPageId'];
			$page=$fb->api(array('method'=>'fql.query','query'=>$query));
		}
		$pars=array('post'=>$post);
		if(isset($page))
			$pars['page']=$page;
		if(isset($loginUrl))
			$pars['loginUrl']=$loginUrl;

		$cs=Yii::app()->clientScript;/**/
		$cs->registerScript('put-posts',CHtml::ajax(array(
				'type'=>'GET',
				'url'=>$this->createUrl('/news/printPosts'),
				'success'=>'js:function(html){
								if(html!=""){
									$("#posts-container").html(html);
								}
							}',
					))
				);/**/
		$cs->registerScript('put-news',CHtml::ajax(array(
				'type'=>'GET',
				'url'=>$this->createUrl('/news/printNews'),
				'success'=>'js:function(html){
								if(html!=""){
									$("#news-container").html(html);
								}
							}',
					))
				);
		$cs->registerScript('update-posts',CHtml::ajax(array(
				'type'=>'GET',
				'url'=>$this->createUrl('/news/actualizarPostsDb'),
				'success'=>'js:function(html){
								if(html!=""){
									$("#posts-container").html(html);
								}
							}',
					))
				);
		$this->render('application.views.news.news',$pars);
	}

	/**
	 * This is the 'publish' action to publish a post
	 */
	public function actionPublish()
	{
		//Create a Post model
		$post=new Post;
		//Currently just for iSeeCI FB App
		$post->page_id = Yii::app()->params['fbPageId'];
		//Get token and user if available
		$fb=Yii::app()->facebook;
		$fb->setAccessToken(null);
		$token_user=$fb->getAccessToken();
		$fbUser=$fb->getUser();
		if($fbUser){
			//If a user is available then
			//publish the post in iseeci.com and facebook.com/iSeeCI
			if(isset($_POST['Post']) && $_POST['Post']['message']!=''){
				try{
					$post->attributes=$_POST['Post'];
					$msg=array(
							   	'link'=>$post->link,
								'message'=>$post->message,
								'name'=>$post->name,
							   	'caption'=>$post->caption,
							   	'description'=>$post->description,
							   	'picture'=>$post->picture,
							);
					$url='/'.$post->page_id.'/feed';
					try{$userdata=$fb->api('/me/accounts');}
					catch(Exception $ex){}
					if(count($userdata)>0){
						foreach($userdata['data'] as $account){
							if($account['id']==Yii::app()->params['fbPageId']){
								$token_page=$account['access_token'];
							}
						}
					}
					$fb->setAccessToken($token_page);
					$postedFB=$fb->api($url, 'POST', $msg);
					$fb->setAccessToken($token_user);
					$saved=$post->save();
				}
				catch(FacebookApiException $error){
					echo $error->getMessage();
				}
			}
		}
		$pars=array('post'=>$post,'page'=>$page,'posts'=>$posts);
		if(isset($postedFB))
			$pars['postedFB']=$postedFB;
		if(isset($saved))
			$pars['saved']=$saved;
		$this->redirect('index',$pars);
	}

	public function actionActualizarPostsDb(){
		$fb=Yii::app()->facebook;
		$fb->setAccessToken(null);
		$token_user=$fb->getAccessToken();
		try{
			$fbPosts=$fb->api('/'.Yii::app()->params['fbPageId'].'/posts',array('limit'=>50));
		}
		catch(Exception $e){
				var_dump($e);
		}
		//Agrupa los id's recuperados de facebook
		$inCondition=array();
		foreach($fbPosts['data'] as $fbPost)
		{
			$inCondition[]=$fbPost['id'];
		}
		//Revisa si están en la DB
		$criteria=new CDbCriteria;
		$criteria->select='facebook_post_id';
		$criteria->addInCondition('facebook_post_id',$inCondition);
		$allDbPosts=Post::model()->findAll($criteria);
		$allDbPosts=CHtml::listData($allDbPosts,'facebook_post_id','facebook_post_id');
		//Los nuevos los guarda en $newFbPosts
		$newFbPosts=array_diff($inCondition,$allDbPosts);
		//Y los empieza a guardar
		$update=false;
		foreach($fbPosts['data'] as $fbPost)
		{
			if(in_array($fbPost['id'],$newFbPosts)){
				$update=true;
				$newPost=new Post;
				$newPost->setAttributes(array(
											  'facebook_post_id'=>$fbPost['id'],
											  'page_id'=>Yii::app()->params['fbPageId'],
											  'type'=>isset($fbPost['type'])?$fbPost['type']:null,
											  'message'=>isset($fbPost['message'])?$fbPost['message']:null,
											  'name'=>isset($fbPost['name'])?$fbPost['name']:null,
											  'caption'=>isset($fbPost['caption'])?$fbPost['caption']:null,
											  'description'=>isset($fbPost['description'])?$fbPost['description']:null,
											  'link'=>isset($fbPost['link'])?$fbPost['link']:null,
											  'picture'=>isset($fbPost['picture'])?$fbPost['picture']:null,
											  'created_time'=>isset($fbPost['created_time'])?current(explode("T", $fbPost['created_time'])):null
											  )
									   );
				$newPost->save();	
                
                echo '<pre>'; var_dump($newPost->errors);
			}
		}
		if(isset($_POST['ajax']) || Yii::app()->request->isAjaxRequest){
			if($update==true){
				$criteria=new CDbCriteria;
				$criteria->condition='type="link"';
				$criteria->order='created_time DESC';
				$criteria->limit=Yii::app()->params['numFbPosts'];
				
				$dataProvider=new CActiveDataProvider('Post',array('criteria'=>$criteria));
				$pars['dataProvider']=$dataProvider;
				
				$this->renderPartial('postRender',array('dataProvider'=>$dataProvider),true,false);
			}
		}
	}

	public function actionPrintPosts(){
		$criteria=new CDbCriteria;
		$criteria->compare('type',"link");
		$criteria->order='created_time DESC';
		$criteria->limit=Yii::app()->params['numFbPosts'];
		
		$dataProvider=new CActiveDataProvider('Post',array('criteria'=>$criteria));

		$this->renderPartial('postRender',array('dataProvider'=>$dataProvider),false,true);
	}

	public function actionPrintNews(){
		//Fetch RSS news
		require_once(dirname(__FILE__).'/../extensions/magpie/rss_fetch.inc');
		$num=13;
		$urlGoogle='http://news.google.com/?output=rss&topic=t&num='.$num.'&ned='.(Yii::app()->language=='es'?'es_co':Yii::app()->language);
		$urlGoogleMin='http://news.google.com/?topic=t&ned='.(Yii::app()->language=='es'?'es_co':Yii::app()->language);
		$feed=fetch_rss($urlGoogle);
		$news=$feed->items;
		$published=array();
		foreach($news as $new){
			$str='';
			if(!in_array($new['title'],$published)){
				//var_dump($new);
				$str.= '<div class="elemento-container">';
				$str.= '<p style="margin:0;">';
				$str.=  CHtml::link($new['title'],$new['link'],array('target'=>'_blank'));
				$str.=  '<br/>'.date('M d, H:i',strtotime($new['pubdate'])).'<small style="float:right;">'.CHtml::link(Yii::t('app','googleNews'),$urlGoogleMin,array('target'=>'_blank')).'</small>';
				$str.=  '<div class="clear"></div></p>';
				$str.=  '</div>';
				echo utf8_encode ($str);
				$published[]=$new['title'];
			}
		}
	}

	public function actionLikePost($facebook_post_id){
		$fb=Yii::app()->facebook;
		$fb->setAccessToken(null);
		$token_user=$fb->getAccessToken();
		$fbUser=$fb->getUser();
		if(isset($fbUser)){
			$url='/'.$facebook_post_id.'/likes';
			try{
				$postedFB=$fb->api($url, 'POST');
			}
			catch(Exception $e){
				var_dump($e);
				return;
			}
			var_dump($postedFB); return;
		}
		echo "Unexpected error";
	}
}