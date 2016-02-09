<?php

/**
 * This is the model class for table "{{cotizacion}}".
 *
 * The followings are the available columns in table '{{cotizacion}}':
 * @property integer $id
 * @property string $codigo
 * @property integer $cotizacion_anterior_id
 * @property integer $estado_cotizacion_id
 * @property string $fecha_hora
 * @property string $plazo
 * @property integer $cliente_id
 * @property string $contenido
 * @property integer $contacto_id
 * @property string $requerimiento
 * @property string $vigencia
 * @property integer $linea_negocio_id
 * @property double $valor_total
 *
 * The followings are the available model relations:
 * @property LineaNegocio $lineaNegocio
 * @property Cotizacion $cotizacionAnterior
 * @property Cotizacion[] $cotizacions
 * @property EstadoCotizacion $estadoCotizacion
 * @property Users $cliente
 * @property Contacto $contacto
 * @property Proyecto[] $proyectos
 */
class Cotizacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cotizacion the static model class
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
		return '{{cotizacion}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigo, estado_cotizacion_id, fecha_hora, plazo, cliente_id, contenido, requerimiento, vigencia, linea_negocio_id, valor_total', 'required'),
			array('cotizacion_anterior_id, estado_cotizacion_id, cliente_id, contacto_id, linea_negocio_id', 'numerical', 'integerOnly'=>true),
			array('valor_total', 'numerical'),
			array('codigo', 'length', 'max'=>30),
			array('plazo vigencia', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, codigo, cotizacion_anterior_id, estado_cotizacion_id, fecha_hora, plazo, cliente_id, contenido, contacto_id, requerimiento, vigencia, linea_negocio_id, valor_total', 'safe', 'on'=>'search'),
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
			'lineaNegocio' => array(self::BELONGS_TO, 'LineaNegocio', 'linea_negocio_id'),
			'cotizacionAnterior' => array(self::BELONGS_TO, 'Cotizacion', 'cotizacion_anterior_id'),
			'cotizacionSiguiente' => array(self::HAS_ONE, 'Cotizacion', 'cotizacion_anterior_id'),
			'estadoCotizacion' => array(self::BELONGS_TO, 'EstadoCotizacion', 'estado_cotizacion_id'),
			'cliente' => array(self::BELONGS_TO, 'Users', 'cliente_id'),
			'contacto' => array(self::BELONGS_TO, 'Contacto', 'contacto_id'),
			'proyecto' => array(self::HAS_ONE, 'Proyecto', 'cotizacion_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'codigo'=>Yii::t('iseeci','code',1),
			'cotizacion_anterior_id' => Yii::t('iseeci','lastQuote',1),
			'estado_cotizacion_id' => Yii::t('iseeci','quoteStatus',1),
			'fecha_hora' => Yii::t('iseeci','dateTime',1),
			'plazo' => Yii::t('iseeci','term',1),
			'cliente_id' => Yii::t('iseeci','client',1),
			'contenido' => Yii::t('iseeci','content',1),
			'contacto_id' => Yii::t('iseeci','contact',1),
			'requerimiento' => Yii::t('iseeci','requirement',1),
			'vigencia' => Yii::t('iseeci','validity',1),'Vigencia',
			'linea_negocio_id' => Yii::t('iseeci','lineOfBusiness',1),
			'valor_total' => Yii::t('iseeci','totalValue',1),
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
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('cotizacion_anterior_id',$this->cotizacion_anterior_id);
		$criteria->compare('estado_cotizacion_id',$this->estado_cotizacion_id);
		$criteria->compare('fecha_hora',$this->fecha_hora,true);
		$criteria->compare('plazo',$this->plazo,true);
		$criteria->compare('cliente_id',$this->cliente_id);
		$criteria->compare('contenido',$this->contenido,true);
		$criteria->compare('contacto_id',$this->contacto_id);
		$criteria->compare('requerimiento',$this->requerimiento,true);
		$criteria->compare('vigencia',$this->vigencia,true);
		$criteria->compare('linea_negocio_id',$this->linea_negocio_id);
		$criteria->compare('valor_total',$this->valor_total);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}