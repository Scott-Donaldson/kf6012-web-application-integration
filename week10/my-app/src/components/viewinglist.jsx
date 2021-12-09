import React from 'react'
import Checkbox from './checkbox'
import Film from './film'

class ViewingList extends React.Component{
    constructor(props){
        super(props)
        this.state = {
            results: [],
            viewingList: []
        }
    }

    async componentDidMount(){
        try{
            let url = 'http://localhost/week11/api/films'
            let res = await fetch(url)
            let data = await res.json()
            this.setState({results: data.results})
        }catch(e){
            console.log(e)
        }

        try{

            let formData = new FormData()
            formData.append('token', localStorage.getItem('viewingListToken'))

            let url = 'http://localhost/week11/api/viewinglist'
            let res = await fetch(url, {
                method: "POST",
                headers: new Headers(),
                body: formData
            })
            let data = await res.json()
            this.setState({viewingList: data.results})

        }catch(e){
            console.log(e)
        }
    }

    render(){
        console.log(this.state.viewingList)
        return(
            <div>
                {this.state.results.map(film => (
                    <div key={film.film_id}>
                        <Checkbox
                            viewingList={this.state.viewingList}
                            film_id={film.film_id}
                        />
                        <Film film={film}/>
                    </div>
                ))}
            </div>
        )
    }
}

export default ViewingList