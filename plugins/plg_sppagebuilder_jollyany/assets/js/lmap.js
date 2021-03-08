function initmap(mapcontainer,latitude,longitude,zoom) {
	const map = new L.Map(mapcontainer, {zoomControl: false});

//	L.control.zoom({
//		position:'bottomright'
//	}).addTo(map);


	var osmUrl='https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
	var osmAttrib='Map data © <a href="https://openstreetmap.org" target="_blank">OpenStreetMap</a> contributors';
	var osm = new L.TileLayer(osmUrl, {minZoom: 2, maxZoom: 18, attribution: osmAttrib});		

	map.setView(new L.LatLng(latitude,longitude),zoom);

	map.attributionControl.setPrefix('<a href="https://leafletjs.com/" target="_blank">Leaflet</a>');
	map.addLayer(osm);

	var marker = L.marker([latitude,longitude]).addTo(map);
}

