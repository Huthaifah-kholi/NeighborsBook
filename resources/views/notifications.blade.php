@extends('layouts.profile-master')

@section('Link')
<style type="text/css">
  .alert-purple { border-color: #694D9F;background: black;color: #fff; }
.alert-info-alt { border-color: #B4E1E4;background: #81c7e1;color: #fff; }
.alert-danger-alt { border-color: #B63E5A;background: #E26868;color: #fff; }
.alert-warning-alt { border-color: #F3F3EB;background: #E9CEAC;color: #fff; }
.alert-success-alt { border-color: #19B99A;background: #20A286;color: #fff; }
.alert a {color: gold;}
</style>

<script type="text/javascript">
$(document).ready(function(){
$('#not').html("0");
  function worker() {

    $("#not1").fadeOut("normal", function() {
        $(this).remove();
    });

    console.log("im here ");
    };
    
  setInterval(worker, 4000);
});
</script>

@endsection
@section('info')

<div class="container" >

@for($i=0; $i<count($notifications); $i++)

<div class="appNotifications">
    <div class="row" style="max-width:620px">
        <div class="col-md-12">
            <div class="alert alert-purple alert-dismissable">
                <span class="glyphicon glyphicon-certificate"></span>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button> <span class="notifTitle"><strong>New Request is Accepted</strong></span>
                    <br>your neighbor {{$notifications[$i]->fname}} lives @if($notifications[$i]->distance<1){{floor($notifications[$i]->distance*1000)}} meter @else
                     {{floor($notifications[$i]->distance)}} km @endif arround you accepted your request for the {{$notifications[$i]->body}} , you can  go and get it now !</div>
        </div>
    </div>
</div>

@endfor

@for($i=0; $i<count($notifications2); $i++)

<div class="appNotifications">
    <div class="row" style="max-width:620px">
        <div class="col-md-12">
            <div class="alert alert-purple alert-dismissable" style="background:red;">
                <span class="glyphicon glyphicon-certificate"></span>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button> <span class="notifTitle"><strong>New Stuff Request</strong></span>
                    <br>your neighbor {{$notifications2[$i]->fname}} lives @if($notifications2[$i]->distance<1){{floor($notifications2[$i]->distance*1000)}} meter @else
                     {{floor($notifications2[$i]->distance)}} km @endif arround you is requesting {{$notifications2[$i]->name}} that belongs to  {{$notifications2[$i]->cat}} if you have it you can help now  </div>
        </div>
    </div>
</div>

@endfor

@for($i=0; $i<count($notifications3); $i++)

<div class="appNotifications">
    <div class="row" style="max-width:620px">
        <div class="col-md-12">
            <div class="alert alert-purple alert-dismissable" style="background:blue;">
                <span class="glyphicon glyphicon-certificate"></span>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button> <span class="notifTitle"><strong>New Skill Request</strong></span>
                    <br>your neighbor {{$notifications3[$i]->fname}} lives @if($notifications3[$i]->distance<1){{floor($notifications3[$i]->distance*1000)}} meter @else
                     {{floor($notifications3[$i]->distance)}} km @endif arround you is requesting a {{$notifications3[$i]->name}} that belongs to  {{$notifications3[$i]->cat}} can you help ? </div>
        </div>
    </div>
</div>

@endfor


</div>

@endsection

    
