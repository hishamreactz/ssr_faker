import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class FilterPanel extends Component {
    constructor(props) {
    super(props);

    
      }

    render() {

        return (



<div className="row" >
    <div id="filter-panel" className="collapse filter-panel">
        <div className="panel panel-default">
            <div className="panel-body">
                <form className="form-inline" role="form">

                <div className="progress">
      <div className="indeterminate"></div>
  </div>
        

  <div className="form-group">
  <label className="filter-col" >Price range:</label>
  <select id="pref-orderby" className="form-control">
  {this.props.brands.data.map((item,i) => (
      
     
      <option key={item.brand.id}>{item.brand.name}</option>

 ))}

  </select>

  </div>

                    {/* <div className="form-group">
                        <label className="filter-col" >Search:</label>
                        <input type="text" className="form-control input-sm" id="pref-search"/>
                    </div>




                    <div className="form-group">
                        <label className="filter-col" >Order by:</label>
                        <select id="pref-orderby" className="form-control">
                            <option>Descendent</option>
                        </select>                                
                    </div>  */}

                




                </form>
            </div>
        </div>
    </div> 


    <button  type="button" className="btn btn-primary" data-toggle="collapse" data-target="#filter-panel">
        <span className="glyphicon glyphicon-cog"></span>  Search Products
    </button>
</div>



        );
    }
}

if (document.getElementById('filter')) {

    let element = document.getElementById('brands');

    let data = JSON.parse(element.value);

    console.log(data);



    ReactDOM.render(<FilterPanel brands={{data}} />, document.getElementById('filter'));
}
