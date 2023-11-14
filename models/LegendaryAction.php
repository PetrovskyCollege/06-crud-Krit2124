<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "legendary_action".
 *
 * @property int $id
 * @property string $description Описание легендарного действия существа
 * @property int $id_npc Существо, к которому привязано легендарное действие
 *
 * @property Npc $npc
 */
class LegendaryAction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'legendary_action';
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
