import React from 'react';
import ReactDOM from 'react-dom/client';
import TemperatureControl from './Thermometer/TemperatureControl';
import ToDoList from './ToDoList/ToDoList';


const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <TemperatureControl />
    <ToDoList />
  </React.StrictMode>
);

