import React from 'react'
import Logout from '../logout'
import Login from './login'
import ViewingList from './viewinglist'

class ViewingListPage extends React.Component{
    constructor(props){
        super(props)
        this.state = {
            authenticated: false,
            email: "",
            password: ""
        }

        this.handleEmail = this.handleEmail.bind(this)
        this.handlePassword = this.handlePassword.bind(this)
        this.handleLoginClick = this.handleLoginClick.bind(this)
        this.handleLogoutClick = this.handleLogoutClick.bind(this)
    }

    handlePassword = (e) => {
        this.setState({password: e.target.value})
    }
    handleEmail = (e) => {
        this.setState({email: e.target.value})
    }
    handleLogoutClick = (e) => {
        this.setState({authenticated: false})
        localStorage.removeItem('viewingListToken')
    }
    handleLoginClick = async (e) => {
        let url = 'http://localhost/week11/api/authenticate'
        let formData = new FormData()
        formData.append('email', this.state.email)
        formData.append('password', this.state.password)

        try{
            let res = await fetch(url, {
                method: "POST",
                headers: new Headers(),
                body: formData
            })
            let data = await res.json()
            if('token' in data.results) {
                this.setState({authenticated: true})
                localStorage.setItem('viewingListToken', data.results.token)
            }
        }catch(e){
            console.log(e)
        }

        /**
        * id - 1
        * email - john@example.com
        * password - johnpassword
        */

    }
    componentDidMount(){
        if(localStorage.getItem('viewingListToken')) this.setState({authenticated: true})
    }

    render(){
        let page = (
            <Login
                handleEmail={this.handleEmail}
                handlePassword={this.handlePassword}
                handleLoginClick={this.handleLoginClick}
            />
        )
        if(this.state.authenticated) page = (
            <div>
            <Logout
                email={this.state.email}
                handleLogoutClick={this.handleLogoutClick}
            />
            <ViewingList/>
            </div>
        )

        return(<div>{page}</div>)
    }
}

export default ViewingListPage