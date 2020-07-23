import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Example from './Example';

function manejarEvento () {
   // render () {
    // return (
    window.alert("Se registro una venta");
    // )
  // }
}
const List = (props) => (


          <table className="table">
            <thead className="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Creador</th>
                <th scope="col">Descripcion</th>
              </tr>
            </thead>


              {props.items.map(producto =>
                <tr>
                  <th scope="row">{producto.id}</th>
                  <th scope="row">{producto.nombre}</th>
                  <td>{producto.creador}</td>
                  <td>{producto.descripcion}</td>
                </tr>
              )}
        </table>


)
const ListStock = (props) => (

          <table className="table">
            <thead className="thead-dark">
              <tr>
                <th scope="col">Contenido</th>
                <th scope="col">Precio</th>
                <th scope="col">Disponibles</th>
              </tr>
            </thead>


              {props.items.map(producto =>
                <tr>
                  <th scope="row">{producto.contenido}</th>
                  <td>{producto.precio}</td>
                  <td>{producto.disponibles}</td>
                  <td><button class="btn btn-success" onClick={manejarEvento}>VENDER</button></td>
                </tr>
              )}
        </table>


)
export default class Saludo extends React.Component {
  constructor() {
      super();

      this.state = {
          showComponent: false,
          value: 1,
          done: false,
          button: "Mostrar detalles de stock",
          items: []
      };
      this._onButtonClick = this._onButtonClick.bind(this);
      this.handleChange = this.handleChange.bind(this);
  }

  componentDidMount() {
      fetch('http://127.0.0.1:8000/api/productos/showPerfumes?email=vendedor@gmail.com&password=asdasdas')
      .then(result=>result.json())
      .then(items=>this.setState({
          done: true,
          items
      }))
  }
  _onButtonClick() {
    this.state.showComponent ?
    this.setState({showComponent: false,button: "Mostrar detalles de stock",}) :
    this.setState({
      showComponent: true,button: "Ocultar detalles de stock",
    });



  }
  handleChange(event) {
  this.setState({value: event.target.value});
}
    render(){
        return (

              <div>
                  <div>
                  <tr>
                  <input required type="number" min="0" onChange={this.handleChange} name="ID_PROD" class="form-control" placeholder="ID del producto"/>
                  <button class="btn btn-success" onClick={this._onButtonClick}>{this.state.button}</button>

                  </tr>
                    {this.state.showComponent ?
                      <Child message={this.state.value}></Child> :
                       null
                    }
                  </div>
                  {this.state.done ? (
                      <List items={this.state.items} />
                  ) : (
                      <p>Cargando resultados...</p>
                  )}

              </div>

        );
    }
}


class Child extends React.Component {
  constructor() {
      super();
      this.state = {
          done: false,
          items: []
      };
  }
  componentDidMount() {
      fetch('http://127.0.0.1:8000/api/productos/showStock?email=vendedor@gmail.com&password=asdasdas&producto_id=' + this.props.message)
      .then(result=>result.json())
      .then(items=>this.setState({
          done: true,
          items
      }))
  }
  render(){
      return (

            <div>
                <h1>Mostrando detalles del producto con ID: {this.props.message}</h1>
                {this.state.done ? (
                    <ListStock items={this.state.items} />
                ) : (
                    <p>Cargando resultados...</p>
                )}

            </div>

      );
  }
}

if (document.getElementById('saludo')) {
    ReactDOM.render(<Saludo />, document.getElementById('saludo'));
}
