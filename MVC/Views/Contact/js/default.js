/**
 * Created with JetBrains PhpStorm.
 * User: ray
 * Date: 30/05/13
 * Time: 6:14 PM
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    $.validator.setDefaults({
        errorClass:'form_error',
        errorElement:'div'

    });
  $('#contactForm').validate({
      rules:{
        name:{
            required:true,
            minlength:2
        },
        email:{
            required:true,
            email:true
        },
        message:{
            required:true
        },
      captcha:{
          required:true,
          minlength:4
      }},
          submitHandler:function(o){
              var data=$('#contactForm').serialize();
              $.post('Contact/sendEmail',data,function(o){
                    $('#emailStatus').html(o);
              });

          },
          success:function(element){
            element.remove();
          }

  });
    $('#email').change(function(){
        $(this).removeData();
        });

    $("#get_Location").click(function(){
        navigator.geolocation.getCurrentPosition(output,error,{enableHighAccuracy:true});
        return false;
    })

    $("#get_Home").click(function(){
        var homeCoord={latitude:-33.9705596,
        longitude:151.1077497};

        showMap(homeCoord);
        return false;
    })

    $("#get_Direction").click(function(){
            navigator.geolocation.getCurrentPosition(getRoute,error,{enableHighAccuracy:true});
        }
    )



})

var getRoute=function(position){
    var CurrentLocation=new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
    var homeCoord=new google.maps.LatLng(-33.9705596,
        151.1077497);
    calRoute(CurrentLocation,homeCoord);
}


$(document).ready(function() {
    var homeCoord={latitude:-33.9705596,
        longitude:151.1077497};
    var title="my home"
    var content="I am here"
    showMap(homeCoord,title,content);

    return false;
});

var error=function(error){
    switch (error.code){
        case 1:
        alert("unable to get location");
       break;
        case 2:
            alert("check Internet connection");
            break;
        case 3:
            alert("connection time out");
            break;
    }

}

var output=function(pos){


    showMap(pos.coords);

}

function showMap(coords,title,content){
    var googlelatAndLong=new google.maps.LatLng(coords.latitude,coords.longitude);
    var mapOptions={
        zoom:15,
        center:googlelatAndLong,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    }
    var mapDiv=document.getElementById("googleMap");
   var map=new google.maps.Map(mapDiv,mapOptions);

    addMarker(map,googlelatAndLong,title,content);
    return map;
}

function addMarker(map,latlong,title,content){
    var markerOptions={
        position:latlong,
        map:map,
        title:title,
        clickable:true
    };
    var marker=new google.maps.Marker(markerOptions);

    var infoWindowOptions={
        content:content,
        position:latlong
    };
    var infoWindow=new google.maps.InfoWindow(infoWindowOptions);
    google.maps.event.addListener(marker,"click",function(){
        infoWindow.open(map);
    })
}

function calRoute(startLocation,destination){
    var googlelatAndLong=new google.maps.LatLng(startLocation);
    var mapOptions={
        zoom:15,
        center:googlelatAndLong,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    }
    var mapDiv=document.getElementById("googleMap");
    var map=new google.maps.Map(mapDiv,mapOptions);
    var directionsService = new google.maps.DirectionsService();
    var directionRequest={
        origin:startLocation,
        destination:destination,
        travelMode:google.maps.DirectionsTravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.METRIC
    };
    directionsService.route(
      directionRequest,
        function(response,status){
        if(status==google.maps.DirectionsStatus.OK){
            new google.maps.DirectionsRenderer({
                map:map,
                directions:response
           });
          }
        else{
            alert("error");
        }});
        }
var watchId=null;

function watchLocation(){
    watchId=navigator.geolocation.watchPosition(output,error)
}
function clearWatch(){
    if(watchId){
        navigator.geolocation.clearWatch(watchId);
        watchId=null;
    }
}

window.onload=WatchMyLocation;
function WatchMyLocation(){
    if(navigator.geolocation){
        var watchButton=document.getElementById("watch_Location");
        watchButton.onclick=watchLocation;
        var clearWatchButton=document.getElementById("clear_Watch");
        clearWatchButton.onclick=clearWatch;
    }else{
        alert("Your browser doesn't support HTML5 geo-location");
    }
}

