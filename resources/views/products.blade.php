
@extends('layouts.app')

@section('content')

<?php

   if(isset($products['requests']['range'])){
           $min = $products['requests']['range'][0];
           $max = $products['requests']['range'][1];
            }else{
           $min = 150;
           $max = 450;
           }

       if(isset($products['requests']['brand'])){

           foreach($products['requests']['brand'] as $brand_id){

               $item1 = 'brand'.$brand_id;

              $checked[$item1] = 'checked="true"';

           }
          
           }



       if(isset($products['requests']['screensize'])){

           foreach($products['requests']['screensize'] as $screensize_id){

               $item2 = 'screensize'.$screensize_id;

                $checked[$item2] = 'checked="true"';

           }

          
           }

    
           if(isset($products['requests']['processor'])){

           foreach($products['requests']['processor'] as $processor_id){

               $item3 = 'processor'.$processor_id;

               $checked[$item3] = 'checked="true"';

           }

          
           }

  

?>

<div class="container">
	<div class="row">
        <div id="filter-panel" class=" filter-panel">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="get" action="filter" class="form-inline" role="form">
                        <div class="form-group col-md">
                          <div class="checkbox" style="margin-left:10px; margin-right:10px;">
                             <h5 >Brands:</h5>

    @foreach ($products['brands'] as $key => $brand)

           @php($item1 = 'brand'.$brand->id)

           @php($a = isset($checked[$item1])?$checked[$item1]:'')
 


        <p>
      <input name="brand[]" <?=$a;?>   type="checkbox" value="{{$brand->id}}" id="{{$brand->id}}" />
      <label htmlFor="{{$brand->id}}" >{{$brand->name}}</label>
    </p>
     

   
      

   @endforeach             
   </div>                  
                        </div> <!-- form group [rows] -->
                        <div class="form-group col-md">
                          <div class="checkbox" style="margin-left:10px; margin-right:10px;">
             <h5 >Processors:</h5>

      @foreach ($products['processors'] as $key => $processor)
      
         @php($item3 = 'processor'.$processor->id )

          @php($a = isset($checked[$item3])?$checked[$item3]:'')

        <p >
      <input name="processor[]"    type="checkbox" value="{{$processor->id}}" id="{{$processor->name}}" <?=$a;?> />
      <label htmlFor="{{$processor->name}}" >{{$processor->name}}</label>
    </p>
     
      


   @endforeach
   </div>
                        </div><!-- form group [search] -->
                        <div class="form-group col-md">
                          <div class="checkbox" style="margin-left:10px; margin-right:10px;">
                     <h5 >Screen sizes:</h5>

  @foreach ($products['screen_sizes'] as $key => $screen_size)
      
         @php($item2 = 'screensize'.$screen_size->id )

         @php($a = isset($checked[$item2])?$checked[$item2]:'')


        <p >
      <input name="screensize[]" <?=$a;?>    type="checkbox" value="{{$screen_size->id}}" id="{{$screen_size->screen_size}}" />
      <label htmlFor="{{$screen_size->screen_size}}" >{{$screen_size->screen_size}}</label>
    </p>
     
      

   @endforeach             
   </div>                  
                        </div> <!-- form group [order by] --> 
                        <div class="form-group col-md">    
                            <div class="checkbox" style="margin-left:10px; margin-right:10px;">
                                 <h5 >Touch screen :</h5>
          <input
            name="touch"
            type="checkbox"
            value="1"
            id="zxa" />
        <label htmlFor="zxa">TOUCH</label>

        </div>

       
                            </div>

                                                  <div class="form-group col-md">    
                            <div class="checkbox" style="margin-left:10px; margin-right:10px;">
                                  <h5 >Stock outs :</h5>
          <input
            name="availability"
            type="checkbox"

            value="1"
          
            id="sada" />
        <label htmlFor="sada">Stock outs</label>

        
       <div>
       <input type="hidden" name="_token" value="{{ csrf_token() }}">

       <input type="hidden" id="range" name="range" >

                            </div>

       <div class="form-group col-md">    
             <h5 >Price filter  :</h5>

        <div  id="test-slider"></div>

                            </div>


                          <button  type="submit" class="btn btn-default filter-col"  >
        <span class="glyphicon glyphicon-cog"></span>  Search Products
    </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    

	</div>
</div>


  
</div>


<div class="container">
<div class="title m-b-md">
<h3>Products</h3>
</div>

           <div class="container">
              <div  class="row">
        @foreach ($products['products'] as $key => $product)
          
                
                  <div key="{{$product->id}}" class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                      <img src="ss.jpg" alt="ss"/>
                      <div class="caption">
                        <h3>{{$product->name}}</h3>
                        <p>...</p>
                        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                      </div>
                    </div>
                  </div>
                

      @endforeach
         </div>
            </div>


@if(!empty($products['requests']))

{{ $products['products']->appends($products['requests'])->links() }}

@else

{{ $products['products']->links() }}

@endif

</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/10.1.0/nouislider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
 

  <script>
      
var range = document.getElementById('test-slider');

range.style.width = '200px';
range.style.margin = '41px auto 30px';

noUiSlider.create(range, {
    start: ["<?=$min;?>","<?=$max;?>"],  // 4 handles, starting at...
    margin: 300, // Handles must be at least 300 apart
                // ... but no more than 600
    connect: true, // Display a colored bar between the handles
    direction: 'ltr', // Put '0' at the bottom of the slider
    orientation: 'horizontal', // Orient the slider vertically
    behaviour: 'tap-drag', // Move handle on tap, bar is draggable
    step: 150,
    tooltips: true,
    format: wNumb({
        decimals: 0
    }),
    range: {
        'min': 0,
        'max': 1000
    },
    pips: { // Show a scale with the slider
        mode: 'steps',
        stepped: true,
        density: 4
    }
});



range.noUiSlider.on('change', ()=>{
    var ranges = range.noUiSlider.get();
    var val = document.getElementById('range');

    val.value = ranges;
   
});



  </script>
@endsection
