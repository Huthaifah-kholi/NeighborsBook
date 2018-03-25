@extends('layouts.master')
@section('links')

@endsection
@section('body')

  <div class="section group">

           
               @for($i=0; $i<count($data); $i++)
          
                <div class="grid_1_of_4 images_1_of_4" style="margin-left:20px; border-radius: 15px;border: 2px solid black;">
                     <a href="preview.html"><img src="{{URL::asset('uploaded-images/'.$data[$i]->image )}}" alt="" width="212px" height="212px" /></a>
                     <h2><span style="color:black">Name:{{$data[$i]->fname}}<br>{{$data[$i]->name}}<br></span> <span style="color:red;text-transform:none"> </span></h2>
                    <div class="price-details">
                       <div class="price-number">
                            @if($data[$i]->distance<1)
                            <p><span class="rupees" style="color:black">{{floor($data[$i]->distance*1000)}}m</span></p>
                           @else 
                           <p><span class="rupees" style="color:black" >{{floor($data[$i]->distance)}} Km</span></p>
                           @endif
                        </div>
                                <div class="add-cart">                              
                                    <h4>
                            <a href="{{route('stuffpreview', ['cat'=> $cat , 'id' => $data[$i]->id  ])}}" > More Details ! </a>
                                    </h4>
                                 
                                 </div>
                             <div class="clear"></div>
                    </div>
               
                </div>
              
                @endfor

            </div>



@endsection
