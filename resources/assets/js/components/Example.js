import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {
    constructor(props) {
    super(props);
    
      }

    render() {

        return (
            <div className="container">
              <div  className="row">
         {this.props.products.data.map(item => (
          
                
                  <div key={item.id} className="col-sm-6 col-md-4">
                    <div className="thumbnail">
                      <img src="ss.jpg" alt="ss"/>
                      <div className="caption">
                        <h3>{item.name}</h3>
                        <p>...</p>
                        <p><a href="#" className="btn btn-primary" role="button">Button</a> <a href="#" className="btn btn-default" role="button">Button</a></p>
                      </div>
                    </div>
                  </div>
                

         ))}
         </div>
            </div>
        );
    }
}

if (document.getElementById('example')) {

    let element = document.getElementById('data');

    let data = JSON.stringify(element.value);

    data = JSON.parse(data);

    console.log(data);



    // ReactDOM.render(<Example products={{data}}/>, document.getElementById('example'));
}
