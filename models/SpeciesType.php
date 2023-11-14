<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "species_type".
 *
 * @property int $id
 * @property string $type
 *
 * @property Npc[] $npcs
 * @property SubspeciesType[] $subspeciesTypes
 */
class SpeciesType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'species_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 63],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Вид',
        ];
    }

    /**
     * Gets query for [[Npcs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcs()
    {
        return $this->hasMany(Npc::class, ['id_species' => 'id']);
    }

    /**
     * Gets query for [[SubspeciesTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubspeciesTypes()
    {
        return $this->hasMany(SubspeciesType::class, ['id_species' => 'id']);
    }
}
