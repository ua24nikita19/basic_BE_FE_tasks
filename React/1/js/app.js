
let my_news = [
  {
    author: "Саша Печкин",
    text: "В четверг, четвертого числа...",
    bigText: "в четыре с четвертью часа четыре чёрненьких чумазеньких чертёнка чертили чёрными чернилами чертёж."
  },
  {
    author: "Просто Вася",
    text: "Считаю, что $ должен стоить 37 гривен!",
    bigText: "А евро раздавать бесплатно!"
  },
  {
    author: "Гость",
    text: "Бесплатно. Скачать. Лучший сайт - http://localhost:3000",
    bigText: "На самом деле платно, просто нужно прочитать очень длинное лицензионное соглашение"
  }
];


class App extends React.Component {
  render() {
    return (
      <div className="app">
        Всем привет, я компонент App! Я умею отображать новости.

        <News data={my_news} />
      </div>
    );
  }
}

class News extends React.Component {
  render() {

    let newsData = this.props.data,
      newsTemplate = newsData.map((item, idx) => {
        return (
          <Article data={item} key={idx}/>
      )
      }),
      newsLength = newsTemplate.length;
    console.log(newsTemplate);

    return (
      <section className="news">
        {!!newsLength ? newsTemplate  : "Новостей нет "}

        <NewsCount total={newsLength}/>
      </section>
    )
  }
}

class NewsCount extends React.Component {

  render() {

    let countNews = this.props.total;
    return (
      <div className={countNews}>
        <p><b>Количество новостей:</b> {countNews}</p>
      </div>
    )
  }
}

NewsCount.propTypes = {
  total: PropTypes.number
};

News.propTypes = {
  data: PropTypes.array.isRequired
};


class Article extends React.Component {
  constructor(props, context) {
    super(props, context);

    this.state = {
      visible: false
    };
  }

  readmoreClick(e) {
    e.preventDefault();

    this.setState(
      {
        visible: true
      }
    );
  }

  render() {
    let author = this.props.data.author,
      text = this.props.data.text,
      bigText = this.props.data.bigText,
      visible = this.state.visible,
      styles = {
        lnk: {
          display: !visible ? "block" : "none"
        },
        txtFull: {
          display: visible ? "block" : "none"
        }
      };

    return (
      <article className="article">
        <p className="news__author">{author}:</p>
        <p className="news__text">{text}</p>
        <a href="#" onClick={this.readmoreClick.bind(this)} className="news__readmore" style={styles.lnk}>Подробнее</a>
        <p className="news__big-text" style={styles.txtFull}>{bigText}</p>
      </article>
    )
  }
}

Article.propTypes = {
  data: PropTypes.shape({
    author: PropTypes.string.isRequired,
    text: PropTypes.string.isRequired,
    bigText: PropTypes.string.isRequired
  })
};

ReactDOM.render(
  <App />,
  document.getElementById( "root")
);