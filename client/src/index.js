import React from 'react';
import ReactDOM from 'react-dom';
import { createStore, combineReducers, applyMiddleware } from 'redux';
import { Provider } from 'react-redux';
import thunk from 'redux-thunk';
import { reducer as form } from 'redux-form';
import { Route, Switch } from 'react-router-dom';
import createBrowserHistory from 'history/createBrowserHistory';
import {
  ConnectedRouter,
  connectRouter,
  routerMiddleware
} from 'connected-react-router';
import 'bootstrap/dist/css/bootstrap.css';
import 'font-awesome/css/font-awesome.css';
import * as serviceWorker from './serviceWorker';

// import reducers
import person from './reducers/person/';
import measurementmeta from './reducers/measurementmeta/';
import measurement from './reducers/measurement/';
import location from './reducers/location/';
import measurementtype from './reducers/measurementtype/';
import image from './reducers/image/';


//import routes
import personRoutes from './routes/person';
import measurementmetaRoutes from './routes/measurementmeta';
import measurementRoutes from './routes/measurement';
import locationRoutes from './routes/location';
import measurementtypeRoutes from './routes/measurementtype';
import imageRoutes from './routes/image';


import Welcome from './Welcome';

const history = createBrowserHistory();
const store = createStore(
  combineReducers({
    router: connectRouter(history),
      form,
      person,
      measurementmeta,
      measurement,
      location,
      measurementtype,
      image
  }),
  applyMiddleware(routerMiddleware(history), thunk)
);

ReactDOM.render(
  <Provider store={store}>
    <ConnectedRouter history={history}>
      <Switch>
        <Route path="/" component={Welcome} strict={true} exact={true}/>
        {personRoutes}
        {measurementmetaRoutes}
        {measurementRoutes}
        {locationRoutes}
        {measurementtypeRoutes}
        {imageRoutes}
        <Route render={() => <h1>Not Found</h1>} />
      </Switch>
    </ConnectedRouter>
  </Provider>,
  document.getElementById('root')
);

// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: http://bit.ly/CRA-PWA
serviceWorker.unregister();
