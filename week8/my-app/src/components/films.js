import React from 'react';
import Film from './film'

class Films extends React.Component{
    constructor(props){
        super(props)
        this.state = { results: []}
    }
    async componentDidMount(){
        let url = "http://localhost/week6/part2/api/films"
        let res = await fetch(url)
        let data = await res.json()
        this.setState({results: data.results}) 
    }
    render(){
        return(
            <div>
                {this.state.results.map( (film, i) => (<Film film={film}/>))}
            </div>
        )
    }
}

export default Films