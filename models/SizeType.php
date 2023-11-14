<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "size_type".
 *
 * @property int $id
 * @property string $type
 *
 * @property Npc[] $npcs
 */
class SizeType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'size_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 31],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип размера',
        ];
    }

    /**
     * Gets query for [[Npcs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcs()
    {
        return $this->hasMany(Npc::class, ['id_size' => 'id']);
    }
}
