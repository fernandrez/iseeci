<?php

/**
 * This is the model class for table "{{post}}".
 *
 * The followings are the available columns in table '{{post}}':
 * @property integer $id
 * @property string facebook_post_id
 * @property string $page_id
 * @property string $type
 * @property string $message
 * @property string $name
 * @property string $caption
 * @property string $description
 * @property string $link
 * @property string $picture
 * @property string $created_time
 */
class Post extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{post}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('page_id, facebook_post_id, type, message, name, caption, description, link, picture, created_time', 'safe'),
			array('page_id, type, created_time', 'length', 'max'=>250),
			array('facebook_post_id', 'length', 'max'=>511),
			array('message, name, caption, description, link, picture', 'length', 'max'=>2000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, facebook_post_id, page_id, type, message, name, caption, description, link, picture, created_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'page_id'=>Yii::t('iseeci','page',1),
			'message' => Yii::t('iseeci','message',1),
			'name' => Yii::t('iseeci','name',1),
			'caption' => Yii::t('iseeci','caption',1),
			'description' => Yii::t('iseeci','description',1),
			'link' => Yii::t('iseeci','link',1),
			'picture' => Yii::t('iseeci','picture',1),
			'created_time' => Yii::t('iseeci','created_time',1),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('page_id',$this->page_id,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('caption',$this->caption,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('picture',$this->picture,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}