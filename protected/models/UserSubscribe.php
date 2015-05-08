<?php

/**
 * This is the model class for table "wx_user_subscribe".
 *
 * The followings are the available columns in table 'wx_user_subscribe':
 * @property string $id
 * @property string $userid
 * @property string $openid
 * @property string $gameid
 * @property string $subscribe_time
 * @property string $unsubscribe_time
 * @property string $recv_time
 * @property string $resp_time
 * @property string $nid
 * @property string $created
 */
class UserSubscribe extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return UserSubscribe the static model class
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
        return 'wx_user_subscribe';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('userid, nid, created', 'length', 'max'=>10),
            array('openid', 'length', 'max'=>32),
            array('gameid', 'length', 'max'=>15),
            array('subscribe_time, unsubscribe_time, recv_time, resp_time', 'length', 'max'=>11),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, userid, openid, gameid, subscribe_time, unsubscribe_time, recv_time, resp_time, nid, created', 'safe', 'on'=>'search'),
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
            'userid' => 'Userid',
            'openid' => 'Openid',
            'gameid' => 'Gameid',
            'subscribe_time' => 'Subscribe Time',
            'unsubscribe_time' => 'Unsubscribe Time',
            'recv_time' => 'Recv Time',
            'resp_time' => 'Resp Time',
            'nid' => 'Nid',
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

        $criteria->compare('id',$this->id,true);
        $criteria->compare('userid',$this->userid,true);
        $criteria->compare('openid',$this->openid,true);
        $criteria->compare('gameid',$this->gameid,true);
        $criteria->compare('subscribe_time',$this->subscribe_time,true);
        $criteria->compare('unsubscribe_time',$this->unsubscribe_time,true);
        $criteria->compare('recv_time',$this->recv_time,true);
        $criteria->compare('resp_time',$this->resp_time,true);
        $criteria->compare('nid',$this->nid,true);
        $criteria->compare('created',$this->created,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}