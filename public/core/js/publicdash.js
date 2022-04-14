// $(".legend_cuaca").hide();
$.getJSON('petaapi', function(data) {

    let GoogleHybrid = L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    let GoogleStreets = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    let GoogleStreets_mini = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    let EsriWorldImagery = L.tileLayer.provider('Esri.WorldImagery');

    let EsriWorldStreetMap = L.tileLayer.provider('Esri.WorldStreetMap');

    let OpenStreetMap = L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
    });

    let Imagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', { attribution: 'Tiles &copy; Esri' });

    var OpsiNormal = {
        'maxWidth': '500',
        'className': 'custom_normal',
        closeButton: false,
        autoClose: false
    }
    var OpsiBanjir = {
        'maxWidth': '500',
        'className': 'custom_banjir',
        closeButton: false,
        autoClose: false
    }

    function datapopup(nm_alat, alamat, lat, lng, gambar, alert) {
        if (alert == "Danger") {
            var sarungxx = "<div class='badge bg-danger'>Banjir</div>";
        } else {
            var sarungxx = "<div class='badge bg-primary'>Normal</div>";
        }

        var popup = '<div class="card text-dark m-0" style="width: 18rem;">' +
            '<img src="file/alat/' + gambar + '" class="card-img-top" alt="' + nm_alat + '">' +

            '<ul class="list-group list-group-flush text-center">' +
            '<li class="list-group-item fw-bold text-uppercase">' + nm_alat + '</li>' +
            '<li class="list-group-item">' + alamat + '</li>' +
            '<li class="list-group-item">' + lat + ',' + lng + '</li>' +
            '<li class="list-group-item">' + sarungxx + '</li>' +
            '</ul>' +
            '<div class="card-body text-center">' +
            '<a href="#" class="btn btn-light btn-sm"><i class="fa fa-eye pe-2"></i> Detail</a>' +
            '<a href="https://www.google.com/maps/search/?api=1&query=' + lat + ',' + lng + '" class="btn btn-dark btn-sm" target="_blank"><i class="fa fa-map px-2 ps-e"></i> Street View</a>' +
            '</div>' +
            '</div>';
        return popup;
    }


    let groupnormal = L.layerGroup();
    let groupbanjir = L.layerGroup();
    let groupGendeng = L.layerGroup();
    let alat = [];


    //MUlai Firebase
    //******************************************* */
    var firebaseConfig = {
        apiKey: "AIzaSyCYabXocVT3zlXyJrJvMW4CBgzg82kfT30",
        authDomain: "transmetropekanbaru-2021tmp.firebaseapp.com",
        databaseURL: "https://transmetropekanbaru-2021tmp-default-rtdb.asia-southeast1.firebasedatabase.app",
        projectId: "transmetropekanbaru-2021tmp",
        storageBucket: "transmetropekanbaru-2021tmp.appspot.com",
        messagingSenderId: "640014735813",
        appId: "1:640014735813:web:7f0a7c751a1a172ff8d3ac",
        measurementId: "G-CLECFJ25E1"
    };

    const app = firebase.initializeApp(firebaseConfig)
    var database = firebase.database();
    // console.log(app.name);  // "[DEFAULT]"
    const dbRef = firebase.database().ref();
    dbRef.child("location").child("Bus1").get().then((snapshot) => {
        if (snapshot.exists()) {
            //   console.log("heheh"+snapshot.val().sattelite);

            var customPopup = "<center>DFDFD</center>";

            var sayur = L.circleMarker([snapshot.val().latitude, snapshot.val().longitude], {
                radius: 15,
                opacity: .5,
                color: "#000",
                fillColor: 'red',
                fillOpacity: 0.8,
                className: 'animated_icon'
            }).bindPopup(customPopup, OpsiBanjir);
            // grupe.addLayer(sayur);
            sayur.addTo(groupGendeng);

            sayur.on('click', function(e) {
                // map.setView(e.latlng, 15, 20);
            });

        } else {
            console.log("No data available");
        }
    }).catch((error) => {
        console.error(error);
    });
    //****************************8 */
    //AKHIR FIREBASE




    for (var key in data) {
        alat.push([data[key]['alats']['lat'], data[key]['alats']['lng']]);

        if (data[key]['alerts']['nm_alert'] == "Normal") {
            // var customPopup = datapopup(data[key]['alats']['nm_alat'], data[key]['alats']['lat'], data[key]['alats']['lng']);
            var customPopup = datapopup(data[key]['alats']['nm_alat'], data[key]['alats']['alamat'], data[key]['alats']['lat'], data[key]['alats']['lng'], data[key]['alats']['gambar'], data[key]['alerts']['nm_alert']);

            // L.marker([data[key]['alats']['lat'], data[key]['alats']['lng']]).bindPopup(customPopup, OpsiNormal).addTo(groupnormal);
            var sarung = L.circleMarker([data[key]['alats']['lat'], data[key]['alats']['lng']], {
                radius: 10,
                opacity: .5,
                color: "#000",
                fillColor: 'blue',
                fillOpacity: 0.8,
                className: 'animated_icon'
            }).bindPopup(customPopup, OpsiNormal);
            // markerClusters.addLayer(sarung);
            // grupe.addLayer(sarung);
            sarung.addTo(groupnormal)
            sarung.on('click', function(e) {
                // map.setView(e.latlng, 15, 20);
                cekCuaca(data[key]['alats']['lat'], data[key]['alats']['lng']);
            });

        } else if (data[key]['alerts']['nm_alert'] == "Danger") {
            var customPopup = datapopup(data[key]['alats']['nm_alat'], data[key]['alats']['alamat'], data[key]['alats']['lat'], data[key]['alats']['lng'], data[key]['alats']['gambar'], data[key]['alerts']['nm_alert']);

            var bulukaki = L.circleMarker([data[key]['alats']['lat'], data[key]['alats']['lng']], {
                radius: 15,
                opacity: .5,
                color: "#000",
                fillColor: 'red',
                fillOpacity: 0.8,
                className: 'animated_icon'
            }).bindPopup(customPopup, OpsiBanjir);
            bulukaki.addTo(groupbanjir);
            // grupe.addLayer(bulukaki);
            bulukaki.on('click', function(e) {
                // map.setView(e.latlng, 15);
                cekCuaca(data[key]['alats']['lat'], data[key]['alats']['lng']);
            });
        }

        // delay(2000);
    }

    // console.log(alat[0]);
    // Line
    // let line = L.polyline(alat, {color: "red", weight: 7}).bindPopup("Travel Path");
    var grupe = L.markerClusterGroup.layerSupport();
    grupe.checkIn([groupnormal, groupbanjir, groupGendeng]);

    // Map
    let map = L.map('peta_pekanbaru', {
        center: [0.5248321943530128, 101.45683897023656],
        zoom: 12,
        layers: [OpenStreetMap, groupnormal, groupbanjir, groupGendeng, grupe],
        // layers: [Imagery, grupe],
        fullscreenControl: {
            pseudoFullscreen: false
        }
    });
    // let map = L.map('peta_pekanbaru', {center: [0.5248321943530128, 101.45683897023656], zoom: 14, layers: [Imagery, groupnormal, groupbanjir, line]});



    // Description Legend
    // let legend = L.control({ position: "bottomleft" });
    // legend.onAdd = function() {
    //     let div = L.DomUtil.create("div", "legend");
    //     div.innerHTML =
    //         'ini nanti isi legend'
    //     return div;
    // };
    // legend.addTo(map);


    //Minimap
    var baseMapsMini = {
        "GoogleStreets2": GoogleStreets_mini
    };

    var miniMap = new L.Control.MiniMap(baseMapsMini.GoogleStreets2, {
        toggleDisplay: true,
        minimized: false,
        position: 'bottomright'
    }).addTo(map);

    // Layer control
    let baseMaps = {
        "Google Hybrid": GoogleHybrid,
        "Google Streets": GoogleStreets,
        "Open Street Map": OpenStreetMap,
        // "Esri World Imagery": EsriWorldImagery,
        "Esri World Imagery": Imagery,
        "Esri World Street Map": EsriWorldStreetMap
    };
    let overlayMaps = {
        "Titik Aman": groupnormal,
        "Titik Banjir": groupbanjir,
        "Harapan": groupGendeng
            // "History Arah": line
    };
    L.control.layers(baseMaps, overlayMaps, { position: "bottomright", collapsed: false }).addTo(map);

    function cekCuaca(lat, lng) {
        fetch("https://api.openweathermap.org/data/2.5/onecall?lat=" + lat + "&lon=" + lng + "&exclude=hourly,daily&appid=2df2322bdd9639635b377b277958897d&units=metric&lang=id")
            .then(response => response.json())
            .then(response => {
                let result = document.querySelector('.legend_cuaca')

                result.innerHTML = `<img src="http://openweathermap.org/img/wn/${response.current.weather[0].icon}@2x.png">
                <!--<h2 style="margin-bottom: 15px;">${response.timezone}</h2>-->
                <h5><span class="temp">${response.current.temp}°С</span> <span class="temp">${response.current.weather[0].description}</span></h5>
                <p style="margin-bottom: 17px;">Temperature from ${response.current.temp}°С to ${response.current.feels_like}°С</p>
                <h5>Kecepatan Udara : ${response.current.wind_speed} m/s</h5>
                <h5 style="margin-bottom: 17px;">Clouds : ${response.current.clouds}%</h5>
                <!--<h4 style="color: #012443;">Geo Coordinates : [${response.lat}, ${response.lon}]</h4>-->`
                    // result.innerHTML = '<img src="http://openweathermap.org/img/wn/' + response.current.weather[0].icon + '@2x.png">';
            })
    }

    // cekCuaca('0.8125939', '100.4139502');

});