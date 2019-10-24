import React from 'react';
import { Route } from 'react-router-dom';
import { List, Create, Update, Show } from '../components/measurement/';

export default [
  <Route path="/measurements/create" component={Create} exact key="create" />,
  <Route path="/measurements/edit/:id" component={Update} exact key="update" />,
  <Route path="/measurements/show/:id" component={Show} exact key="show" />,
  <Route path="/measurements/" component={List} exact strict key="list" />,
  <Route path="/measurements/:page" component={List} exact strict key="page" />
];
