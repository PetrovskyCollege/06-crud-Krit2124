<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "npc".
 *
 * @property int $id
 * @property string $name_ru Название существа на русском
 * @property string $name_eng Название существа на английском
 * @property string|null $image Ссылка на изображение
 * @property string $danger_level Уровень опасности
 * @property int $armor_class Класс брони
 * @property int $average_hits Среднее количество хитов
 * @property int $hit_dice_amount Количество костей хитов
 * @property int $hit_dice_type Тип костей хитов (4, 6, 8, 10, 12, 20)
 * @property int $hit_dice_modifier Модификатор хитов (бонус к броску костей хитов)
 * @property int $skill_bonus Бонус мастерства
 * @property int $strength Значение силы
 * @property int $dexterity Значение ловкости
 * @property int $constitution Значение телосложения
 * @property int $intelligence Значение интеллекта
 * @property int $wisdom Значение мудрости
 * @property int $charisma Значение харизмы
 * @property int $id_size Размер
 * @property int $id_species Вид
 * @property int|null $id_subspecies Подвид
 * @property int $id_worldview Мировоззрение
 * @property int $id_created_by Создатель (пользователь)
 * @property bool $is_approved_by_admin Должно ли отображаться существо только при выборе пользовательских существ
 * @property bool $is_named Является ли существо именованным
 *
 * @property Ability $ability
 * @property Action $action
 * @property User $createdBy
 * @property Description[] $descriptions
 * @property LegendaryAction[] $legendaryActions
 * @property ListOfFavoriteNpc[] $listOfFavoriteNpcs
 * @property NpcHasConditionImmunity[] $npcHasConditionImmunities
 * @property NpcHasDamageImmunity[] $npcHasDamageImmunities
 * @property NpcHasDamageResistance[] $npcHasDamageResistances
 * @property NpcHasDamageVulnerability[] $npcHasDamageVulnerabilities
 * @property NpcHasHabitat[] $npcHasHabitats
 * @property NpcHasLanguage[] $npcHasLanguages
 * @property NpcHasSavingThrow[] $npcHasSavingThrows
 * @property NpcHasSense[] $npcHasSenses
 * @property NpcHasSkill[] $npcHasSkills
 * @property SizeType $size
 * @property SpeciesType $species
 * @property SubspeciesType $subspecies
 * @property WorldviewType $worldview
 */
