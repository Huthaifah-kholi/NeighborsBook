@extends('layouts.master')
@section('links')

<style type="text/css">
.banner{
    background: #c8abad;
    font-size: 2em;
    position: relative;
    background:url('{{ asset('images/thanks.jpg') }}');
    background-size: 100% 100%;
    background-repeat: no-repeat;
    margin: 10px;
}

.banner-contentarea{
    display: table;width: 100%;
    height: 630px;
    margin-top: -30px;
}
.banner-content{display: table-cell;vertical-align: middle; }
.banner-content p{
    margin:0px;
}
.text-white {
color: white;
font-family:'Oswald', sans-serif;
font-size: 35px;
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
           <img src="{{URL::asset('images/sh.png')}}" height="100px" >
           <img src="{{URL::asset('images/smile.png')}}" height="100px" >
            <p style="">Thank you for sharing with your neighbors
            <br> <span style="color:red;">N</sapn><span style="color:white;">eighbors</span><span style="color:red;">B</span><span style="color:white;">ook wish you a nice day !</span>
            <br><span style="color:white;"> Share more now ! </span></p>
            <p><a href="{{url('/home')}}" class="btn btn-danger btn-lg">Home Page</a>
            <a href="{{url('/myuploads')}}" class="btn btn-danger btn-lg">MyUploads</a></p>
            <a href="{{url('/addThing')}}" class="btn btn-danger btn-lg" >Add New </a></p>
          </div>
        </div>
        <p class="slide-down"><a href="" class="fa fa-angle-double-down"></a></p>
      </div>
    </div>
@endsection
