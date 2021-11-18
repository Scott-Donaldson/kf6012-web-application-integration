import './App.css';
import React from 'react'
import {BrowserRouter, Routes, Route, Link} from 'react-router-dom'

import Greeting from './components/greeting'
import Farewell from './components/farewell'

function App() {
  return (
    <div className="app">
      <BrowserRouter>
        <Routes>]
          <Route path="/" element= {<p>Hi</p>}/>
          <Route path="greetings" element= {<Greeting names={["A","B","C"]}/>}/>
          <Route path="farewell" element= {<Farewell names={["X","Y","Z"]}/>}/>
          <Route path="*" element={<p>Not Found</p>}/>
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
