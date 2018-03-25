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
<script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>



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
	
.chat-window{
    bottom:0;
    position:fixed;
    float:right;
    margin-left:10px;
}
.chat-window > div > .panel{
    border-radius: 5px 5px 0 0;
}
.icon_minim{
    padding:2px 10px;
}
.msg_container_base{
  background: #e5e5e5;
  margin: 0;
  padding: 0 10px 10px;
  max-height:300px;
  overflow-x:hidden;
}
.top-bar {
  background: #666;
  color: white;
  padding: 10px;
  position: relative;
  overflow: hidden;
}
.msg_receive{
    padding-left:0;
    margin-left:0;
}
.msg_sent{
    padding-bottom:20px !important;
    margin-right:0;
}
.messages {
  background: white;
  padding: 10px;
  border-radius: 2px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  max-width:100%;
}
.messages > p {
    font-size: 13px;
    margin: 0 0 0.2rem 0;
  }
.messages > time {
    font-size: 11px;
    color: #ccc;
}
.msg_container {
    padding: 10px;
    overflow: hidden;
    display: flex;
}
img {
    display: block;
    width: 100%;
}
.avatar {
    position: relative;
}
.base_receive > .avatar:after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 0;
    height: 0;
    border: 5px solid #FFF;
    border-left-color: rgba(0, 0, 0, 0);
    border-bottom-color: rgba(0, 0, 0, 0);
}

.base_sent {
  justify-content: flex-end;
  align-items: flex-end;
}
.base_sent > .avatar:after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 0;
    border: 5px solid white;
    border-right-color: transparent;
    border-top-color: transparent;
    box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
}

.msg_sent > time{
    float: right;
}



.msg_container_base::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

.msg_container_base::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

.msg_container_base::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

.btn-group.dropup{
    position:fixed;
    left:0px;
    bottom:0;
}
p{
	color: black!important;
}
</style>
<script type="text/javascript">

