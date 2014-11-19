$(document).ready(function(){

/* Show jQuery is running */
$('h1').css({textDecoration: 'underline'});

$('#map').zoommap({
		// Width and Height of the Map
		width: '680px',
		height: '660px',
			
		//Misc Settings
		blankImage: '/sites/default/files/images/zoommap/blank.gif',
		zoomDuration: 1000,
		bulletWidthOffset: '10px',
		bulletHeightOffset: '10px',
		
		//ids and classes
		zoomClass: 'zoomable',
		popupSelector: 'div.popup',
		popupCloseSelector: 'a.close',
		
		//Return to Parent Map Link
		showReturnLink: true,
		returnId: 'returnlink',
		returnText: 'Go back',
		
		//Initial Region to be shown
		map: {
			id: 'mbdausamap',
			image: '/sites/default/files/images/zoommap/us-map-full.png',
			data: '/mbda_html/regional_offices.html',
			maps: [
			{
				id: 'mbdaregion1map',
				parent: 'mbdausamap',
				image: '/sites/default/files/images/zoommap/us-map-new-york.png',
				data: '/mbda_html/region1_offices.html',
				width: '210px',
				height: '200px',
				top: '135px',
				left: '475px'
				/* More maps can be nested
				maps : [ ]
				*/
			},
			{
				id: 'mbdaregion2map',
				parent: 'mbdausamap',
				image: '/sites/default/files/images/zoommap/us-map-atlanta.png',
				data: '/mbda_html/region2_offices.html',
				width: '210px',
				height: '200px',
				top: '315px',
				left: '385px'
				/* More maps can be nested
				maps : [ ]
				*/
			},
			{
				id: 'mbdaregion3map',
				parent: 'mbdausamap',
				image: '/sites/default/files/images/zoommap/us-map-san-francisco.png',
				data: '/mbda_html/region3_offices.html',
				width: '320px',
				height: '320px',
				top: '120px',
				left: '-55px'
				/* More maps can be nested
				maps : [ ]
				*/
			},
			{
				id: 'mbdaregion4map',
				parent: 'mbdausamap',
				image: '/sites/default/files/images/zoommap/us-map-chicago.png',
				data: '/mbda_html/region4_offices.html',
				width: '290px',
				height: '290px',
				top: '125px',
				left: '230px'
				/* More maps can be nested
				maps : [ ]
				*/
			},
			{
				id: 'mbdaregion5map',
				parent: 'mbdausamap',
				image: '/sites/default/files/images/zoommap/us-map-dallas.png',
				data: '/mbda_html/region5_offices.html',
				width: '400px',
				height: '400px',
				top: '135px',
				left: '55px'
				/* More maps can be nested
				maps : [ ]
				*/
			},
			]
		}
	});


});
