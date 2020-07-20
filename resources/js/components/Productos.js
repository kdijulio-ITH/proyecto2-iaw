import React, { Component } from 'react';
import ReactDOM from 'react-dom';

const List = (props) => (
    <ul>
        {
            props.items.map((item, i) => {
                return <li key={i}>{item}</li>
            })
        }
    </ul>
)

class Productos extends Component {
    constructor() {
        super();
        this.state = {
            done: false,
            items: []
        };
    }

    componentDidMount() {
        fetch('http://127.0.0.1:8000/api/productos/showPerfumes?email=vendedor@gmail.com&password=asdasdas')
        .then(result=>result.json())
        .then(items=>this.setState({
            done: true,
            items
        }))
    }

    render() {
        return(
            <div>
                {this.state.done && this.state.items.isArray() ? (
                    <List items={...this.state.items} />
                ) : (
                    <p>Cargando resultados...</p>
                )}
            </div>
        )
    }
}

export default Productos

if (document.getElementById('productos')) {
    ReactDOM.render(<Productos />, document.getElementById('productos'));
}
