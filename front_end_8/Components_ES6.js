'use strict';

/** Class representing a Component */
class Component {

  /**
   * Create a component.
   * @param {object} obj - The object.
   */
  constructor(obj) {
    for (let prop in obj) {
      if (obj.hasOwnProperty(prop)) {
        this[prop] = obj[prop];
      }
    }
    this._order = 0;
  }

  /**
   * Set the view of component.
   * @param {string} viewString - The html-line.
   * @param {array} data - The array for create html-menu
   * @return {void}.
   */
  setView(viewString, data) {
    let changeViewString,
      resultViewString;

    if (this.url && this.title) {
      changeViewString = viewString.replace(/{url}/, this.url);
      resultViewString = changeViewString.replace(/{title}/g, this.title);

      this.innerView = resultViewString;
    } else {
      this.innerView = viewString;
    }

    if (data) {
      if (data.length > 0) {
        if (viewString.match(/{article}/i)){
          changeViewString = viewString.replace(/{article}/, renderSubItem(data));
          this.innerView = changeViewString;
        } else if (viewString.match(/{li}/i)) {
          changeViewString = viewString.replace(/{li}/, renderSubItem(data));
          this.innerView = changeViewString;
        }
      }
    }
  }

  /**
   * Render the component in DOM.
   * @return {object} start - Created element.
   */
  render() {
    let start = document.createElement(`${this.parent}`);

    if (this.id) {
      start.id = this.id;
    }

    start.innerHTML = this.innerView;
    return start;
  }

  /**
   * Delete element from DOM.
   * @return {void}.
   */
  delete() {
    document.getElementById(`${this.id}`).remove();
  }

  /**
   * Set the order of components on the page.
   * @param {number} position - The value for set the order.
   * @return {void}.
   */
  setOrder(position) {
    if (this._order === position) {
      console.log('Already set');
      return;
    }

    this._order = position;
  }

}

/**
 * Render sub-items in menu.
 * @param {array} array - Data like array for create html-menu.
 * @return {string} menuItems - The html-menu-line.
 */
let renderSubItem = (array) => {
  let menuSubItems = '',
      menuItems = '';

  for (let i = 0; i < array.length; i++) {
    menuSubItems = '';
    for (let k in array[i]) {
      if (k === 'items') {
        menuSubItems = '<ul class="list-group list-group-flush">' + renderSubItem(array[i].items) + '</ul>';
      }
    }
    menuItems += '<li class="list-group-item"><a href="' + array[i].url + '">' + array[i].name + menuSubItems + '</a></li>';
  }

  return menuItems;
}

/**
 * Render all component on the page in order of sorting.
 * @param {object} args - Components of page.
 * @return {void}.
 */
function renderPage(...args) {
  for(let i = 0; i < args.length; i++){
      sequenceBlocks[i] = {
      order: args[i]._order,
      name: args[i],
      objName: args[i].parent,
    };
  }

  sequenceBlocks.sort(function(a, b) {
      let paramA = a.order,
      paramB = b.order;

      if (paramA < paramB) {
        return -1;
      } else if (paramA > paramB) {
        return 1;
      }
  });

  for(let i = 0; i < sequenceBlocks.length; i++){
      document.body.appendChild(sequenceBlocks[i].name.render());
  }

}

let componentHeader = new Component({parent: 'header', url: 'js.png', title: 'Learn JS', id: 'header'}),
    viewHeader = `<h1><img src="{url}" alt="{title}"/> {title} </h1>`,
    componentArticles = new Component({parent: 'main', id: 'article'}),
    viewArticle = '<section>{article}</section>',
    componentFooter = new Component({parent: 'footer', text: 'Копирайты', id: 'footer'}),
    viewFooter = '<a href="https://www.google.com.ua"><i>Google</i></a>',
    componentMenu = new Component({parent: 'nav', id: 'nav'}),
    viewMenu = '<ul>{li}</ul>',
    sequenceBlocks = [],
    dataMenu = [
      {
        name: 'Главная',
        url: 'www',
      },
      {
        name: 'O нас',
        url: 'www',
        items: [
          {name: 'Кто мы', url: 'www'},
          {name: 'Где мы', url: 'www'},
          {name: 'Откуда', url: 'www'},
        ],
      },
      {
        name: 'Контакты',
        url: 'www',
      },
    ],
    dataArticle = [
      {name: 'Статья 1', url: 'www', text: 'Some text for you'},
      {name: 'Статья 2', url: 'www', text: 'Some text for you'},
      {name: 'Статья 3', url: 'www', text: 'Some text for you'},
    ];


componentHeader.setView(viewHeader);
componentFooter.setView(viewFooter);
componentMenu.setView(viewMenu, dataMenu);
componentArticles.setView(viewArticle, dataArticle);

componentHeader.setOrder(1);
componentFooter.setOrder(99);
componentMenu.setOrder(2);
componentArticles.setOrder(1);

renderPage(componentFooter, componentHeader, componentArticles, componentMenu);