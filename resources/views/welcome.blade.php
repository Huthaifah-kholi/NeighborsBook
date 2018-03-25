@extends('layouts.master')
@section('links')

<style type="text/css">
.banner{
    background: #c8abad;
    font-size: 2em;
    position: relative;
    background:url('{{ asset('images/banner.jpg') }}');
    background-size: 100% 100%;
    background-repeat: no-repeat;
    margin-top: 10px;
}
.banner-contentarea{
    display: table;width: 100%;
    height: 630px;
}
.banner-content{display: table-cell;vertical-align: middle;}
.banner-content p{
    margin: 0 0 1em;
}
.text-white {
color: black;
font-family:'Oswald', sans-serif;
font-size: 40px;
}
.btn{
    min-width: 225px;
    border-radius: 50px;
}
.btn-theme{
    background: #D07215;
    color: #fff;
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}
.btn-theme:focus{
    color: #fff;}
.btn-theme:hover{
    color: #fff;
    background: #2A9B5B;
}
.btn{
    min-width: inherit;
    }

</style>
@endsection
@section('body')
<div class="banner">
      <div class="container">
        <div class="banner-contentarea">
          <div class="banner-content text-center text-white">
            <h1>Welcome Everyone</h1>

            <p><span style="color:yellow">NeighborsBook</span>  Will Make Your Life Easier,<br>Start Sharing Things With Others</p>
            <p><a href="{{url('/login')}}" class="btn btn-theme">Sign In</a> <a href="{{url('register')}}" class="btn btn-theme">Join Now</a></p>
          </div>
        </div>
        <p class="slide-down"><a href="" class="fa fa-angle-double-down"></a></p>
      </div>
    </div>
@endsection
