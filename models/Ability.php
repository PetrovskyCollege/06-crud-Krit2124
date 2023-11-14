<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ability".
 *
 * @property int $id
 * @property string $description Описание особенности
 * @property int $id_npc Существо, к которому оно привязано
 *
 * @property Npc $npc
 */
class Ability extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ability';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'id_npc'], 'required'],
            [['description'], 'string'],
            [['id_npc'], 'integer'],
            [['id_npc'], 'exist', 'skipOnError' => true, 'targetClass' => Npc::class, 'targetAttribute' => ['id_npc' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'id_npc' => 'Id Npc',
        ];
    }

    /**
     * Gets query for [[Npc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpc()
    {
        return $this->hasOne(Npc::class, ['id' => 'id_npc']);
    }
}
