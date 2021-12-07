import React from 'react'
import Actor from './actor'

class Actors extends React.Component{
    constructor(props){
        super(props)
        this.state = {results : []}
    }
    async componentDidMount(){
        let url = "http://localhost/week6/part2/api/actors"

        if(this.props.id !== undefined) url += `?id=${this.props.id}`

        try{
            let res = await fetch(url)
            let data = await res.json()
            if(data.status !== 200) throw new Error(`API Error: ${data.status} | ${data.message} | ${url}`)
            this.setState({results: data.results})
        }catch(e){
            console.log("Something went wrong", e)
        }
    }
    render(){

        let filterFunctions = []
        if(this.props.search !== "" && this.props.search !== undefined) filterFunctions.push( x => {return `${x.first_name} ${x.last_name}`.toLowerCase().includes(this.props.search.toLowerCase())})

        let filteredResults = this.state.results
        filterFunctions.forEach(func => {filteredResults = filteredResults.filter(func)})



        let noData = ""
        if(!this.state.results.length || !filteredResults.length) noData = <p>No Data</p>
        return(
            <div>
                {filteredResults.map( (actor, i) => (<Actor key={`${i}:${actor.first_name}`}actor={actor}/>))}
                {noData}
            </div>
        )
    }

}

export default Actors