var ContactPage = function () {

    return {
        
    	//Basic Map
        initMap: function (myData, myData2, myData3) {
			var map;
			$(document).ready(function(){
			  map = new GMaps({
				div: '#map',
				scrollwheel: false,				
				lat: myData,
				lng: myData2
			  });
			  
			  var marker = map.addMarker({
				lat: myData,
				lng: myData2,
	            title: myData3
		       });
			});
        },

        //Panorama Map
        initPanorama: function () {
		    var panorama;
		    $(document).ready(function(){
		      panorama = GMaps.createPanorama({
		        el: '#panorama',
		        lat : 40.748866,
		        lng : -73.988366
		      });
		    });
		}        

    };
}();