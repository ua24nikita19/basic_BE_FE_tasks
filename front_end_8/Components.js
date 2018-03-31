
'use strict';

var componentHeader = new Component({parent: 'header', url: 'js.png',  title: 'Learn JS'}),
    viewHeader = `<h1><img src="{url}" alt="{title}"/> {title} </h1>`,
    componentFooter = new Component({parent: 'footer', text: 'Корирайты'}),
    viewFooter = '<a href="https://www.google.com.ua"><i>google.com</i></a>',
    componentMenu = new Component({parent: 'nav'}),
    viewMenu = '<ul>{li}</ul>',
    dataMenu = [
        {
            name: 'Главная',
            url: 'www'
        },
        {
            name: 'O нас',
            url: 'www',
            items: [
                {name: 'Кто мы', url: 'www'},
                {name: 'Где мы', url: 'www'},
                {name: 'Откуда', url: 'www'},
            ]
        },
        {
            name: 'Контакты',
            url: 'www'
        }
    ];

function Component(options) {

    for (var prop in options) {
        if (options.hasOwnProperty(prop)) {
            this[prop] = options[prop];
        }
    }
}

Component.prototype.setView = function (viewString, data) {

    if(this.url && this.title){
        var changeViewString = viewString.replace(/{url}/, this.url);
        var resultViewString = changeViewString.replace(/{title}/g, this.title);
        this.innerView =  resultViewString;
    } else {
        this.innerView =  viewString;
    }

    if(data.length>0){
        getItems(data);
    }
};

Component.prototype.render = function () {

    var start = document.createElement(`${this.parent}`);
    start.innerHTML = this.innerView;

    return start;

};

// componentMenu.renderSubItem = function (data) {
//
//     var render = Component.prototype.render();
//
// };

var list = [];
function getItems(array) {
    for(var i = 0; i < array.length; i++){
        list.push(array[i]);
        for(var key in array[i]){
            if(key == 'items'){
                f(array[i].items);
            }
        }
    }
}

componentHeader.setView(viewHeader);
componentFooter.setView(viewFooter);
componentMenu.setView(viewMenu, dataMenu);

document.body.appendChild(componentHeader.render());
document.body.appendChild(componentFooter.render());
// document.body.appendChild(componentMenu.renderSubItem(dataMenu));

