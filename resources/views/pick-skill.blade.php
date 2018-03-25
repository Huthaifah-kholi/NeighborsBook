@extends('layouts.master')
@section('links')
<link href="css/register.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript">

// $(document).ready(function () {
// $("input[name$='optradio']").click(function () {
//     var value = $(this).val();
//     if (value == 'fordate') {
//         $("#calendar").show();
//     } 
//     else if (value == 'forfree') {
//         $("#calendar").hide();
//     }
// });

// });

</script>
@endsection
@section('body')
<br>
<div class="container">
   
<div class="col-md-6 col-md-offset-3">
         <div class="row myborder">
    <form action="{{ url('addpickskill') }}" method="post" accept-charset="utf-8" class="form"  role="form" id="myform" enctype="multipart/form-data"> 
              {!! csrf_field() !!}
            <h4 style="color:black; margin: initial; margin-bottom: 10px;">Request skills Your Neighbors </h4><hr>
              <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-th mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Skill Name" name="name" id="UserRegistration_fname" type="text">
            
            </div>
             @if ($errors->has('name'))
                                    <span class="help-block" style="color:red" >
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif                                  

           
            
                    

           


            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt mycolor"></i></span>
                
                
                   <!--<ul>
                    <h3>Categories</h3>
                      <li><a href="#">Mobile Phones</a></li>
                      <li><a href="#">Desktop</a></li>
                      <li><a href="#">Laptop</a></li>
                      <li><a href="#">Accessories</a></li>
                      <li><a href="#">Software</a></li>
                       <li><a href="#">Sports &amp; Fitness</a></li>
                       <li><a href="#">Footwear</a></li>
                       <li><a href="#">Jewellery</a></li>
                       <li><a href="#">Clothing</a></li>
                       <li><a href="#">Home Decor &amp; Kitchen</a></li>
                       <li><a href="#">Beauty &amp; Healthcare</a></li>
                       <li><a href="#">Toys, Kids &amp; Babies</a></li>
                  </ul>-->


                <select class="form-control" name="cat">
                  <option value="one" selected disabled >It Belongs To :</option>
                    <option value="Gardening">Gardening</option>
                    <option value="Cooking">Cooking</option>
                    <option value="Teaching">Teaching</option>
                    <option value="Driver">Driver</option>
                    <option value="Languages">Languages</option>
                    <option value="programming">Programming</option>
                    <option value="babysetting">Baby Setting</option>
                    <option value="ElectronicsTechnician">Electronics Technician</option>
                    <option value="Blacksmithing">Blacksmithing</option>
                    <option value="Carpenter">Carpenter</option>
                    <option value="Architect">Architect</option>
                    <option value="plumber">Plumber</option>
                    <option value="Computertechnician">Computer technician</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Others">Others</option>
                </select>

            </div> 
         

       <!--  <div class="input-group margin-bottom-20">
            <span style="color:green"> Offer:</span><br>
            <label class="radio-inline"><input type="radio" value="forfree" name="optradio" checked="checked" > Unretarined</label>
            <label class="radio-inline"><input type="radio" value="fordate" name="optradio">Limited </label>               
            </div> 


            <div class="input-group margin-bottom-20" id="calendar" style="display:none">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar mycolor"></i></span>
                <input size="60" maxlength="255"  onfocus="(this.type='date')" value="" class="form-control" placeholder="You Can Post This Thing To This Date   " name="didline" id="UserRegistration_lname" type="">
               
            </div> -->

                                                   
     <div class="form-group">
      <label for="comment" style="color:black">Details :</label>
      <textarea class="form-control" rows="10" style="" id="comment" placeholder="Enter Your Details" name="details"></textarea>
      </div>            
            

    

            <div class="row">
                <div class="col-lg-12 col-md-offset-0">
            <button class="btn-u btn-block " type="submit">Post</button>
                </div>
            </div>

        </div>
        <div class="col-md-2">
        
        </div>
    </div> 
   </form> 
      </div>


@endsection
