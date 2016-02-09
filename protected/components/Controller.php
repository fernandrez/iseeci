<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout = '//layouts/column1';
	public $keywords = "iSeeCI, business intelligence colombia, data mining, web development, semantic web, artificial intelligence, neural networks, fuzzy logic, medellin, colombia";
	public $description = "Information is the key to the decision-making processes. iSeeCI is the Colombian industry leader in ad-hoc Business Intelligence processes for medium-large sized companies who look to get knowledge out of the datawarehouses using Neuro-Fuzzy Intelligent Systems. Take a good decision with iSeeCI.";
	public $robots = 'index,follow';
	public $canonical = 'http://www.iseeci.com';
	public $author = 'https://plus.google.com/u/0/101099296055547343329/posts';
	
	public $activeMenu="";
	public $activeSubMenu="";
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	function init()
	{
	    // Set the application language if provided by GET, session or cookie
	    if(isset($_GET['language'])) {
	        Yii::app()->language = $_GET['language'];
	        Yii::app()->user->setState('language', $_GET['language']); 
	        $cookie = new CHttpCookie('language', $_GET['language']);
	        $cookie->expire = time() + (60*60*24*365); // (1 year)
	        Yii::app()->request->cookies['language'] = $cookie; 
	    }
		else if(isset($_POST['language'])) {
	        $lang = $_POST['language'];
	        $MultilangReturnUrl = $_POST[$lang];
	        $this->redirect($MultilangReturnUrl);
	    }
	    else if (Yii::app()->user->hasState('language')){
	        Yii::app()->language = Yii::app()->user->getState('language');
	        //$MultilangReturnUrl = Yii::app()->language;
	        //$this->redirect($MultilangReturnUrl);
	    }
	    else if(isset(Yii::app()->request->cookies['language'])){
	        Yii::app()->language = Yii::app()->request->cookies['language']->value;
	        //$MultilangReturnUrl = Yii::app()->language;
	        //$this->redirect($MultilangReturnUrl);
	    }
	}

	public function createMultilanguageReturnUrl($lang='en'){
	    if (count($_GET)>0){
	        $arr = $_GET;
	        $arr['language']= $lang;
	    }
	    else 
	        $arr = array('language'=>$lang);
	    return $this->createUrl('', $arr);
	}
	
	protected function afterRender($view, &$output) {
		  parent::afterRender($view,$output);
		  //Yii::app()->facebook->addJsCallback($js); // use this if you are registering any $js code you want to run asyc
		  Yii::app()->facebook->initJs($output); // this initializes the Facebook JS SDK on all pages
		  Yii::app()->facebook->renderOGMetaTags(); // this renders the OG tags
		  return true;
	}
}