import React from 'react';
import Films from './films'
import SearchBox from './searchbox';
import LanguageSelect from './languageselect';
import PageSizeSelect from './pagesizeselect';

class FilmPage extends React.Component{
    constructor(props){
        super(props)
        this.state = {
            language: "",
            search: "",
            page: 1,
            pageSize: 10
        }
        this.handleLanguageSelect = this.handleLanguageSelect.bind(this)
        this.handleSearch = this.handleSearch.bind(this)
        this.handlePageSizeSelect = this.handlePageSizeSelect.bind(this)

        this.handlePreviousClick = this.handlePreviousClick.bind(this)
        this.handleNextClick = this.handleNextClick.bind(this)
    }

    handleLanguageSelect = e => {
        this.setState({language: e.target.value, page: 1})
    }
    handlePageSizeSelect = e => {
        this.setState({pageSize: parseInt(e.target.value), page: 1})
    }
    handleSearch = e => {
        this.setState({search: e.target.value, page: 1})
    }

    handlePreviousClick = () => {
        this.setState({page: this.state.page-1})
    }

    handleNextClick = () => {
        this.setState({page: this.state.page+1})
    }

    render(){
        return(
            <div>
                <SearchBox search={this.state.search} handleSearch={this.handleSearch}/>
                <LanguageSelect language={this.state.language} handleLanguageSelect={this.handleLanguageSelect}/>
                <PageSizeSelect pageSize={this.state.pageSize} handlePageSizeSelect={this.handlePageSizeSelect}/>
                <Films 
                    language={this.state.language} 
                    search={this.state.search} 
                    page={this.state.page} 
                    pageSize={this.state.pageSize}
                    handlePreviousClick={this.handlePreviousClick}
                    handleNextClick={this.handleNextClick}
                />

            </div>
        )
    }
}

export default FilmPage