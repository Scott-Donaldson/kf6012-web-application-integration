import React from 'react';

class LanguageSelect extends React.Component{
    constructor(props){
        super(props)
    }
    render(){
        return(
            <label>
            Language:
            <select value={this.props.language} onChange={this.props.handleLanguageSelect}>
                <option value="">Any</option>
                <option value="English">English</option>
                <option value="Italian">Italian</option>
                <option value="French">French</option>
                <option value="German">German</option>
                <option value="Japanese">Japanese</option>
                <option value="Mandarin">Mandarin</option>
            </select>
        </label>
        )
    }
}

export default LanguageSelect