// Изменение цвета кнопок, заменяющих checkbox'ы, при их нажатии
function toggleColor(button) {
    button.classList.toggle("checkBoxInputGreen")
    button.classList.toggle("checkBoxInputRed")
}

// Функция для поворота стрелки
function switchArrow(button) {
    button.classList.toggle("buttonWithArrowDown")
    button.classList.toggle("buttonWithArrowUp")
}

// Функция для отображения выпадающих контейнеров
function showDataForFilter(button, container) {
    if (button.classList.contains("buttonWithArrowUp")) {
        container.style.display = "flex"
    } else {
        container.style.display = "none"
    }
}

// Функция для изменения стиля у нажатой кнопки в Header'е
function switchHeaderButton(button) {
    button.classList.toggle("pressedHeaderButton")
}

// Функция для отображения контейнера с авторизацией/регистрацией
function showAuthorizationContainer(button, container) {
    if (button.classList.contains("pressedHeaderButton")) {
        container.style.display = "flex"
    } else {
        container.style.display = "none"
    }
}

// Функция для смены формы авторизации на форму регистрации и наоборот
function switchForm(currentForm, newForm) {
    currentForm.style.display = "none"
    newForm.style.display = "flex"
}

// Кнопки, заменяющие checkbox'ы
let NPCWithoutImageInput = document.getElementById("NPCWithoutImageInput")
let usersNPCInput = document.getElementById("usersNPCInput")

NPCWithoutImageInput.onclick = function() {
    toggleColor(NPCWithoutImageInput)
}
usersNPCInput.onclick = function() {
    toggleColor(usersNPCInput)
}

// Кпопки со стрелочками
let openOrCloseFilters = document.getElementById("openOrCloseFilters")
let dangerLevelInput = document.getElementById("dangerLevelInput")
let worldviewInput = document.getElementById("worldviewInput")
let speciesInput = document.getElementById("speciesInput")
let subspeciesInput = document.getElementById("subspeciesInput")
let habitatInput = document.getElementById("habitatInput")
let languageInput = document.getElementById("languageInput")
let sizeInput = document.getElementById("sizeInput")
let speedTypeInput = document.getElementById("speedTypeInput")
let damageVulnerabilityInput = document.getElementById("damageVulnerabilityInput")
let damageResistanceInput = document.getElementById("damageResistanceInput")
let damageImmunityInput = document.getElementById("damageImmunityInput")
let senseInput = document.getElementById("senseInput")

// Блоки с дополнительными фильтрами и их значениями
let additionalFilters = document.getElementsByClassName("additionalFilters")[0]
let worldviewVariations = document.getElementsByClassName("worldviewVariations")[0]

// Присваивание функций кнопкам со стрелками
openOrCloseFilters.onclick = function() {
    switchArrow(openOrCloseFilters)
    showDataForFilter(openOrCloseFilters, additionalFilters)
}
dangerLevelInput.onclick = function() {
    switchArrow(dangerLevelInput)
}
worldviewInput.onclick = function() {
    switchArrow(worldviewInput)
    showDataForFilter(worldviewInput, worldviewVariations)
}
speciesInput.onclick = function() {
    switchArrow(speciesInput)
}
subspeciesInput.onclick = function() {
    switchArrow(subspeciesInput)
}
habitatInput.onclick = function() {
    switchArrow(habitatInput)
}
languageInput.onclick = function() {
    switchArrow(languageInput)
}
sizeInput.onclick = function() {
    switchArrow(sizeInput)
}
speedTypeInput.onclick = function() {
    switchArrow(speedTypeInput)
}
damageVulnerabilityInput.onclick = function() {
    switchArrow(damageVulnerabilityInput)
}
damageResistanceInput.onclick = function() {
    switchArrow(damageResistanceInput)
}
damageImmunityInput.onclick = function() {
    switchArrow(damageImmunityInput)
}
senseInput.onclick = function() {
    switchArrow(senseInput)
}

// Кнопки в шапке
let accountButton = document.getElementById("accountButton")

// Контейнер с авторизацией и регистрацией
let userBox = document.getElementsByClassName("userBox")[0]

// Присваивание функций кнопкам в шапке
accountButton.onclick = function() {
    switchHeaderButton(accountButton)
    showAuthorizationContainer(accountButton, userBox)
}

// Формы авторизации и регистрации
let loginForm = document.getElementsByClassName("loginForm")[0]
let regForm = document.getElementsByClassName("regForm")[0]

// Кнопки переключения между авторизацией и регистрацией
let regButton = document.getElementById("regButton")
let loginButton = document.getElementById("loginButton")

// Присваивание функций кнопкам переключения между авторизацией и регистрацией
regButton.onclick = function() {
    switchForm(loginForm, regForm)
}

loginButton.onclick = function() {
    switchForm(regForm, loginForm)
}