import React from 'react'
import Films from './films'

class HomePage extends React.Component{
    render(){
        return(
            <div>
                <p>Homepage</p>
                <Films filmid={Math.floor(Math.random() * 1000) + 1}/>
            </div>
        )
    }
}

export default HomePage