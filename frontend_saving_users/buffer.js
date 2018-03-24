var addInBuffer = document.getElementById('save');
var clearBuffer = document.getElementById('clear');
var showBuffer = document.getElementById('show');
var res = document.getElementById('buff');
function makeBuffer() {

    var arr = [];

    function buffer(value) {
        if (value !== undefined && value !== "") {
            arr.push({value});
        } else {
            if (arr.length > 0) {
                res.value = "";
                for (var key in arr) {
                    for (var key1 in arr[key]) {
                        res.value += arr[key][key1] + ' ';
                    }
                }
            } else {
                res.value = 'Empty';
            }
        }
    }

    buffer.clear = function () {
        arr.length = 0;
        res.value = "";
    };

    return buffer;
}

var buffer = makeBuffer();
addInBuffer.addEventListener('click', function () {
    return buffer(document.getElementById('buff').value);
});
clearBuffer.addEventListener('click',function () {
    return buffer.clear();
});
showBuffer.addEventListener('click',function () {
    return buffer();
});