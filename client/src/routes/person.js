import React from 'react';
import { Route } from 'react-router-dom';
import { List, Create, Update, Show } from '../components/person/';

export default [
  <Route path="/people/create" component={Create} exact key="create" />,
  <Route path="/people/edit/:id" component={Update} exact key="update" />,
  <Route path="/people/show/:id" component={Show} exact key="show" />,
  <Route path="/people/" component={List} exact strict key="list" />,
  <Route path="/people/:page" component={List} exact strict key="page" />
];
