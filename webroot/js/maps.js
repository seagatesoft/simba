var SERVER = "http://localhost/simba/";
var map;
var markersArray = [];

function showPrompt() {
	var width = window.screen.availWidth > 700 ? 700 : window.screen.availWidth;
	var height = window.screen.availHeight > 500 ? 500 : window.screen.availHeight;
	var hasil = window.open(SERVER+"organizations/getLongLat/", null, 'width='+width+',height='+height+',scrollbars=yes');
}
    
function initialize() {
	var initialPlace = new google.maps.LatLng(-7.7947, 110.3688);
	var mapOptions = {
		zoom: 10,
		center: initialPlace,
		mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
	google.maps.event.addListener(map, 'click', function(event) { addMarker(event.latLng); } );
}
  
function addMarker(location) {
	deleteOverlays();
	var locate = location.toString();
    var vars = [], hash;
    var hashes = locate.slice(locate.indexOf('(') + 1).split(',');
    
    for(var i = 0; i < hashes.length; i++) {
        var Lat = hashes[0].slice(0, (hashes[0].indexOf('.')+6)) ; // lintang
        var Long = hashes[1].slice(1, (hashes[1].indexOf('.')+6)); //bujur
    }
    
    marker = new google.maps.Marker({
      position: location,
      map: map,
      title: Lat
    });
    document.getElementById("latitudeInput").value = Lat;
    document.getElementById("longitudeInput").value = Long;
    markersArray.push(marker);
}
  
function sendValueToParent()
{
	opener.document.getElementById("OrganizationLocationLatitude").value = document.getElementById("latitudeInput").value;
    opener.document.getElementById("OrganizationLocationLongitude").value = document.getElementById("longitudeInput").value;
    self.close();
}
  
// Deletes all markers in the array by removing references to them
function deleteOverlays() {
	if (markersArray) {
		for (var markersArrayCounter=0; markersArrayCounter < markersArray.length; markersArrayCounter++) {
			markersArray[markersArrayCounter].setMap(null);
		}

		markersArray.length = 0;
		document.getElementById("latitudeInput").value = "";
		document.getElementById("longitudeInput").value = "";
    }
}

// Removes the overlays from the map, but keeps them in the array
function clearOverlays() {
	if (markersArray) {
		for (var markersArrayCounter=0; markersArrayCounter < markersArray.length; markersArrayCounter++) {
			markersArray[markersArrayCounter].setMap(null);
		}
	}
}
 
// Shows any overlays currently in the array
function showOverlays() {
	if (markersArray) {
		for (var markersArrayCounter=0; markersArrayCounter < markersArray.length; markersArrayCounter++) {
			markersArray[markersArrayCounter].setMap(map);
		}
    }
}

function showOrganizationsInMap(organizationsList, organizationsInfo, organizationsLinks) {
    if (organizationsList) {
		var initialPlace = organizationsList[0];
		var mapOptions = {
			zoom: 10,
			center: initialPlace,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		
		for (var organizationsListCounter=1; organizationsListCounter < organizationsList.length; organizationsListCounter++) {
			addOrganizationsMarker(organizationsList[organizationsListCounter], organizationsInfo[organizationsListCounter], organizationsLinks[organizationsListCounter]);
      }
    }
            
    showOverlays();
}

function addOrganizationsMarker(location, info, link) {
    marker = new google.maps.Marker({
      position: location,
      map: map,
	  title: info
    });
    markersArray.push(marker);
	attachSecretMessage(marker, link);
}

function attachSecretMessage(marker, message) {
  var infowindow = new google.maps.InfoWindow(
      { content: message,
        size: new google.maps.Size(50,50)
      });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
}