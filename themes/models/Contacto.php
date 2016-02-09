<?php

/**
 * This is the model class for table "contacto".
 *
 * The followings are the available columns in table 'contacto':
 * @property integer $Contacto_Id
 * @property string $Nombre
 * @property string $Correo_Electronico
 * @property string $Titulo
 * @property string $Mensaje
 */
class Contacto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Contacto the static model class
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
		return 'contacto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Nombre, Correo_Electronico, Titulo, Mensaje', 'required'),
			array('Nombre', 'length', 'max'=>30),
			array('Correo_Electronico', 'length', 'max'=>50),
			array('Titulo', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Contacto_Id, Nombre, Correo_Electronico, Titulo, Mensaje', 'safe', 'on'=>'search'),
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
			'Contacto_Id' => 'Contacto',
			'Nombre' => 'Nombre',
			'Correo_Electronico' => 'Correo Electronico',
			'Titulo' => 'Titulo',
			'Mensaje' => 'Mensaje',
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

		$criteria->compare('Contacto_Id',$this->Contacto_Id);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Correo_Electronico',$this->Correo_Electronico,true);
		$criteria->compare('Titulo',$this->Titulo,true);
		$criteria->compare('Mensaje',$this->Mensaje,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}