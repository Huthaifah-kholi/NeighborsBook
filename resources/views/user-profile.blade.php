@extends('layouts.master')
@section('links')
<style type="text/css">
 .sst{
margin-top: 40px;

 }
</style>
<style type="text/css">
  
.chat-window{
    bottom:0;
    position:fixed;
    float:right;
    /*margin-left:10px;*/
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



@endsection
@section('body')
<div class="container" id="form1" style="margin-top:20px;">
      <div class="row">
  
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-0 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading" style="background-color: #383838">
              <h3 style="color:white">{{ $info->fname }} {{ $info->lname }}</h3>
            </div>
            <div class="panel-body" style="background-color:white;">
              <div class="row">
              @if(count($pictures)!=0)
              <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic"  src="{{URL::asset('profile-images/'.$pictures[count($pictures)-1]->profile )}}"  class="img-circle img-responsive"> </div>
              @else
              <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic"  src="{{URL::asset('profile-images/profile.jpg')}}" class="img-circle img-responsive"> </div>  
               @endif
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      
                      <tr>
                        <td>Location:</td>
                        <td>{{ $info->location }}</td>
                      </tr>
                        
                      <tr>
                        <td>Skills:</td>
                        <td>
                            
                        @if(count($skillsToProfile)==0)
                        <span>No Skills Added  <span>
                        @else 


                           @for($i=0; $i<count($skillsToProfile); $i++)
                           <span>{{$skillsToProfile[$i]->name}}</span>
                           @endfor
                    
                           @endif

                      </td>
                      </tr>
                      <tr>
                     
                        <td>Join At:</td>
                        <?php $var = $info->created_at; ?>
                           
                        <td>{{date("Y/m/d", strtotime($var))}}</td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Gender:</td>
                        <td>Male</td>
                      </tr>
                     
                      <tr>
                        <td>Email:</td>
                        <td>{{  $info->email}}</td>
                      </tr>
                        <td>Mobile:</td>
                        <td>{{  $info->mobile}}
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  

                </div>
              </div>
            </div>

                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>
            
          </div>
        </div>

       <!-- area start -->
      
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-0 toppad" >
   
   
        <div class="col-xs-12 col-md-12">
          <div class="panel panel-default">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat</h3>
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
        <!-- end area -->
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

    