$(document).on('click', '.panel-heading span.icon_minim', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('focus', '.panel-footer input.chat_input', function (e) {
    var $this = $(this);
    if ($('#minim_chat_window').hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideDown();
        $('#minim_chat_window').removeClass('panel-collapsed');
        $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('click', '#new_chat', function (e) {
    var size = $( ".chat-window:last-child" ).css("margin-left");
     size_total = parseInt(size) + 400;
    alert(size_total);
    var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
    clone.css("margin-left", size_total);
});
$(document).on('click', '.icon_close', function (e) {
    //$(this).parent().parent().parent().parent().remove();
    $( "#chat_window_1" ).remove();
});
	

</script>
@section('body')

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="back-links">
    		<p><a href="index.html"><span style="font-family:'Oswald', sans-serif;font-size:15;">Home</span></a> >>>> <a href="#"><span style="font-family:'Oswald', sans-serif;font-size:15;">{{$cat}}</span></a></p>
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
								<img src="{{URL::asset('uploaded-images/'.$data1->image )}}" style="border:2px solid;" height="200px" alt=" " />
									

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
				
					<div > 
					<a class="btn btn-danger" style="margin-left:5px;margin-top:20px;font-size:15px;" href="{{route('stuffget', ['id' => $data1->id ])}}" >Get Now !</a>
					</div>					
					<div class="clear"></div>
				</div>
				 
			</div>
			<div class="clear"></div>
		  </div>

	  <div class="pagination" style="margin-top:-1px;">
       <div class="btn-group btn-group-justified  btn-group-horizontal" >
            
            <div class="btn-group " role="group"> 
                <a id="b1"  class="btn btn-nav" href="{{route('stuffpreview', ['cat'=>$cat,'id' => $data1->id ])}}" style="background-color:#f5f5f0;border:solid 1px;" >
                    <span class="glyphicon glyphicon-file" aria-hidden="true" ></span>
                    <div class="visible-lg" style="font-family:Oswald;" >Description</div>
                </a>
              </div>

           <div class="btn-group " role="group"> 
                <a id="b1"  class="btn btn-nav" href="{{route('stuff-location', ['cat'=>$cat,'id' => $data1->id ])}}"   style="background-color:#f5f5f0;border:solid 1px;" >
                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                    <div class="visible-lg" style="font-family:Oswald;" >Location</div>
                </a>
              </div>

          <div class="btn-group " role="group"> 
                <a id="b1"  class="btn btn-nav" href="{{route('stuff-find', ['cat'=>$cat,'id' => $data1->id ])}}"  style="background-color:#f5f5f0;border:solid 1px;" >
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    <div class="visible-lg" style="font-family:Oswald;" >Direct Me</div>
                </a>
              </div>

              </div>
              </div>
              <div style="width:700px;height:600px;background-color:#f5f5f0;"  >
              @yield('div-content')
             
          
             
              </div>
			
   <div class="content_bottom">
    		<div class="heading">
    		<h3>Related Products</h3>
    		</div>
    		<div class="see">
    			<p><a href="#">See all Products</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
   <div class="section group">

				<?php $c1=0 ?>

               @for($i=0; $i<count($users); $i++)
              @if($c1++==4)@break;
               @endif
                 <div class="grid_1_of_4 images_1_of_4">
           <a href="#"><img src="{{URL::asset('uploaded-images/'.$users[$i]->image )}}" height="150px" style="margin-bottom:10px;" alt=""></a>         
          <div class="price" style="border:none">
                    <div class="add-cart" style="float:none">               
           <h4> <a href="{{route('stuffpreview', ['cat'=>$cat, 'id' => $users[$i]->id  ])}}" > More Details ! </a>
                    </h4> 
                   </div>
               <div class="clear"></div>
          </div>
        </div>
              
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
                      


    			 <div  style="margin:35px;margin-left:40px;">
    			 <span  style="font-size:20px;color:red;" >About {{$info->fname}}</span><br>
				   <div >
             
              @if($pictures!=null&&$pictures->profile!=null)
		          <a href="#"><img src="{{URL::asset('profile-images/'.$pictures->profile)}}" style="border-radius:300px;border: solid #B81D22; " width="140px;" height="140px" alt=""></a>					
					    @else
              <a href="#"><img src="{{URL::asset('profile-images/profile.jpg')}}" style="border-radius:300px;border: solid #B81D22; " width="140px;" height="140px" alt=""></a>         
              @endif
              
          <div class="price" style="border:right">
					   <div class="add-cart" style="float:none;margin:15px;">								
								<h4><a href="#">View Profile</a></h4>
							     </div>
							 <div class="clear"></div>
									</div>
								</div>
								</div>


      			<!--start of chat box!-->


    <div class="container" style="width:1500px;margin-left:-70px;">
    
    <div class="row chat-window col-xs-5 col-md-3" id="chat_window_1" style="margin-left:10px;">
        <div class="col-xs-12 col-md-12">
        	<div class="panel panel-default">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat -{{$info->fname}}</h3>
                    </div>
                    <div class="col-md-4 col-xs-4" style="text-align: right;">
                        <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                        <a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
                    </div>
                </div>
                <div class="panel-body msg_container_base" id="messages" style="height:300px;">
                    <!--sent start-->
                  
                   <!--sent end-->

                   <!--recieved start-->
                   

                    <!--recieved end -->
                    


                  
                </div>

              
       <form action="" method="POST">
       <input type="hidden" name="_token" value="{{ csrf_token() }}" >
       <input type="hidden" name="user" value="{{ Auth::user()->fname }}" >
       <input type="hidden" name="id"    value="{{ Auth::user()->id }}" >
       
                <div class="panel-footer">
                    <div class="input-group">
                        
                      
                      
                      
                      <input id="btn-input" type="text" class="form-control input-sm chat_input msg"  placeholder="Write your message here..." />
                      <span class="input-group-btn">
                      <button class="btn btn-primary btn-sm send-msg"  id="btn-chat">Send</button>
                      </span>
                    
                     </form>


                    </div>
                </div>
    		</div>
        </div>
    </div>
    
   
</div>


      			<!--end of chat box-->



 				</div>
 		</div>
 	</div>
    </div>
 </div>

 <script>
    var socket = io.connect('http://localhost:8890');
  
   


    socket.on('channel'+{{$info->id}}, function (data) {      
       data = jQuery.parseJSON(data);
        console.log(data.user);
        
          

        if(data.user!="{{Auth::user()->fname}}")
        $( "#messages" ).append(

           '<div class="row msg_container base_receive">'+
                        '<div class="col-md-2 col-xs-2 avatar">'+
                        '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class="img-responsive">'+
                        '</div>'+
                        '<div class="col-md-10 col-xs-10">'+
                            '<div class="messages msg_receive">'+
                                "<p>"+data.message+"</p>"+
                                '<time datetime="2009-11-13T20:00">Timothy • 51 min</time>'+
                            '</div>'+
                        '</div>'+
                    '</div>'

          );
        else{
        $( "#messages" ).append(  

                      '<div class="row msg_container base_sent">'+
                        '<div class="col-md-10 col-xs-10">'+
                            '<div class="messages msg_sent">'+
                                "<p>"+data.message+"</p>"+
                                '<time datetime="2009-11-13T20:00">Timothy • 51 min</time>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-2 col-xs-2 avatar">'+
                            '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">'+
                       '</div>'+
                    '</div>'
                    );
      }

      var objDiv = document.getElementById("messages");
        objDiv.scrollTop = objDiv.scrollHeight;
        
      });


    $(".send-msg").click(function(e){



        e.preventDefault();
        var msg = $(".msg").val();
        var in1=document.getElementById("btn-input");
        in1.value='';
        var token = $("input[name='_token']").val();
        var user = $("input[name='user']").val();
        var id = $("input[name='id']").val();

        if(msg != ''){
            
            $( "#messages" ).append(  

                      '<div class="row msg_container base_sent">'+
                        '<div class="col-md-10 col-xs-10">'+
                            '<div class="messages msg_sent">'+
                                "<p>"+msg+"</p>"+
                                '<time datetime="2009-11-13T20:00">Timothy • 51 min</time>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-2 col-xs-2 avatar">'+
                            '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">'+
                       '</div>'+
                    '</div>'
                    );
 var objDiv = document.getElementById("messages");
        objDiv.scrollTop = objDiv.scrollHeight;
        
            $.ajax({
                type: "POST",
                url:'{!! URL::to("sendmessage") !!}',
                dataType: "json",
                data: {'_token':token,'message':msg,'user':user,'id':id},
                
                success:function(data){
                    console.log(data);
                    $(".msg").val('');
                }
            });
        }else{
            alert("Please Add Message.");
        }
    })
</script>

@endsection
