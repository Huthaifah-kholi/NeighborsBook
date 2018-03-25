@extends('layouts.profile-master')
@section('Link')
<style type="text/css">
  .categories{
  border:1px solid #B81D22;
  background-color: white;
}
.categories h3{
  font-size:1.2em;
  color:#FFF;
  padding:10px;
  background:#B81D22;
  text-transform:uppercase;
  font-family: 'ambleregular';  
}
.categories li a{
  display:block;
  font-size:0.8em;
  padding:8px 15px;
    color: black;
    font-family: 'ambleregular';
    margin:0 20px;
    background:url(../images/drop_arrow.png) no-repeat 0;
    border-bottom: 1px solid #EEE;
    text-transform:uppercase; 
}
.categories li:last-child a{
  border:none;
}
.categories li a:hover{
  color:#B81D22;
}

.header_bottom_left{
  float:left;
  width:100%;
}

.images_1_of_4 {
  width: 28.8%;
  padding: 1.5%;
  text-align: center;
  position: relative;
}
.images_1_of_4  img {
  max-width: 100%;
}
.images_1_of_4  h2 {
  color:#6A82A4;
  font-family: 'ambleregular';
  font-size:1.1em;
  font-weight: normal;
}
.images_1_of_4  p {
  font-size: 0.8125em;
  padding: 0.4em 0;
  color: #333;
}
.images_1_of_4  p span.price {
  font-size: 18px;
  font-family: 'ambleregular';
  color:#CC3636;
}

.row{

}

.grid_1_of_4 {
  display: block;
  float: left;
  height:20%;
}


</style>

@endsection

@section('info')
   <div class="container">
   <div class="row" >
    <div  class="col-lg-3" style="margin-left:-20px;" >

     
      <div class="header_bottom_left">                
                <div class="categories">
                  <ul>
                    <h3>Categories</h3>
                       <li><a href="{{route('categories', ['id' => 'dvds'])}}" >DVDs</a></li>
                       <li><a href="{{route('categories', ['id' => 'sports'])}}">Sports &amp; Fitness</a></li>
                       <li><a href="{{route('categories', ['id' => 'games'])}}">Computer Games</a></li>
                       <li><a href="{{route('categories', ['id' => 'books'])}}">Bocks</a></li>
                       <li><a href="{{route('categories', ['id' => 'clothings'])}}">Clothing</a></li>
                       <li><a href="{{route('categories', ['id' => 'beaties'])}}">Beauty &amp; Healthcare</a></li>
                       <li><a href="{{route('categories', ['id' => 'toys'])}}">Toys, Kids &amp; Babies</a></li>
                       <li><a href="{{route('categories', ['id' => 'gardens'])}}">Garden Equipment</a></li>
                       <li><a href="{{route('categories', ['id' => 'furnitures'])}}">Furniture</a></li>
                       <li><a href="{{route('categories', ['id' => 'electricals'])}}">Electrical</a></li>
                       <li><a href="{{route('categories', ['id' => 'others'])}}">Others</a></li>
                  </ul>
                </div>  

             </div>
s
    </div>

    <div  class="col-lg-9" style="margin-left:0px;">

    <div class="section group">

               <?php $c2=0 ?>
                
                @for($i=0; $i<count($orderd); $i++)
               
                <div class="grid_1_of_4 images_1_of_4" style="margin-left:20px; border-radius: 15px;border: 2px solid black;">
                     <a href="preview.html"><img src="uploaded-images/{{$orderd[$i]->image}}" alt="" width="200px" height="200px" /></a>
                     <h2> <span style="color:black"> Name:{{$orderd[$i]->name}}<br>
                     @if($orderd[$i]->type=="forfree")
                     <span style="color:red;">Unretarined</span> 
                     @else
                     <span style="color:red;">Died Line: {{$orderd[$i]->didline}}</span> 
                     @endif
                     </span></h2>
                    <div class="price-details">
                       <div class="price-number">
                     
                      <p><span class="rupees" style="color:black;font-size:15px;"><span style="color:red;">{{$orderd[$i]->count}}</span> orders</span></p>
                          
                        </div>
                                <div class="add-cart">                              
                                    <h4><a href="{{route('mystuff', ['id' => $orderd[$i]->stuff_id  ])}}">More Details</a></h4>
                                 </div>
                             <div class="clear"></div>
                    </div>
               
                </div>
              @endfor

              @for($i=0; $i<count($unorderd); $i++)
                @if($unorderd[$i]->stuff_id==null)
                <div class="grid_1_of_4 images_1_of_4" style="margin-left:20px; border-radius: 15px;border: 2px solid black;">
                     <a href="preview.html"><img src="uploaded-images/{{$unorderd[$i]->image}}" alt="" width="200px" height="200px" /></a>
                     <h2> <span style="color:black">{{$unorderd[$i]->name}}<br>
                     @if($unorderd[$i]->type=="forfree")
                     <span style="color:red;">Unretarined</span> 
                     @else
                     <span style="color:red;">Died Line: {{$unorderd[$i]->didline}}</span> 
                     @endif
                     </span></h2>
                    <div class="price-details">
                       <div class="price-number">
                     
                      <p><span class="rupees" style="color:black;font-size:15px;"> <span style="color:red;">No</span> orders</span></p>
                          
                        </div>
                                <div class="add-cart">                              
                                    <h4><a href="{{route('mystuff', ['id' => $unorderd[$i]->id  ])}}">More Details</a></h4>
                                 </div>
                             <div class="clear"></div>
                    </div>
               
                </div>
                 @endif
                 @endfor
               

            </div>


             </div>

   
           

             </div>
             </div>

@endsection

    
