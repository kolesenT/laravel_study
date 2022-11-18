import React from 'react';
import ReactDOM from 'react-dom/client';
import TemperatureControl from './Thermometer/TemperatureControl';
import ToDoList from './ToDoList/ToDoList';
import withLocalStorage from './withLocalStorage';
import { MessageProvider } from './context/MessageContext';
import MessageBar from './components/MessageBar';

const root = ReactDOM.createRoot(document.getElementById('root'));

const StorageToDoList = withLocalStorage('todolist', ToDoList);

root.render(
  <React.StrictMode>
    <MessageProvider>
      <MessageBar />
      <TemperatureControl />
      <StorageToDoList />
    </MessageProvider>
  </React.StrictMode>
);

