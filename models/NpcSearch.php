<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Npc;

/**
 * NpcSearch represents the model behind the search form of `app\models\Npc`.
 */
class NpcSearch extends Npc
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'armor_class', 'average_hits', 'hit_dice_amount', 'hit_dice_type', 'hit_dice_modifier', 'skill_bonus', 'strength', 'dexterity', 'constitution', 'intelligence', 'wisdom', 'charisma', 'id_size', 'id_species', 'id_subspecies', 'id_worldview', 'id_created_by'], 'integer'],
            [['name_ru', 'name_eng', 'danger_level'], 'safe'],
            [['is_approved_by_admin', 'is_named'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Npc::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'armor_class' => $this->armor_class,
            'average_hits' => $this->average_hits,
            'hit_dice_amount' => $this->hit_dice_amount,
            'hit_dice_type' => $this->hit_dice_type,
            'hit_dice_modifier' => $this->hit_dice_modifier,
            'skill_bonus' => $this->skill_bonus,
            'strength' => $this->strength,
            'dexterity' => $this->dexterity,
            'constitution' => $this->constitution,
            'intelligence' => $this->intelligence,
            'wisdom' => $this->wisdom,
            'charisma' => $this->charisma,
            'id_size' => $this->id_size,
            'id_species' => $this->id_species,
            'id_subspecies' => $this->id_subspecies,
            'id_worldview' => $this->id_worldview,
            'id_created_by' => $this->id_created_by,
            'is_approved_by_admin' => $this->is_approved_by_admin,
            'is_named' => $this->is_named,
        ]);

        $query->andFilterWhere(['like', 'name_ru', $this->name_ru])
            ->andFilterWhere(['like', 'name_eng', $this->name_eng])
            ->andFilterWhere(['like', 'danger_level', $this->danger_level]);

        return $dataProvider;
    }
}
