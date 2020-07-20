import React, { Component } from 'react';
import ReactDOM from 'react-dom';


// componentWillMount() {
//     fetch('http://127.0.0.1:8000/api/productos/showPerfumes?email=vendedor@gmail.com&password=asdasdas')
//       .then((response) => {
//         return response.json()
//       })
//       .then((productos) => {
//         this.setState({ productos: productos })
//       })
//   }
const List = (props) => (
    // <ul>
        // {
        //     props.items.map => {
        //         return <div>hola  </div>
        //     })
        //
        // }

        <div className="col">
          <h1>Mi Stock</h1>
          <h3>Nombres de productos</h3>
          {props.items.map(producto => <h4>{producto.nombre}</h4>)}
      </div>
    // </ul>
)
export default class Saludo extends Component {
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

    render(){
        return (

              <div>
                  {this.state.done ? (
                      <List items={this.state.items} />
                  ) : (
                      <p>Cargando resultados...</p>
                  )}
              </div>

        );
    }
}

// export defsault Saludo;

if (document.getElementById('saludo')) {
    ReactDOM.render(<Saludo />, document.getElementById('saludo'));
}
