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
    <title>Dashboard</title>
</head>

<body>
    {{-- @if (session('flash2'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('flash2') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif --}}

    <div class="main_content">
        <div class="header"> Selamat Datang </div>
        <div class="info">
            <div class="content">
                <h3> Daftar Bank Sampah Yang Tersedia</h3>
                <br>
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
                <div class="row">
                    <div class="card-group">
                        <br>
                        @foreach ($bank as $item)
                            <div class="card">
                                <img src="https://sibaku.kulonprogokab.go.id/assets_frontend/img/diet-sampah-removebg.png"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"> {{ $item->nama_bank }} </h5>
                                    <p class="card-text"> {{ $item->alamat_bank }} . Dengan Harga <b>
                                            {{ $item->harga_sampah }} / KG </b> . Dengan kapasitas  <b> {{  $item->kapasitas_sampah }} </b> Saat Ini menampung <b> {{ $item->jumlah_sampah }} KG Sampah</b> <br>
                                    <form action="/lihatpesanan/{{ $item->id }}">
                                        @csrf
                                        <button class="btn btn-success"type="submit">Lihat Pesanan </button>
                                    </form>
                                    </p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
