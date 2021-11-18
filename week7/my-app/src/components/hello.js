import React from 'react';

class Hello extends React.Component{
    render(){
        return(
            <p className= {this.props.className}>Hello, {this.props.name}</p>
        )
    }
}

export default Hello