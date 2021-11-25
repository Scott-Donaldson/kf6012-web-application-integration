import logo from './img/logo.svg';
import './App.css';
import Films from './components/films'
function App() {
  return (
    <div className="App">
        <img src={logo} className="App-logo" alt="logo" />
        <Films/>
    </div>
  );
}

export default App;
