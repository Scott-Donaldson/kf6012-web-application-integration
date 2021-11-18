import React from 'react';
import Goodbye from './goodbye';

class Farewell extends React.Component{
    render(){
        return(
            <div>
                {this.props.names.map((x,i) => (<Goodbye key={i} name={x}/>))}
            </div>
        )
    }
}

export default Farewell