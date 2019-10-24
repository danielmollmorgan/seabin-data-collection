import React from 'react';
import { Route } from 'react-router-dom';
import { List, Create, Update, Show } from '../components/measurementmeta/';

export default [
  <Route path="/measurement_metas/create" component={Create} exact key="create" />,
  <Route path="/measurement_metas/edit/:id" component={Update} exact key="update" />,
  <Route path="/measurement_metas/show/:id" component={Show} exact key="show" />,
  <Route path="/measurement_metas/" component={List} exact strict key="list" />,
  <Route path="/measurement_metas/:page" component={List} exact strict key="page" />
];
