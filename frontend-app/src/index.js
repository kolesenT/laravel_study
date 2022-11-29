import React from 'react';
import ReactDOM from 'react-dom/client';
import { MessageProvider } from './context/MessageContext';
import MessageBar from './components/MessageBar';
import Header from './components/Header';
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import Footer from './components/Footer/Footer';
import About from './pages/About';
import Movies from './pages/Movies';
import AboutMovie from './pages/AboutMovie';
import Genres from './pages/Genres';
import Actors from './pages/Actors';
import ToDoList from './ToDoList/ToDoList';
import TemperatureControl from './Thermometer/TemperatureControl';
import store from './store/store'
import { Provider } from 'react-redux';


const root = ReactDOM.createRoot(document.getElementById('root'));

// const StorageToDoList = withLocalStorage('todolist', ToDoList);

root.render(
  <Provider store={store}>
    <MessageProvider>
      <BrowserRouter>
        <Header />
        <div className='container'>
          <MessageBar />
          <Routes>
            <Route path='/' element={<Movies />} />
            <Route path='/about' element={<About />} />
            <Route path='/movies'>
              <Route path=':id' element={<AboutMovie />} />
            </Route>
            <Route path='/genres' element={<Genres />} />
            <Route path='/actors' element={<Actors />} />
            <Route path='/todolist' element={<ToDoList />} />
            <Route path='/thermo' element={<TemperatureControl />} />
          </Routes>
        </div>
        <Footer />
      </BrowserRouter>
    </MessageProvider>
  </Provider >
);

