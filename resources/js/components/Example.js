import React from 'react';
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
function Example() {

        // var data = fetch('http://127.0.0.1:8000/api/productos/showPerfumes?email=vendedor@gmail.com&password=asdasdas')
        //   .then((response) => {
        //     return response.json()
        //   })
        //
        // console.log(data);



    return (
        // const promise = fetch('http://127.0.0.1:8000/api/productos/showPerfumes?email=vendedor@gmail.com&password=asdasdas', "");

        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component asdasd</div>

                        <div className="card-body">I'm an example component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
