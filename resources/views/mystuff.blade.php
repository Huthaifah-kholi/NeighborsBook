@extends('layouts.master')
<title>Free Home Shoppe Website Template | Preview :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="text/javascript" src="{{URL::asset('js/jquery-1.7.2.min.js')}}"></script> 
<script type="text/javascript" src="{{URL::asset('js/move-top.js')}}" ></script>
<script type="text/javascript" src="{{URL::asset('js/easing.js')}}" ></script>
<script src="{{URL::asset('js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
<link   href="{{URL::asset('css/easy-responsive-tabs.css')}}" rel="stylesheet" type="text/css" media="all"/>
<link   rel="stylesheet" href="{{URL::asset('css/global.css')}}">
<script src="{{URL::asset('js/slides.min.jquery.js')}}" ></script>
<link href="{{URL::asset('css/profile.css')}}"  rel="stylesheet" type="text/css" media="all"/>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>




<style type="text/css">
@import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
 
            .rating { 
                float: left;
                margin-top: -28px;
                margin-left:60px;

            }
 
            .rating > input { display: none; } 
            .rating > label:before { 
                margin: 3px;
                font-size: 1.25em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }
 
 
            .rating > label { 
                color: #ddd; 
                float: right; 
                color:lightgray;

                
            }

            .score{
             color: #FFD700;
            }

            



</style>




<style type="text/css">
	.product-desc,.product-tags{
	clear:both;
	padding-top:20px;
}
.product-desc h2{
	padding:8px 20px;
	background:black;
	border: 1px solid #EBE8E8;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	font-family: 'Monda', sans-serif;
	font-size:1.2em;
	color:white !important;
	text-transform: uppercase;
	text-shadow:0 1px 5px rgba(34, 34, 34, 0.17);
}
.product-desc p{
	font-size: 0.8em;
	padding: 0.3em 0;
	color: #969696;
	line-height: 1.6em;
	font-family: verdana, arial, helvetica, helve, sans-serif;
}
</style>


<style type="text/css">

.span1{
color:blue;
font-family:Times;

}
.span2{
color:blue;
font-family:Times;

}
.span3{
color:red;
font-family:Times;

}

.modal {
  text-align: center;
}

@media screen and (min-width: 768px) { 
  .modal:before {
    display: inline-block;
    vertical-align: middle;
    content: " ";
    height: 100%;

  }
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}

</style>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>



