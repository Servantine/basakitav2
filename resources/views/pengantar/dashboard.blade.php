@include('layouts.main3')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/eee4f26c1d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <title>Dashboard</title>
    <style>
        #map {
            height: 720px;
            width: 1000px;
        }
    </style>
</head>

<body>
    @if (session('flash2'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('flash2') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="main_content">
        <div class="header"> Selamat Datang </div>
        <div class="info">
            <div class="content">
                <div class="header-body">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total Pengantaran Per
                                                Bulan</h5>
                                            <span class="h2 font-weight-bold mb-0"> 123 </span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Transaksi Dilakukan
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">2,356</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                <i class="fas fa-chart-pie"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Lokasi Bank Sampah
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">924</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Sampah disimpan</h5>
                                            <span class="h2 font-weight-bold mb-0">49,65%</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                <i class="fas fa-percent"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <center>
                    <div id='map' style='width: 900px; height: 500px;'></div>
                    <script>
                        const defaultlocation = [110.37881892518442, -7.786022693301618]
                        mapboxgl.accessToken = '{{ env('MAPBOX_KEY') }}';
                        var map = new mapboxgl.Map({
                            container: 'map',
                            center: defaultlocation,
                            zoom: 11.15,
                            style: 'mapbox://styles/mapbox/streets-v11'
                        });

                        const geoJson =

                            {
                                "type": "FeatureCollection",
                                "features": [{
                                        "type": "Feature",
                                        "geometry": {
                                            "coordinates": [
                                                "110.36564842053133",
                                                "-7.796135542058849"
                                            ],
                                            "type": "Point"
                                        },
                                        "properties": {
                                            "message": "Mantap",
                                            "iconSize": [
                                                50,
                                                50
                                            ],
                                            "locationId": 30,
                                            "title": "Bank Malioboro",
                                            "image": "1a1eb1e4106fff0cc3467873f0f39cab.jpeg",
                                            "description": "Bank Sampah berada di Malioboro"
                                        }
                                    },
                                    {
                                        "type": "Feature",
                                        "geometry": {
                                            "coordinates": [
                                                "110.37935117929578",
                                                "-7.78190472515476"
                                            ],
                                            "type": "Point"
                                        },
                                        "properties": {
                                            "message": "oke mantap Edit",
                                            "iconSize": [
                                                50,
                                                50
                                            ],
                                            "locationId": 29,
                                            "title": "Bank Sagan",
                                            "image": "0ea59991df2cb96b4df6e32307ea20ff.png",
                                            "description": "oke mantap Edit"
                                        }
                                    }
                                ]
                            }

                        const loadLocations = () => {
                            geoJson.features.forEach((location) => {
                                const {
                                    geometry,
                                    properties
                                } = location
                                const {
                                    iconSize,
                                    locationId,
                                    title,
                                    image,
                                    description
                                } = properties

                                let markerElement = document.createElement('div')
                                markerElement.className = 'marker' + locationId
                                markerElement.id = locationId
                                markerElement.style.backgroundImage =
                                    'url(https://cdn4.iconfinder.com/data/icons/small-n-flat/24/map-marker-512.png)'
                                markerElement.style.backgroundSize = 'cover'
                                markerElement.style.width = '50px'
                                markerElement.style.height = '50px'

                                const popUp = new mapboxgl.Popup({
                                    offset: 25
                                }).setHTML(title).setMaxWidth("500px")

                                new mapboxgl.Marker(markerElement)
                                    .setLngLat(geometry.coordinates)
                                    .setPopup(popUp)
                                    .addTo(map)
                            });
                        }

                        loadLocations()

                        map.addControl(
                            new mapboxgl.GeolocateControl({
                                positionOptions: {
                                    enableHighAccuracy: true
                                },
                                // When active the map will receive updates to the device's location as it changes.
                                trackUserLocation: true,
                                // Draw an arrow next to the location dot to indicate which direction the device is heading.
                                showUserHeading: true
                            })
                        )
                        map.on('click', (e) => {
                            const longtitude = e.lngLat.lng
                            const lattitude = e.lngLat.lat

                            console.log({
                                longtitude,
                                lattitude
                            });
                        })
                    </script>

                </center>
            </div>

        </div>

    </div>

</body>

</html>
