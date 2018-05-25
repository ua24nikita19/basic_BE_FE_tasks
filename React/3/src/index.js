import React from 'react';
import { render } from 'react-dom';
import { AppContainer } from 'react-hot-loader';
import App from './containers/App';

const renderApp = AppRoutes => {
  render(
    <AppContainer>
      <AppRoutes />
    </AppContainer>,
    document.getElementById('root')
  );
};

renderApp(App);

if (module.hot) {
  module.hot.accept('./containers/App', () => {
    const newRoutes = require('./containers/App').default;

    renderApp(newRoutes);
  });
}