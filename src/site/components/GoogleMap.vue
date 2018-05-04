<template>
    <div>
        <!--
        <div>
            <h2>Search and add a pin</h2>
            <label>
                <gmap-autocomplete
                        @place_changed="setPlace">
                </gmap-autocomplete>
                <button @click="addMarker">Add</button>
            </label>
            <br/>
        </div>
        <br>
        -->
        <gmap-map
                :center="center"
                :zoom="18"
                style="width:100%;  height: 400px;">
            <gmap-marker
                    :key="index"
                    v-for="(m, index) in markers"
                    :position="m.position"
                    @click="center=m.position"
            ></gmap-marker>
        </gmap-map>
    </div>
</template>

<script>
  export default {
    name: "GoogleMap",
    data() {
      return {
        // default to Montreal to keep it simple
        // change this to whatever makes sense
        center: { lat: -23.4612426, lng: -46.6497912 },
        markers: [],
        places: [],
        currentPlace: null
      };
    },

    mounted() {
      this.geolocate();
    },

    created() {
      const marker = {
        lat: this.center.lat,
        lng: this.center.lng
      };
      this.markers.push({ position: marker });
    },

    methods: {
      // receives a place object via the autocomplete component
      setPlace(place) {
        this.currentPlace = place;
      },
      addMarker() {
        if (this.currentPlace) {
          console.log(this.currentPlace.geometry.location);
          const marker = {
            lat: this.currentPlace.geometry.location.lat(),
            lng: this.currentPlace.geometry.location.lng()
          };
          this.markers.push({ position: marker });
          this.places.push(this.currentPlace);
          this.center = marker;
          this.currentPlace = null;
        }
      },
      geolocate: function() {
        navigator.geolocation.getCurrentPosition(position => {
          this.center = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
        });
      }
    }
  };
</script>