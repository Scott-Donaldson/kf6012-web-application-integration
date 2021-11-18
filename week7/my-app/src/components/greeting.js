import React from 'react';
import Hello from './hello'

class Greeting extends React.Component{
    render(){
        return(
            <div>
                {this.props.names.map((x,i) => (<Hello key={i} name={x}/>))}
            </div>
        )
    }
}

export default Greeting