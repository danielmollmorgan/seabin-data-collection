import { combineReducers } from 'redux';

export function error(state = null, action) {
  switch (action.type) {
    case 'MEASUREMENTTYPE_SHOW_ERROR':
      return action.error;

    case 'MEASUREMENTTYPE_SHOW_MERCURE_DELETED':
      return `${action.retrieved['@id']} has been deleted by another user.`;

    case 'MEASUREMENTTYPE_SHOW_RESET':
      return null;

    default:
      return state;
  }
}

export function loading(state = false, action) {
  switch (action.type) {
    case 'MEASUREMENTTYPE_SHOW_LOADING':
      return action.loading;

    case 'MEASUREMENTTYPE_SHOW_RESET':
      return false;

    default:
      return state;
  }
}

export function retrieved(state = null, action) {
  switch (action.type) {
    case 'MEASUREMENTTYPE_SHOW_SUCCESS':
    case 'MEASUREMENTTYPE_SHOW_MERCURE_MESSAGE':
      return action.retrieved;

    case 'MEASUREMENTTYPE_SHOW_RESET':
      return null;

    default:
      return state;
  }
}

export function eventSource(state = null, action) {
  switch (action.type) {
    case 'MEASUREMENTTYPE_SHOW_MERCURE_OPEN':
      return action.eventSource;

    case 'MEASUREMENTTYPE_SHOW_RESET':
      return null;

    default:
      return state;
  }
}

export default combineReducers({ error, loading, retrieved, eventSource });
