import React from 'react';

class Logout extends React.Component{
    render(){
        return(
            <div>
            <p>Hello, {this.props.email.split("@")[0]}</p>
            <button onClick={this.props.handleLogoutClick}>Log Out</button>
            </div>
        )
    }
}

export default Logout