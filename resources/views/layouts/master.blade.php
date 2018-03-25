<!DOCTYPE HTML>
<head>
<title>Free Home Shoppe Website Template | Home :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="{{URL::asset('js/jquery2.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<link href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{URL::asset('css/slider.css')}}" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="{{URL::asset('js/move-top.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/easing.js')}}"></script>
<script src="{{URL::asset('js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
<link href="{{URL::asset('css/easy-responsive-tabs.css')}}" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="{{URL::asset('css/global.css')}}">
<script src="{{URL::asset('js/slides.min.jquery.js')}}"></script>
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAE6RfNc2xUty4LuxCstPRwQnRDL18fmO8&libraries=places">
</script>
<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markermanager/src/markermanager.js"></script>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>

<style type="text/css">



.prof
{
    margin: -10px 70px 0px 0px;
    z-index: 9;
    width: 10%;
    border: solid #B81D22; 
    border-radius: 100px;
}	
</style>

<style type="text/css">
 .alert-purple { border-color: #694D9F;background: black;color: #fff; }
.alert-info-alt { border-color: #B4E1E4;background: #81c7e1;color: #fff; }
.alert-danger-alt { border-color: #B63E5A;background: #E26868;color: #fff; }
.alert-warning-alt { border-color: #F3F3EB;background: #E9CEAC;color: #fff; }
.alert-success-alt { border-color: #19B99A;background: #20A286;color: #fff; }
.alert a {color: gold;}
 #not1{
    position: absolute;
    left: 100px;
    top: 0px;
    z-index: 10;
}
</style>

<script type="text/javascript">
$(document).ready(function(){
$('#not').html("0");
  function worker() {

    $("#not1").fadeOut(5000, function() {
        $(this).remove();
    });

    console.log("im here ");
    };
    
  setInterval(worker, 4000);
});
</script>
<script type="text/javascript">




var socket = io.connect('http://localhost:8890');

   @for($i=0;$i<count($myusers);$i++)
    socket.on('channel'+{{$myusers[$i]->id}}+{{Auth::user()->id}}, function (data) {      
       
       data = jQuery.parseJSON(data);

$( "#gnot" ).append(
    '<div id="not1">'+
    '<div class="appNotifications">'+
    '<div class="row" style="max-width:600px;height20px;">'+
        '<div class="col-md-12 col-md-offset-9">'+
            '<div class="alert alert-purple alert-dismissable">'+
                '<span class="glyphicon glyphicon-bell" style=" margin-right:10px;"></span>'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+ 
                '<span class="notifTitle"><a href="{{url('/notifications')}}" style="color:#fff;text-decoration:none;">New notification '+data.user+' has approved you to get the '+data.stuff+' you orderd '+'</a></div>'+
        '</div>'+
    '</div>'+
'</div>'+
'</div>'
    ); 

      
      });

 @endfor
     

</script>


@yield('links')
</head>
<body>
  <div class="wrap">
	<div class="header" >
		<div class="headertop_desc" id="gnot" >
			<div class="call">
				 <p><span>Need help?</span> call us <span class="number">0972-592498081</span></span></p>
			</div>
			<div class="account_desc"  >
				
			</div>
			<div class="clear"></div>
		</div>

		<div class="header_top" >
			<div class="logo">
				<a href="{{ url('/') }}"><img src="{{URL::asset('images/logo.jpg')}}" alt="" /></a>
			</div>
	
	<img align="right" class="prof thumbnail" src="{{URL::asset('/profile-images/profile.jpg')}}" alt="Profile image example" height="100px" />

			  <div class="cart">
			 <p style="font-family:'Oswald', sans-serif;font-size:25px;margin-top:-30px ">Welcome Back
			 @if (Auth::guest())
			 @else
			 <span style="font-family:'Oswald', sans-serif;font-size:25px;margin-top:-30px ">
             {{ Auth::user()->fname }}
             </span>
			 @endif
			  </p>
			  </div>
			  <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});

		</script>
	 <div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li class="active"><a href="{{ url('home') }}">Home</a></li>
			    	 @if (Auth::guest())
                    <li><a href="{{ url('login') }}">LogIn</a></li>
                    <li><a href="{{ url('register') }}">Register</a></li>
                    <li><a href="{{ url('about') }}">About</a></li>
			    	<li><a href="{{ url('delivery') }}">Delivery</a></li>
			    	<li><a href="{{ url('news') }}">News</a></li>
			    	<li><a href="{{ url('contact') }}">Contact</a></li>
                     @else 
                    <li><a href="{{ url('/profile') }}">profile</a></li>
                     <li class="dropdown" >
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="text-decoration:none;">Add<span class="caret"></span></a>
		                <ul class="dropdown-menu" style="background:#383838; padding :0px" >
		                  <li><a href="{{ url('/addThing') }}">Stuff</a></li>
		                  <li><a href="{{ url('/addSkill') }}">Skill</a></li>
		                  
		                </ul>
		              </li>

                    </li>

                    <li><a href="{{ url('/pick-need') }}">Pick Needs</a></li>
                    <li><a href="{{ url('/pick-skill') }}">Request Skill</a></li>
                     <li class="dropdown" >
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="text-decoration:none;">Change<span class="caret"></span></a>
		                <ul class="dropdown-menu" style="background:#383838; padding :0px" >
		                  <li><a href="{{ url('/home') }}">Home</a></li>
		                  <li><a href="{{ url('/work') }}">Work</a></li>
		                  
		                </ul>
		              </li>

                    </li>
                    <li><a href="{{ url('/logout') }}">Logout</a></li>

                     

                
                     @endif
			    	<div class="clear"></div>
     			</ul>

	     	</div>
	     	
	     	<div class="clear"></div>
	     </div>	
	     
	     @yield('body')


          <div class="footer">
   	  <div class="wrap">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Customer Service</a></li>
						<li><a href="#">Advanced Search</a></li>
						<li><a href="delivery.html">Orders and Returns</a></li>
						<li><a href="contact.html">Contact Us</a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>NeighborsBook</h4>
						<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Customer Service</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="contact.html">Site Map</a></li>
						<li><a href="#">Search Terms</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="contact.html">Sign In</a></li>
							<li><a href="index.html">View Cart</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="contact.html">Help</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+9720-059-2498081</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li><a href="#" target="_blank"><img src="{{URL::asset('images/facebook.png')}}" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="{{URL::asset('images/twitter.png')}}" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="{{URL::asset('images/skype.png')}}" alt="" /> </a></li>
							      <li><a href="#" target="_blank"> <img src="{{URL::asset('images/dribbble.png')}}" alt="" /></a></li>
							      <li><a href="#" target="_blank"> <img src="{{URL::asset('images/linkedin.png')}}" alt="" /></a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>			
        </div>
        <div class="copy_right">
				<p>NeighborsBook © All rights Reseverd</p>
		   </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>



	     </body>
	     </html>