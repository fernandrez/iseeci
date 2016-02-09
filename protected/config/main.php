<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
require_once( dirname(__FILE__) . '/../components/Helpers.php');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'iSeeCI',
	'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
    ),

	// preloading 'log' component
	'preload'=>array('log','translate'),

	// autoloading model and component classes
	'import'=>array(
        'bootstrap.helpers.*',
        'bootstrap.behaviors.*',
        'bootstrap.helpers.*',
		'application.models.*',
		'application.components.*',
        'application.modules.user.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
		'application.modules.translate.TranslateModule',
	),
	
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/**/
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
            'generatorPaths' => array('application.gii','bootstrap.gii'),
			'password'=>'gii',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		/**/
		'user'=>array(
            # encrypting method (php hash function)
            'hash' => 'md5',
 
            # send activation email
            'sendActivationMail' => true,
 
            # allow access for non-activated users
            'loginNotActiv' => false,
 
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,
 
            # automatically login from registration
            'autoLogin' => true,
 
            # registration path
            'registrationUrl' => array('/user/registration'),
 
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
 
            # login form path
            'loginUrl' => array('/user/login'),
 
            # page after login
            'returnUrl' => array('/user/profile'),
 
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),
		'translate',
        'forum'=>array(),
	),
	//'sourceLanguage'=>'en',
	'language'=>'en',
	// application components
	'components'=>array(
		'facebook'=>array(
	    	'class' => 'ext.facebook.SFacebook',
		    'appId'=>'580111455374730', // needed for JS SDK, Social Plugins and PHP SDK
		    'secret'=>'f24dc20e3c5a9148f7aeb5c9ac0dd9ab', // needed for the PHP SDK
		    //'fileUpload'=>false, // needed to support API POST requests which send files
		    //'trustForwarded'=>false, // trust HTTP_X_FORWARDED_* headers ?
		    //'locale'=>'en_US', // override locale setting (defaults to en_US)
		    //'jsSdk'=>true, // don't include JS SDK
		    //'async'=>true, // load JS SDK asynchronously
		    //'jsCallback'=>false, // declare if you are going to be inserting any JS callbacks to the async JS SDK loader
		    //'status'=>true, // JS SDK - check login status
		    //'cookie'=>true, // JS SDK - enable cookies to allow the server to access the session
		    //'oauth'=>true,  // JS SDK - enable OAuth 2.0
		    //'xfbml'=>true,  // JS SDK - parse XFBML / html5 Social Plugins
		    //'frictionlessRequests'=>true, // JS SDK - enable frictionless requests for request dialogs
		    //'html5'=>true,  // use html5 Social Plugins instead of XFBML
		    //'ogTags'=>array(  // set default OG tags
		        //'title'=>'MY_WEBSITE_NAME',
		        //'description'=>'MY_WEBSITE_DESCRIPTION',
		        //'image'=>'URL_TO_WEBSITE_LOGO',
		    //),
		  ),
		'user'=>array(
			// enable cookie-based authentication
			'class' => 'user.components.WebUser',
		    'allowAutoLogin'=>true,
		    'loginUrl' => array('//user/login'),
		),
		// uncomment the following to enable URLs in path-format
		/**/
		'urlManager'=>array(
			'class'=>'application.components.UrlManager',
			'urlFormat'=>'path',
			'showScriptName'=>false,
			/**/
			'rules'=>array(
            '<language:(en|es|it)>/' => 'site/index',
            '<language:(en|es|it)>/<action:(contact|login|logout)>/*' => 'site/<action>',
            '<language:(en|es|it)>/<controller:\w+>/<id:\d+>'=>'<controller>/view',
            '<language:(en|es|it)>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
            '<language:(en|es|it)>/<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',
			),
			/**/
		),
        'messages'=>array(
            'class'=>'CDbMessageSource',
            'onMissingTranslation' => array('TranslateModule', 'missingTranslation'),
        ),
        'translate'=>array(//if you name your component something else change TranslateModule
            'class'=>'translate.components.MPTranslate',
            //any avaliable options here
            'acceptedLanguages'=>array(
                  'en'=>'English',
                  'es'=>'Español',
                  'it'=>'Italiano'
            ),
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',   
        ),
		/**/
		'cache' => array('class' => 'system.caching.CDummyCache'),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'andres.fernandez@iseeci.com;fernandrez@ymail.com;andres.fernandez@mozido.com',
		'fbPageId'=>'322209721190489',
		'numFbPosts'=>10,
	),
);