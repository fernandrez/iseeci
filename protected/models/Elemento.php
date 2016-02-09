<?php

/**
 * This is the model class for table "{{elemento}}".
 *
 * The followings are the available columns in table '{{elemento}}':
 * @property integer $id
 * @property integer $tipo_elemento_id
 * @property integer $parent_id
 * @property string $dir_imagen
 * @property string $titulo
 * @property string $subtitulo
 * @property string $descripcion
 * @property integer $posicion
 * @property integer $default
 * @property integer $con_link
 *
 * The followings are the available model relations:
 * @property Elemento $parent
 * @property Elemento[] $elementos
 * @property TipoElemento $tipoElemento
 * @property Menu $menu
 */
class Elemento extends CActiveRecord
{
	public $imagen;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Elemento the static model class
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
		return '{{elemento}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_elemento_id, titulo, subtitulo, posicion, default, con_link, activo', 'required'),
			array('tipo_elemento_id, parent_id, posicion, default, con_link', 'numerical', 'integerOnly'=>true),
			//array('imagen', 'validateImage'),
			array('dir_imagen, descripcion', 'length', 'max'=>500),
			array('titulo', 'length', 'max'=>50),
			array('subtitulo', 'length', 'max'=>100),
			array('link', 'length', 'max'=>250),
			array('codigo', 'unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tipo_elemento_id, parent_id, dir_imagen, titulo, subtitulo, descripcion, posicion, default', 'safe', 'on'=>'search'),
		);
	}
	
	public function validateImage(){
		$tipoElemento=TipoElemento::model()->findByPk($this->tipo_elemento_id);
		if($tipoElemento && $tipoElemento->con_imagen==1){
			if(!isset($this->imagen) && $this->scenario=='insert'){
				$this->addError('imagen','Los elementos de tipo '.$tipoElemento->titulo.' rquieren de una imagen.');
			}
			elseif(isset($this->imagen)){
				$fileValidator= new CFileValidator;
				$fileValidator->types="jpg, png, gif, bmp";
				$fileValidator->attributes=array('imagen');
				$fileValidator->validate($this);
			}
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'parent' => array(self::BELONGS_TO, 'Elemento', 'parent_id'),
			'children' => array(self::HAS_MANY, 'Elemento', 'parent_id'),
			'tipoElemento' => array(self::BELONGS_TO, 'TipoElemento', 'tipo_elemento_id'),
			'menu' => array(self::BELONGS_TO, 'Menu', 'menu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','id',1),
			'tipo_elemento_id' => Yii::t('iseeci','typeElement',1),
			'parent_id' => Yii::t('iseeci','parent',1),
			'dir_imagen' => Yii::t('iseeci','pathImage',1),
			'titulo' => Yii::t('iseeci','title',1),
			'subtitulo' => Yii::t('iseeci','subtitle',1),
			'descripcion' => Yii::t('iseeci','description',1),
			'posicion' => Yii::t('iseeci','position',1),
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
		$criteria->compare('tipo_elemento_id',$this->tipo_elemento_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('dir_imagen',$this->dir_imagen,true);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('subtitulo',$this->subtitulo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('posicion',$this->posicion);
		$criteria->compare('default',$this->default);
		$criteria->compare('activo',$this->activo);
		$criteria->order='posicion';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Retrieves titulo in current language
	 * @return string Titulo
	 */
	 public function getTituloT(){
	 	return Yii::t('iseeci',$this->titulo,1);
	 }
	 
	 public function getWikiTituloT(){
	 	return Yii::t('iseeci',$this->wiki_titulo,1);
	 }
	
	/**
	 * Retrieves subtitulo in current language
	 * @return string Titulo
	 */
	 public function getSubtituloT(){
	 	return Yii::t('iseeci',$this->subtitulo,1);
	 }
	
	/**
	 * Retrieves descripcion in current language
	 * @return string Titulo
	 */
	 public function getDescripcionT(){
	 	return Yii::t('iseeci',$this->descripcion,1);
	 }
}