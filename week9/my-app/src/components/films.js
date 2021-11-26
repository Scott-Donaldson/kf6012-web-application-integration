import React from 'react';
import Film from './film'

class Films extends React.Component{
    constructor(props){
        super(props)
        this.state = { results: []}
    }

    filterFunc = (film) => {return film.language === this.props.language || this.props.language === ""}
    
    async componentDidMount(){
        let url = "http://localhost/week6/part2/api/films"
        
        if(this.props.actorid) url += `?actor_id=${this.props.actorid}`
        else if(this.props.filmid) url += `?id=${this.props.filmid}`

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
        if (this.props.search !== "") this.filterFunc = (film) => {return film.title.toLowerCase().includes(this.props.search.toLowerCase()) || film.description.toLowerCase().includes(this.props.search.toLowerCase())}
        else if(this.props.language !== "") this.filterFunc = (film) => {return film.language === this.props.language || this.props.language === ""}

        let filteredResults = this.state.results.filter(this.filterFunc)

        let noData = ""
        if(!this.state.results.length || !filteredResults.length) noData = <p>No Data</p>
        return(
            <div>
                {noData}
                {filteredResults.map( (film, i) => (<Film key={`${i}:${film.title}`}film={film}/>))}
            </div>
        )
    }
}

export default Films