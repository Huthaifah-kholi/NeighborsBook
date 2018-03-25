@extends('layouts.profile-master')
@section('Link')
<style type="text/css">
  .grid_1_of_4 {
  margin-left: 0;
}
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
</style>
@endsection
@section('info')
<div class="container">
  
        <div class="content_bottom">
        
     

   <div class="section group">
        @for($i=0; $i<count($users); $i++)

        <div class="grid_1_of_4 images_1_of_4" style="margin:5px">
          
          @if($users[$i]->profile!=null)
          <a href="#"><img src="profile-images/{{$users[$i]->profile}}" height="110px" width="200px" alt=""></a>         
          @else 
          <a href="#"><img src="profile-images/profile.jpg" alt=""></a>
          @endif
          <div class="price" style="border:none">
          <div class="add-cart" style="float:none"> 
          <span class="span1">{{ $users[$i]->fname }}</span><br> 
           @if($users[$i]->distance<1)
           <span class="span3" >{{floor($users[$i]->distance*1000)}}m away</span>
           @else 
          <span class="span3"  >{{floor($users[$i]->distance)}} Km away</span>
           @endif

          <h4><a href="{{route('user-profile', ['id' => $users[$i]->id])}}" >View Profile</a></h4>
          </div>
          <div class="clear"></div>
          </div>

        </div>
      @endfor
        
      </div>
      </div>

      



</div>

    
               

@endsection

    
