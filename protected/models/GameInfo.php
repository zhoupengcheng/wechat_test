<?php

/**
 * This is the model class for table "wx_game_config".
 *
 * The followings are the available columns in table 'wx_game_config':
 * @property string $wx_id
 * @property string $flag
 * @property string $name
 * @property string $app_id
 * @property string $app_secret
 * @property string $domain
 * @property string $reward_tp_id
 * @property string $api_key
 * @property string $created
 */
class GameInfo extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return GameInfo the static model class
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
        return 'wx_game_config';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('api_key', 'required'),
            array('wx_id', 'length', 'max'=>15),
            array('flag', 'length', 'max'=>6),
            array('name, domain, api_key', 'length', 'max'=>20),
            array('app_id', 'length', 'max'=>18),
            array('app_secret', 'length', 'max'=>32),
            array('reward_tp_id', 'length', 'max'=>64),
            array('created', 'length', 'max'=>10),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('wx_id, flag, name, app_id, app_secret, domain, reward_tp_id, api_key, created', 'safe', 'on'=>'search'),
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
            'wx_id' => 'Wx',
            'flag' => 'Flag',
            'name' => 'Name',
            'app_id' => 'App',
            'app_secret' => 'App Secret',
            'domain' => 'Domain',
            'reward_tp_id' => 'Reward Tp',
            'api_key' => 'Api Key',
            'created' => 'Created',
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

        $criteria->compare('wx_id',$this->wx_id,true);
        $criteria->compare('flag',$this->flag,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('app_id',$this->app_id,true);
        $criteria->compare('app_secret',$this->app_secret,true);
        $criteria->compare('domain',$this->domain,true);
        $criteria->compare('reward_tp_id',$this->reward_tp_id,true);
        $criteria->compare('api_key',$this->api_key,true);
        $criteria->compare('created',$this->created,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public function getGameInfoById($id)
    {
        return $this->find('wx_id=:wx_id', array(':wx_id' => $id));
    }
}