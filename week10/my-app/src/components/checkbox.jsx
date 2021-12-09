import React from 'react'

class Checkbox extends React.Component{
    constructor(props){
        super(props)
        this.state = {checked: false}
    }

    // removeFromViewingList = async () => {
    //     let url = 'http://localhost/week11/api/viewinglist'
        
    //     let fd = new FormData()
    //     fd.append('token', localStorage.getItem('viewingListToken'))
    //     fd.append('remove', this.props.film_id)

    //     try{
    //         let res = await fetch(url, {
    //             method: "POST",
    //             headers: new Headers(),
    //             body: fd
    //         })
    //         let data = await res.json()
    //         if(data.status === 200 || data.status === 204) this.setState({checked: !this.state.checked})
    //     }catch(e){
    //         console.log(e)
    //     }
    // }
    // addToViewingList = async () => {

    //     let url = 'http://localhost/week11/api/viewinglist'
        
    //     let fd = new FormData()
    //     fd.append('token', localStorage.getItem('viewingListToken'))
    //     fd.append('add', this.props.film_id)

    //     try{
    //         let res = await fetch(url, {
    //             method: "POST",
    //             headers: new Headers(),
    //             body: fd
    //         })
    //         let data = await res.json()
    //         if(data.status === 200 || data.status === 204) this.setState({checked: !this.state.checked})
    //         else throw new Error(data.statusText)
    //     }catch(e){
    //         console.log(e)
    //     }
    // }

    addToViewingList = () => {   
        let url = "http://localhost/week11/api/viewinglist"
    
        let formData = new FormData();
        formData.append('token', localStorage.getItem('myViewingListToken'));
        formData.append('add', this.props.film_id);
    
        fetch(url, {   method: 'POST',
            headers : new Headers(),
            body:formData})
            .then( (response) => { 
                if ((response.status === 200) || (response.status === 204)) {
                    this.setState({checked:!this.state.checked})
                } else {
                    throw Error(response.statusText);
                }
            })
            .catch ((err) => { 
                console.log("something went wrong ", err) 
            });
        }
    
    removeFromViewingList = () => {
        let url = "http://localhost/week11/api/viewinglist"
         
        let formData = new FormData();
        formData.append('token', localStorage.getItem('myViewingListToken'));
        formData.append('remove', this.props.film_id);
    
        fetch(url, {  method: 'POST',
                      headers : new Headers(),
                      body:formData})
        .then( (response) => {
            if ((response.status === 200) || (response.status === 204)) {
                this.setState({checked:!this.state.checked})
            } else {
                throw Error(response.statusText);
            }
        })
        .catch ((err) => { 
            console.log("something went wrong ", err) 
        });
    }
    componentDidMount() {
        let filteredList = this.props.viewingList.filter(e => (e.film_id === this.props.film_id))
        if (filteredList.length > 0) {
            this.setState({checked: true})
        } 
    }
    handleOnChange = () => {
        if (this.state.checked) {
            this.removeFromViewingList()
        } else {
            this.addToViewingList()
        }
    }

    isOnList = (e) => {
        return (e.film_id === this.props.film_id)
    }

    render(){
        console.log(this.state.checked)
        return(
            <input
                type="checkbox"
                id="viewlist"
                name="viewList"
                value="film"
                checked={this.state.checked}
                onChange={this.handleOnChange}
            />
        )
    }
}

export default Checkbox