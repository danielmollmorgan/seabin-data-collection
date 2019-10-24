import React from 'react';
import { Route } from 'react-router-dom';
import { List, Create, Update, Show } from '../components/measurementtype/';

export default [
  <Route path="/measurement_types/create" component={Create} exact key="create" />,
  <Route path="/measurement_types/edit/:id" component={Update} exact key="update" />,
  <Route path="/measurement_types/show/:id" component={Show} exact key="show" />,
  <Route path="/measurement_types/" component={List} exact strict key="list" />,
  <Route path="/measurement_types/:page" component={List} exact strict key="page" />
];
