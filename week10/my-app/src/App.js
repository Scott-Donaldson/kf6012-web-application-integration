import {BrowserRouter, Routes, Route, Link} from 'react-router-dom'
import HomePage from './components/homepage';
import FilmPage from './components/filmpage';
import ActorPage from './components/actorpage';
import ViewingListPage from './components/viewinglistpage'

function App() {
  return (
      <BrowserRouter>
        <div className='App'>
          <nav>
            <ul>
              <li><Link to='/'>Home</Link></li>
              <li><Link to='films'>Films</Link></li>
              <li><Link to='actors'>Actors</Link></li>
              <li><Link to='viewinglist'>Viewing List</Link></li>
            </ul>
          </nav>
          <Routes>
            <Route path='/' element={<HomePage/>} />
            <Route path='films' element={<FilmPage />} />
            <Route path='actors' element={<ActorPage/>} />
            <Route path='*' element={<p>Not Found</p>} />
            <Route path='viewinglist' element={<ViewingListPage/>}/>
          </Routes>
        </div>
      </BrowserRouter>
  );
}

export default App;
