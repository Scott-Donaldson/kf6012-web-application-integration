import React from 'react'
import './navbar.css'
import {BrowserRouter, Routes, Route, Link} from 'react-router-dom'
import Greeting from './greeting'
import Farewell from './farewell'


class Navbar extends React.Component{
    render(){
        return(
            <div>
                <BrowserRouter>
                    <nav>
                        <ul>
                            <li><Link to="/">Home</Link></li>
                            <li><Link to="greetings">Greetings</Link></li>
                        </ul>
                    </nav>
                    <Routes>
                        <Route path="/" element= {<p>Hi</p>}/>
                        <Route path="greetings" element= {<Greeting names={["A","B","C"]}/>}/>
                        <Route path="farewell" element= {<Farewell names={["X","Y","Z"]}/>}/>
                        <Route path="*" element={<p>Not Found</p>}/>
                    </Routes>
                </BrowserRouter>
            </div>

        )
    }
}

export default Navbar