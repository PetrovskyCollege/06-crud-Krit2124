<?php

/** @var yii\web\View $this */

$this->title = 'Бестиарий';
?>
<body>
    <main>
        <section class="sectionLikeHeader">
            <div class="container">             
                <div class="headerFilters">
                    <div class="mainFilters">
                        <button id="openOrCloseFilters" class="buttonWithArrowDown openOrCloseFilters">
                            <img src="../../web/img/funnel.png" alt="Вывести/скрыть остальные фильтры">
                        </button>
                        <input id="nameInput" type="text" placeholder="Название" class="inputWithLoupe">
                        <button id="usersNPCInput" class="checkBoxInputGreen">Пользовательские НИПы</button>
                    </div>

                    <div class="dropDownContainer filtersContainer additionalFilters">
                        <button id="dangerLevelInput" class="buttonWithArrowDown">Уровень опасности</button>
                        <div>
                            <button id="worldviewInput" class="buttonWithArrowDown">Мировоззрение</button>
                            <div class="dropDownContainer filtersContainer worldviewVariations">
                                <button id="lawfulGood" class="usualButton">ЗД</button>
                                <button id="neutralGood" class="usualButton">НД</button>
                                <button id="chaoticGood" class="usualButton">ХД</button>

                                <button id="lawfulNeutral" class="usualButton">ЗН</button>
                                <button id="neutral" class="usualButton">НН</button>
                                <button id="chaoticNeutral" class="usualButton">ХН</button>

                                <button id="lawfulEvil" class="usualButton">ЗЗ</button>
                                <button id="neutralEvil" class="usualButton">НЗ</button>
                                <button id="chaoticEvil" class="usualButton">ХЗ</button>

                                <button id="noWorldview" class="usualButton">Без мировоззрения</button>
                            </div>
                        </div>
                        <button id="speciesInput" class="buttonWithArrowDown">Вид</button>
                        <button id="subspeciesInput" class="buttonWithArrowDown">Подвид</button>
                        <button id="NPCWithoutImageInput" class="checkBoxInputGreen">НИПы без изображения</button>
                        <button id="habitatInput" class="buttonWithArrowDown">Места обитания</button>
                        <button id="languageInput" class="buttonWithArrowDown">Языки</button>
                        <button id="sizeInput" class="buttonWithArrowDown">Размер</button>
                        <button id="speedTypeInput" class="buttonWithArrowDown">Способы перемещения</button>
                        <button id="damageVulnerabilityInput" class="buttonWithArrowDown">Уязвимость к урону</button>
                        <button id="damageResistanceInput" class="buttonWithArrowDown">Сопротивление к урону</button>
                        <button id="damageImmunityInput" class="buttonWithArrowDown">Иммунитет к урону</button>
                        <button id="senseInput" class="buttonWithArrowDown">Чувства</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
