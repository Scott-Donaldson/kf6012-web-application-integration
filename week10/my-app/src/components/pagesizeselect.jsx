import React from 'react'

class PageSizeSelect extends React.Component{
    render(){
        return(
            <label>
            Number Displayed:
            <select value={this.props.pageSize} onChange={this.props.handlePageSizeSelect}>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </label>
        )
    }
}

export default PageSizeSelect