import React from 'react'
import Films from './films'

class Actor extends React.Component{
    constructor(props){
        super(props)
        this.state = {visible: false}
    }

    handleClick = () => this.setState({visible: !this.state.visible})
    render(){
        let details = ""
        if(this.state.visible){
            details = <div>
                <Films actorid={this.props.actor.actor_id}/>
            </div>
        }
        return(
            <div onClick={this.handleClick}>
                <p>{this.props.actor.first_name} {this.props.actor.last_name}</p>
                {details}
            </div>
        )
    }
}

export default Actor