class Npc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'npc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_eng', 'danger_level', 'armor_class', 'average_hits', 'hit_dice_amount', 'hit_dice_type', 'hit_dice_modifier', 'skill_bonus', 'strength', 'dexterity', 'constitution', 'intelligence', 'wisdom', 'charisma', 'id_size', 'id_species', 'id_worldview', 'id_created_by'], 'required'],
            [['armor_class', 'average_hits', 'hit_dice_amount', 'hit_dice_type', 'hit_dice_modifier', 'skill_bonus', 'strength', 'dexterity', 'constitution', 'intelligence', 'wisdom', 'charisma', 'id_size', 'id_species', 'id_subspecies', 'id_worldview', 'id_created_by'], 'integer'],
            [['is_approved_by_admin', 'is_named'], 'boolean'],
            [['name_ru', 'name_eng'], 'string', 'max' => 63],
            [['image'], 'string', 'max' => 255],
            [['danger_level'], 'string', 'max' => 7],
            [['id_created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_created_by' => 'id']],
            [['id_size'], 'exist', 'skipOnError' => true, 'targetClass' => SizeType::class, 'targetAttribute' => ['id_size' => 'id']],
            [['id_species'], 'exist', 'skipOnError' => true, 'targetClass' => SpeciesType::class, 'targetAttribute' => ['id_species' => 'id']],
            [['id_subspecies'], 'exist', 'skipOnError' => true, 'targetClass' => SubspeciesType::class, 'targetAttribute' => ['id_subspecies' => 'id']],
            [['id_worldview'], 'exist', 'skipOnError' => true, 'targetClass' => WorldviewType::class, 'targetAttribute' => ['id_worldview' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Название',
            'name_eng' => 'Название на английском',
            'image' => 'Изображение',
            'danger_level' => 'Уровень опасности',
            'armor_class' => 'Класс доспеха',
            'average_hits' => 'Средние хиты',
            'hit_dice_amount' => 'Количество костей хитов',
            'hit_dice_type' => 'Тип кости хитов',
            'hit_dice_modifier' => 'Модификатор к хитам',
            'skill_bonus' => 'Бонус мастерства',
            'strength' => 'Сила (значение)',
            'dexterity' => 'Ловкость (значение)',
            'constitution' => 'Телосложение (значение)',
            'intelligence' => 'Интеллект (значение)',
            'wisdom' => 'Мудрость (значение)',
            'charisma' => 'Харизма (значение)',
            'id_size' => 'Размер',
            'id_species' => 'Вид',
            'id_subspecies' => 'Подвид',
            'id_worldview' => 'Мировоззрение',
            'id_created_by' => 'Добавил',
            'is_approved_by_admin' => 'Считать ли официальным NPC',
            'is_named' => 'Именованый',
        ];
    }

    /**
     * Gets query for [[Ability]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAbilities()
    {
        return $this->hasMany(Ability::class, ['id_npc' => 'id']);
    }

    /**
     * Gets query for [[Action]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActions()
    {
        return $this->hasMany(Action::class, ['id_npc' => 'id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'id_created_by']);
    }

    /**
     * Gets query for [[Descriptions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDescriptions()
    {
        return $this->hasMany(Description::class, ['id_npc' => 'id']);
    }

    /**
     * Gets query for [[LegendaryActions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLegendaryActions()
    {
        return $this->hasMany(LegendaryAction::class, ['id_npc' => 'id']);
    }

    /**
     * Gets query for [[ListOfFavoriteNpcs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getListOfFavoriteNpcs()
    {
        return $this->hasMany(ListOfFavoriteNpc::class, ['id_npc' => 'id']);
    }

    /**
     * Gets query for [[NpcHasConditionImmunities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcHasConditionImmunities()
    {
        return $this->hasMany(NpcHasConditionImmunity::class, ['id_npc' => 'id']);
    }

    /**
     * Gets query for [[NpcHasDamageImmunities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcHasDamageImmunities()
    {
        return $this->hasMany(NpcHasDamageImmunity::class, ['id_npc' => 'id']);
    }

    /**
     * Gets query for [[NpcHasDamageResistances]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcHasDamageResistances()
    {
        return $this->hasMany(NpcHasDamageResistance::class, ['id_npc' => 'id']);
    }

    /**
     * Gets query for [[NpcHasDamageVulnerabilities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcHasDamageVulnerabilities()
    {
        return $this->hasMany(NpcHasDamageVulnerability::class, ['id_npc' => 'id']);
    }

    /**
     * Gets query for [[NpcHasHabitats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcHasHabitats()
    {
        return $this->hasMany(NpcHasHabitat::class, ['id_npc' => 'id']);
    }

    /**
     * Gets query for [[NpcHasLanguages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcHasLanguages()
    {
        return $this->hasMany(NpcHasLanguage::class, ['id_npc' => 'id']);
    }

    /**
     * Gets query for [[NpcHasSavingThrows]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcHasSavingThrows()
    {
        return $this->hasMany(NpcHasSavingThrow::class, ['id_npc' => 'id']);
    }

    /**
     * Gets query for [[NpcHasSenses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcHasSenses()
    {
        return $this->hasMany(NpcHasSense::class, ['id_npc' => 'id']);
    }

    /**
     * Gets query for [[NpcHasSkills]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcHasSkills()
    {
        return $this->hasMany(NpcHasSkill::class, ['id_npc' => 'id']);
    }

    /**
     * Gets query for [[Size]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSize()
    {
        return $this->hasOne(SizeType::class, ['id' => 'id_size']);
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

    /**
     * Gets query for [[Subspecies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubspecies()
    {
        return $this->hasOne(SubspeciesType::class, ['id' => 'id_subspecies']);
    }

    /**
     * Gets query for [[Worldview]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorldview()
    {
        return $this->hasOne(WorldviewType::class, ['id' => 'id_worldview']);
    }
}
