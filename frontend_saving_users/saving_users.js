var lib = (function () {

    var users = [],
    inputs = document.getElementsByTagName('input');

/*Функция для добавления новый пользователей*/
function adding() {
    var userJob = document.getElementById('job').value,
        userName = document.getElementById('name').value,
        userAge = document.getElementById('age').value;

    if (!document.getElementById('name').value) {
        alert('Некоторые поля незаполнелы');
    }else {
        var unemployedUser = function () {
            if (!userJob) {
                return 'Безработный';
            } else {
                return userJob;
            }
        };

        users.push({
            name: userName,
            age: userAge,
            job: unemployedUser()
        });

        if (users.length > 0 && users.length <= 1) {
            createElements();
        }

        if (users.length >= 0) {
            showArray(users, document.getElementById('result'));
        }
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

    switch (value.toLowerCase()) {

        case 'age':
            result.innerText = "";
            users.sort(function compare(AgeOne, AgeTwo) {
                return AgeOne.age - AgeTwo.age;
            });
            showArray(users, result);
            break;

        case 'name':
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
            break;
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
})();

var buff = lib.showArray();