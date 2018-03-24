var users = [];
var inputs = document.getElementsByTagName('input');

/*Функция для добавления новый пользователей*/
function adding() {

    if ((document.getElementById('name').value !== '') && +(document.getElementById('age').value)) {

        var unemployedUser = function () {
            if (document.getElementById('job').value === '') {
                return 'Безработный';
            } else {
                return document.getElementById('job').value;
            }
        };
    }
    users.push({
        name: document.getElementById('name').value,
        age: document.getElementById('age').value,
        job: unemployedUser()
    });

    if (users.length > 0 && users.length <= 1) {
        createElements();
    }

    if (users.length >= 0) {
        showArray(users, document.getElementById('result'));
    }
}

/*Функция создает dom-елементы 'input' и 'button'*/
function createElements() {

    var input = document.createElement('input');
    var button = document.createElement('button');

    input.type = 'text';
    input.id = 'sorting';
    input.placeholder = '[name|age]';
    input.setAttribute('class', 'form-control sort');
    input.setAttribute('title', 'Параметр сортировки');

    button.textContent = 'Sort';
    button.onclick = function () {
        sortByField(document.getElementById('sorting').value)
    };
    button.className = "btn btn-primary";

    document.getElementById('main').appendChild(input);
    document.getElementById('main').appendChild(button);

}

/*Фукнция сортировки по заданому параметру
* @value параметр по которому проводится сортировка
* */
function sortByField(value) {

    var result = document.getElementById('result');

    if (value.toLowerCase() === 'age') {
        result.innerText = "";
        users.sort(function compare(AgeOne, AgeTwo) {
            return AgeOne.age - AgeTwo.age;
        });
        showArray(users, result);

    } else if (value.toLowerCase() === 'name') {

        result.innerText = "";
        var map = users.map(function (e, i) {
            return {index: i, item: e.name.toLowerCase()};
        });

        // сортируем карту, содержащую нормализованные значения
        map.sort(function (a, b) {
            return +(a.item > b.item) || +(a.item === b.item) - 1;
        });

        // контейнер для результирующего порядка
        var sortedByName = map.map(function (e) {
            return users[e.index];
        });

        showArray(sortedByName, result);
    }
}

/*Функция вывода массива
* @array массив, который нужно вывести
* @place место куда нужно вывести массив
* */
function showArray(array, place) {

    for (var j = 0; j < inputs.length; j++) {
        document.getElementsByTagName('input')[j].value = '';
    }
    var result = document.getElementById('result');
    result.innerText = "";
    for (var key in array) {
        for (var key1 in array[key]) {
            place.innerHTML += array[key][key1] + ' ';
        }
        place.innerHTML += '<br><hr>';
    }
}

