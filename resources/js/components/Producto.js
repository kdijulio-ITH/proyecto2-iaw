import React, { Component } from 'react';
import ReactDOM from 'react-dom';

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
                  <td><button className="btn btn-success" onClick={manejarEvento}>VENDER</button></td>
                </tr>
              )}
        </table>


)
export default class Producto extends React.Component {
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
      fetch('https://proyecto-2-kevindijulio.herokuapp.com/api/productos/showPerfumes?email=vendedor@gmail.com&password=asdasdas')
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
                  <td>
                  <input required type="number" min="0" onChange={this.handleChange} name="ID_PROD" className="form-control" placeholder="ID del producto"/>
                  <button className="btn btn-success" onClick={this._onButtonClick}>{this.state.button}</button>

                  </td>
                    {this.state.showComponent ?
                      <Stock message={this.state.value}></Stock> :
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


class Stock extends React.Component {
  constructor() {
      super();
      this.state = {
          done: false,
          items: []
      };
  }
  componentDidMount() {
       fetch('https://proyecto-2-kevindijulio.herokuapp.com/api/productos/showStock?email=vendedor@gmail.com&password=asdasdas&producto_id=' + this.props.message)
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

if (document.getElementById('producto')) {
    ReactDOM.render(<Producto />, document.getElementById('producto'));
}
