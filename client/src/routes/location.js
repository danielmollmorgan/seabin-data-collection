import React from 'react';
import { Route } from 'react-router-dom';
import { List, Create, Update, Show } from '../components/location/';

export default [
  <Route path="/locations/create" component={Create} exact key="create" />,
  <Route path="/locations/edit/:id" component={Update} exact key="update" />,
  <Route path="/locations/show/:id" component={Show} exact key="show" />,
  <Route path="/locations/" component={List} exact strict key="list" />,
  <Route path="/locations/:page" component={List} exact strict key="page" />
];
