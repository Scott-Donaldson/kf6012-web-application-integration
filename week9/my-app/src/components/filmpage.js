import React from 'react';
import Films from './films'
import SearchBox from './searchbox';
import LanguageSelect from './languageselect';

class FilmPage extends React.Component{
    constructor(props){
        super(props)
        this.state = {
            language: "",
            search: ""
        }
        this.handleLanguageSelect = this.handleLanguageSelect.bind(this)
        this.handleSearch = this.handleSearch.bind(this)
    }

    handleLanguageSelect = e => {
        this.setState({language: e.target.value})
    }
    handleSearch = e => {
        this.setState({search: e.target.value})
    }
    render(){
        return(
            <div>
                <SearchBox search={this.state.search} handleSearch={this.handleSearch}/>
                <LanguageSelect language={this.state.language} handleLanguageSelect={this.handleLanguageSelect}/>
                <Films language={this.state.language} search={this.state.search}/>
            </div>
        )
    }
}

export default FilmPage