import React from 'react';

class Goodbye extends React.Component{
    render(){
        return(
            <p className= {this.props.className}>Goodbye, {this.props.name}</p>
        )
    }
}

export default Goodbye