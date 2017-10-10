import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class FilterPanel extends Component {
    constructor(props) {
    super(props);

      this.state = {

        brands:[],
        processors:[],
        screensizes:[],
        touch:false,
        availability:false,
        range:'',

      };

    this.handleInputChange = this.handleInputChange.bind(this);
      }

handleInputChange(event) {
    const target = event.target;
    const value = target.type === 'checkbox' ? target.checked : target.value;
    const name = target.name;

    if(JSON.stringify(value) == "true") { 

      if(name ==  'brand'){

      this.state.brands.indexOf(target.value) != -1 ? '': this.state.brands.push(target.value);

    }

    if(name ==  'screensize'){

      this.state.screensizes.indexOf(target.value) != -1 ? '': this.state.screensizes.push(target.value);

    }

    if(name ==  'processor'){

      this.state.processors.indexOf(target.value) != -1 ? '': this.state.processors.push(target.value);

    }

      if(name ==  'touch'){

       this.state.touch =  true;
    }

       if(name ==  'availability'){

       this.state.availability = true;
    }

    this.state.range =  localStorage.getItem('range');

    }else if(JSON.stringify(value) == "false") { 

      if(name ==  'brand'){ 

        var index = this.state.brands.indexOf(target.value);

        index > -1 ? this.state.brands.splice(index, 1):'';

      }

      if(name ==  'processor'){ 

        var index = this.state.processors.indexOf(target.value);

        index > -1 ? this.state.processors.splice(index, 1):'';

      }

     if(name ==  'screensize'){

        var index = this.state.screensizes.indexOf(target.value);

        index > -1 ? this.state.screensizes.splice(index, 1):'';

      }

      if(name ==  'touch'){

       this.state.touch =  false;
    }

       if(name ==  'availability'){

       this.state.availability = false;
    }


    this.state.range =  localStorage.getItem('range');


   }else{

    this.setState({
      [name]: value
    });

    this.state.range =  localStorage.getItem('range');

  }




    console.log(this.state);
  }


    render() {




        return (



<div className="row" >
    <div id="filter-panel" className=" filter-panel">
        <div className="panel panel-default">
            <div className="panel-body">

                <form method="post" action="filter" className="form-inline" role="form">



<input type="hidden" name="_token" value={this.props.brands.csrf}/>

  <div className="form-group col">
  <h5 >Brands:</h5>

  {this.props.brands.brands.data.map((item,i) => (
      


        <p key={item.brand.id}>
      <input name="brand[]" onChange={this.handleInputChange} type="checkbox" value={item.brand.id} id={item.brand.id} />
      <label htmlFor={item.brand.id} >{item.brand.name}</label>
    </p>
     
      

 ))}


  </div>




  <div className="form-group col">
  <h5 >Processors:</h5>

  {this.props.brands.processors.data.map((item,i) => (
      


        <p key={item.processor.id}>
      <input name="processor[]" onChange={this.handleInputChange} type="checkbox" value={item.processor.id} id={item.processor.name} />
      <label htmlFor={item.processor.name} >{item.processor.name}</label>
    </p>
     
      

 ))}


  </div>


  <div className="form-group col">
  <h5 >Screen sizes:</h5>

  {this.props.brands.screen_sizes.data.map((item,i) => (
      


        <p key={item.screen_size.id}>
      <input name="screensize[]" onChange={this.handleInputChange} type="checkbox" value={item.screen_size.id} id={item.screen_size.screen_size} />
      <label htmlFor={item.screen_size.screen_size} >{item.screen_size.screen_size}</label>
    </p>
     
      

 ))}


  </div>


  <div className="form-group col">
  <h5 >Touch screen :</h5>
          <input
            name="touch"
            type="checkbox"
            onChange={this.handleInputChange}
            id="zxa" />
        <label htmlFor="zxa">TOUCH</label>

        <input type="hidden" name="range" value={localStorage.getItem('range')}/>

      </div>

        <div className="form-group col">
  <h5 >Stock outs :</h5>
          <input
            name="availability"
            type="checkbox"
            onChange={this.handleInputChange}
            id="sada" />
        <label htmlFor="sada">Stock outs</label>

      </div>

              <div className="form-group col">
  <h5 >Price filter  :</h5>

        <div  id="test-slider"></div>

        </div>

    <button  type="submit" className="btn btn-primary valign-wrapper"  >
        <span className="glyphicon glyphicon-cog"></span>  Search Products
    </button>

                </form>
            </div>
        </div>
    </div> 


  
</div>



        );
    }
}

if (document.getElementById('filter')) {



    let element = document.getElementById('brands');

    let data = JSON.stringify(element.value);

    console.log(data);




    // ReactDOM.render(<FilterPanel brands={{data}} />, document.getElementById('filter'));
}
