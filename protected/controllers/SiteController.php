<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	/**/
	public function actionIndex()
	{
		$this->activeMenu='home';
		$this->render('iseeci');
	}/**/
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionNews()
	{
		$this->keywords=Yii::t('iseeci','news, technology, business intelligence colombia, business intelligence medellin');
		$this->description=Yii::t('iseeci','The latest news on technology');
		$this->pageTitle= Yii::t('iseeci','news').' | '.Yii::app()->name;
		$this->activeMenu='news';
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
			$token_user=$fb->getAccessToken();
			$fbUser=$fb->getUser();
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
		if(isset($loginUrl))
			$pars['fbUser']=$fbUser;

		$cs=Yii::app()->clientScript;
		$cs->registerScript('put-posts',CHtml::ajax(array(
				'type'=>'GET',
				'url'=>$this->createUrl('/news/printPosts'),
				'success'=>'js:function(html){
								if(html!=""){
									$("#posts-container").html(html);
								}
							}',
					))
				);
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
		$criteria=new CDbCriteria;
		$criteria->condition='type="link"';
		$criteria->order='created_time DESC';
		//$criteria->limit=Yii::app()->params['numFbPosts'];
		
		$dataProvider=new CActiveDataProvider('Post',array('criteria'=>$criteria));
		$pars['dataProvider']=$dataProvider;
		$this->render('application.views.news.news',$pars);
	}
	
	/**
	 * This is the 'data' action to render the 'Data Models' page
	 */
	public function actionR($p)
	{
		$children=new Elemento('search');
		
		switch ($p) {
			case 'home':	
				$this->redirect(array('index'));
				break;
			case 'contactus':
				$this->redirect(array('contact'));
				break;
			default:
				$p=Elemento::model()->findByAttributes(array('codigo'=>$p));
				$children->parent_id=$p->id;
				$children->activo=1;
				$this->keywords=$p->meta_keywords;
				$this->description=Yii::t('iseeci',$p->meta_description);
				if(isset($p->parent)){
					$this->activeMenu=$p->parent->codigo;
					$this->activeSubMenu=$p->codigo;
				}else{
					$this->activeMenu=$p->codigo;
				}
				$curParent=$p;
				$this->breadcrumbs=array($p->tituloT);
				
				while(isset($curParent->parent)){
					$this->breadcrumbs=array($curParent->parent->tituloT=>array('r','p'=>$curParent->parent->codigo))+$this->breadcrumbs;
					$curParent=$curParent->parent;
				}
				$dataProvider=$children->search();
				$this->render('elementos',array('p'=>$p,'dataProvider'=>$dataProvider));				
				break;
		}
	}

	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$this->keywords=Yii::t('iseeci','contact, email, business intelligence colombia, business intelligence medellin');
		$this->description=Yii::t('iseeci','doubts');
		$model=new Contacto;
		$this->activeMenu='contactus';
		if(isset($_POST['Contacto']))
		{
			$model->attributes=$_POST['Contacto'];
			if($model->validate())
			{
				/**/
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->title).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->message,$headers);
				Yii::app()->user->setFlash('contact',Yii::t('iseeci','thanxContact'));
				$model->save();
				$this->refresh();
			}
		}
		$this->breadcrumbs=array(Yii::t('iseeci','contact'));
		$this->render('contact',array('model'=>$model));
	}
	
	public function actionSetLanguage($language='en',$current="/"){
		Yii::app()->session['language']=$language;
		$this->redirect($current);
	}
}