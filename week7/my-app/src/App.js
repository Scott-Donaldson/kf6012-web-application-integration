import './App.css';
import React from 'react'
function App() {
  return (
    <div className="app">
      {["A","B","C"].map( x => (<Hello name={x}/>))}
    </div>
  );
}

class Hello extends React.Component{
  render(){
    return(
      <p>Hello, {this.props.name}</p>
    )
  }
}

class Goodbye extends React.Component{
  render(){
    return(
      <p>Goodbye, {this.props.name}</p>
    )
  }
}

export default App;
