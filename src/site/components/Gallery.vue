<template>
    <div id="gallery" class="container">
        <no-ssr>
            <Gallery :images="images" :index="index" @close="index = null"></Gallery>
        </no-ssr>
        <div class="columns is-multiline is-mobile">
            <div v-for="(image, imageIndex) in images" class="column is-one-quarter">
                <figure class="image is-128-128">
                    <img :src="image" @click="index = imageIndex" :style="{'z-index': '99' }" class="hvr-hang">
                </figure>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'gallery',
    data: function () {
      return {
        images: [
          'https://images.pexels.com/photos/305225/pexels-photo-305225.jpeg?auto=compress&cs=tinysrgb&h=350',
          'https://images.pexels.com/photos/1020510/pexels-photo-1020510.jpeg?auto=compress&cs=tinysrgb&h=350',
          'https://images.pexels.com/photos/1021808/pexels-photo-1021808.jpeg?auto=compress&cs=tinysrgb&h=350',
          'https://images.pexels.com/photos/611328/pexels-photo-611328.jpeg?auto=compress&cs=tinysrgb&h=350',
          'https://images.pexels.com/photos/956981/milky-way-starry-sky-night-sky-star-956981.jpeg?auto=compress&cs=tinysrgb&h=350',
          'https://images.pexels.com/photos/306531/pexels-photo-306531.jpeg?auto=compress&cs=tinysrgb&h=350',
        ],
        index: null
      };
    }
  }
</script>