@section('body')

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="back-links">
    		<p><a href="index.html"><span style="font-family:'Oswald', sans-serif;font-size:15;">Home</span></a> >>>> <a href="#"><span style="font-family:'Oswald', sans-serif;font-size:15;">Electronics</span></a></p>
    	    </div>
    		<div class="clear"></div>
    	</div>
    	<div class="section group">
				<div class="cont-desc span_1_of_2">
				  <div class="product-details">				
					<div class="grid images_3_of_2">
						<div id="container">
						   <div id="products_example">
							   <div id="products">
								<img src="{{URL::asset('uploaded-images/'.$data1->image )}}" style="border:2px solid" width="300px;" height="200px" alt=" " />
									

								<ul >
									<!--somthing here-->
								</ul>
							</div>
						</div>
					</div>
				</div>
				  <div class="desc span_3_of_2">
          <span style="font-size:20px;color:black;">Name:</span> <span style="font-size:20px;color:black;"> {{$data1->name}} </span>
            
          <div class="price">
          @if($data1->type=="forfree")
          <p style="font-size:20px; margin-top:5px;color:black;">type: <span style="font-size:20px;">Unretarined</span></p>
          @else
          <p style="font-size:20px; margin-top:5px;color:black;">type: <span style="font-size:20px;">Limited</span></p>
          <p style="font-size:20px; margin-top:-20px;color:black;">Did Line:<span style="font-size:20px;;color:red;"> {{$data1->didline}}</span> <span style="font-size:20px;"></span></p>
          @endif
          </div>
				<div class="share-desc" style="margin-top:-20px">
					<div class="share">
											</div>
					<div >
          @if($data1->type=="forfree") 
					<a class="btn btn-danger btn-md" data-toggle="modal" data-target="#unModal" style="margin-left:20px;margin-top:37px;font-size:15px;width:150px;" >Update</a>
          @else
          <a class="btn btn-danger btn-md" data-toggle="modal" data-target="#retModal" style="margin-left:20px;margin-top:37px;font-size:15px;width:150px;" >Update</a>
          @endif
          </div>					
					<div class="clear"></div>


           <!--model-->
  <div id="retModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:black;padding:15px;">
        <button type="button" class="close" style="color:red;" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-size:20px;color:white;">Update Window</h4>
      </div>
      <div class="modal-body" style="background-color:;">
      
      <!-- start -->

        <form role="form">
        <br style="clear:both">
        <div class="form-group">
        <input type="text" class="form-control" id="name" name="name" placeholder="Update Name" required>
        </div>

          <div class="form-group">
          <input type="file" class="form-control" id="file" name="file" placeholder="Update Image" required>
          </div>

          <div class="form-group">
          
          <input size="60" maxlength="255"  onfocus="(this.type='date')" value="" class="form-control" placeholder="I want to expand the died line to this date " name="didline" id="UserRegistration_lname" type="">
               
          </div>

        <div class="form-group">
        <textarea class="form-control" type="textarea" id="message" placeholder="Description" maxlength="140" rows="7"></textarea>
        </div>
            
        <a  id="submit" name="submit" class="btn btn-primary pull-right" href="{{route('mystuff', ['id' => $data1->id  ])}}" >Submit Updates</a>
        <a  href="" class="btn btn-danger" data-dismiss="modal">Close</a>

        </form>

      <!-- end -->
      </div>
             
          

        </div>

      </div>
    </div>
    <!--end model-->

     <!-- unretarined -->
        <!--model-->
  <div id="unModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:black;padding:15px;">
        <button type="button" class="close" style="color:red;" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-size:20px;color:white;">Update Window</h4>
      </div>
      <div class="modal-body" style="background-color:;">
      <!-- start -->

        <form role="form">
        <br style="clear:both">
        <div class="form-group">
        <input type="text" class="form-control" id="name" name="name" placeholder="Update Name" required>
        </div>

          <div class="form-group">
          <input type="file" class="form-control" id="file" name="file" placeholder="Update Image" required>
          </div>

        <div class="form-group">
        <textarea class="form-control" type="textarea" id="message" placeholder="Description" maxlength="140" rows="7"></textarea>
        </div>
            
        <a  id="submit" name="submit" class="btn btn-primary pull-right" href="{{route('mystuff', ['id' => $data1->id  ])}}" >Submit Updates</a>
        <a  href="" class="btn btn-danger" data-dismiss="modal">Close</a>

        </form>

      <!-- end -->
      </div>
             
          

        </div>

      </div>
    </div>
    <!--end model-->

     <!-- end unretarnied -->

				</div>
				 
			</div>
			<div class="clear"></div>
		  </div>


	       <div class="product-desc" >
	       
			<h2>Stuff Details</h2>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	       </div>

	       <div class="product-desc">
			<h2>Neighbours Orders</h2>
             <!---->
           <div class="content_bottom">
        
     

   <div class="section group">
          @for($i=0; $i<count($users); $i++)

          <div class="grid_1_of_4 images_1_of_4" style="margin:5px" >
          
          @if($users[$i]->profile!=null)
          <a href="#"><img src="{{URL::asset('profile-images/'.$users[$i]->profile)}}" height="110px" width="200px" class="img-circle"  alt=""></a>         
          @else 
          <a href="#"><img src="{{URL::asset('profile-images/profile.jpg')}}" height="110px" width="200px" class="img-circle"  alt=""></a>
          @endif
          <div class="price" style="border:none">
          <div class="add-cart" style="float:none;margin-top:10px;"> 
          <span class="span1">{{ $users[$i]->fname }}</span><br> 
           @if($users[$i]->distance<1)
           <span class="span3" >{{floor($users[$i]->distance*1000)}}m away</span>
           @else 
           <span class="span3">{{floor($users[$i]->distance)}} Km away</span>
           @endif
      
       <input type="hidden" name="_token" value="{{ csrf_token() }}" >
       <input type="hidden" name="user" value="{{ Auth::user()->fname }}" >
       <input type="hidden" name="id"    value="{{ Auth::user()->id }}" >
       <input type="hidden" name="stuff"    value="{{ $data1->name }}" >

          <h4><a href="{{('/thanks')}}" class="send-msg" data-stuffid="{{$users[$i]->stuff_id}}"  id="{{$users[$i]->user_id}}">approve</a></h4>
          </div>
          <div class="clear"></div>
          </div>

          </div>

      @endfor
        
      </div>
      </div>

             <!---->

             <!--model-->
  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:black;padding:15px;">
        <button type="button" class="close" style="color:red;" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-size:20px;color:white;">Confirmation</h4>
      </div>
      
      <div class="modal-body" style="background-color:;">
        <p style="font-size:20px;font-family: 'Oswald';">Are you sure ? Do you want really to lent this stuff to your neighbor ?</p>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" >
       <input type="hidden" name="user" value="{{ Auth::user()->fname }}" >
       <input type="hidden" name="id"    value="{{ Auth::user()->id }}" >
      </div>
             
             <div class="modal-footer" style="padding:15px;">

            <a type="button" href="" class="btn btn-success  " >OK</a>
		        <a type="button" href="" class="btn btn-danger" data-dismiss="modal">Close</a>
		      </div>

		    </div>

		  </div>
		</div>
    <!--end model-->

	       </div>


             
			
   <div class="content_bottom">
    		<div class="heading"  >
    		<h3 >Related Stuff</h3>
    		</div>

    		<div class="see">
    			<p><a href="#">See all Products</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
   <div class="section group">

				<?php $c1=0 ?>

               @for($i=0; $i<count($related); $i++)
               @if($related[$i]->id !=Auth::user()->id && $related[$i]->type =="fordate")
                @if($c1++==4)@break;
               @endif
                 <div class="grid_1_of_4 images_1_of_4">
           <a href="#"><img src="{{URL::asset('uploaded-images/'.$related[$i]->image )}}" height="150px" alt=""></a>         
          <div class="price" style="border:none">
                    <div class="add-cart" style="float:none">               
           <h4> <a href="{{route('stuffpreview', ['id' => $related[$i]->id  ])}}" > More Details ! </a>
                    </h4> 
                   </div>
               <div class="clear"></div>
          </div>
        </div>
               @endif
                @endfor
			
      </div>
        </div>
				<div class="rightsidebar span_3_of_1">
					
				<div class="categories" style="border:2px solid #B81D22;" >
                  <ul>
                    <h3>Categories</h3>
                     <li><a href="#" >DVDs</a></li>
                     <li><a href="#">Sports &amp; Fitness</a></li>
                     <li><a href="#">Computer Games</a></li>
                     <li><a href="#">Bocks</a></li>
                     <li><a href="#">Clothing</a></li>
                     <li><a href="#">Beauty &amp; Healthcare</a></li>
                     <li><a href="#">Toys, Kids &amp; Babies</a></li>
                     <li><a href="#">Books</a></li>
                     <li><a href="#">Garden Equipment</a></li>
                     <li><a href="#">Furniture</a></li>
                     <li><a href="#">Electrical</a></li>
                     <li><a href="#">Others</a></li>
                  </ul>
                </div>  
                      


    			 

      			<!--start of chat box!-->



      			<!--end of chat box-->



 				</div>
 		</div>
 	</div>
    </div>
 </div>

 <script>
 
       
    
    $(".send-msg").click(function(e){
       // e.preventDefault();

        var token = $("input[name='_token']").val();
        var user = $("input[name='user']").val();
        var id = $("input[name='id']").val();
        var stuff = $("input[name='stuff']").val();
        var des_id = e.target.id;
        var stuff_id = $(this).attr('data-stuffid')
            $.ajax({
                type: "POST",
                url:'{!! URL::to("sendNotifications") !!}',
                dataType: "json",
                data: {'_token':token,'id':id,'user':user,'des_id':des_id,'stuff':stuff,'stuff_id':stuff_id},
                success:function(data){
                    console.log("success");                    
                }
            });
        
        
    })
</script>

@endsection
