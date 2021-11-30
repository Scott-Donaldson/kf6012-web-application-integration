import React from 'react'
import Actors from './actors'
import SearchBox from './searchbox'

class ActorPage extends React.Component{
    constructor(props){
        super(props)
        this.state = {search: ""}
        this.handleSearch = this.handleSearch.bind(this)
    }

    handleSearch = e => {
        this.setState({search: e.target.value})
    }

    render(){
        return(
            <div>
                <SearchBox search={this.state.search} handleSearch={this.handleSearch}/>
                <Actors search={this.state.search}/>
            </div>
        )
    }
}

export default ActorPage