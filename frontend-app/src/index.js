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


const root = ReactDOM.createRoot(document.getElementById('root'));

// const StorageToDoList = withLocalStorage('todolist', ToDoList);

root.render(
  <React.StrictMode>
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
          </Routes>
        </div>
        <Footer />
      </BrowserRouter>
    </MessageProvider>
  </React.StrictMode>
);

