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
          'https://wikiki.github.io/images/merry-christmas.jpg',
          'https://wikiki.github.io/images/singer.jpg',
          'https://wikiki.github.io/images/sushi.jpg',
          'https://wikiki.github.io/images/life.jpg',
          'https://wikiki.github.io/images/life.jpg',
          'https://wikiki.github.io/images/life.jpg',
        ],
        index: null
      };
    }
  }
</script>
