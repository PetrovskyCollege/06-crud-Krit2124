<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subspecies_type".
 *
 * @property int $id
 * @property int $id_species Вид, к которому привязан подвид
 * @property string $type
 *
 * @property Npc[] $npcs
 * @property SpeciesType $species
 */
class SubspeciesType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subspecies_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_species', 'type'], 'required'],
            [['id_species'], 'integer'],
            [['type'], 'string', 'max' => 63],
            [['id_species'], 'exist', 'skipOnError' => true, 'targetClass' => SpeciesType::class, 'targetAttribute' => ['id_species' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_species' => 'Вид',
            'type' => 'Подвид',
        ];
    }

    /**
     * Gets query for [[Npcs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcs()
    {
        return $this->hasMany(Npc::class, ['id_subspecies' => 'id']);
    }

    /**
     * Gets query for [[Species]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpecies()
    {
        return $this->hasOne(SpeciesType::class, ['id' => 'id_species']);
    }
}
