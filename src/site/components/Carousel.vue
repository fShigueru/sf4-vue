<template>
    <section id="carousel" class="is-medium">
        <div class='carousel hero-carousel carousel-animated carousel-animate-slide' data-autoplay="true" :style="heightStyle">
            <div class='carousel-container'>
                <div class='carousel-item has-background is-active'>
                    <img class="is-background" src="https://images.pexels.com/photos/90099/pexels-photo-90099.jpeg?auto=compress&cs=tinysrgb&h=350" alt="" width="640" height="310" />
                    <div class="title">Merry Christmas</div>
                </div>
                <div class='carousel-item has-background'>
                    <img class="is-background" src="https://images.pexels.com/photos/1025469/pexels-photo-1025469.jpeg?auto=compress&cs=tinysrgb&h=350" alt="" width="640" height="310" />
                    <div class="title">Original Gift: Offer a song with <a href="https://lasongbox.com" target="_blank">La Song Box</a></div>
                </div>
                <div class='carousel-item has-background'>
                    <img class="is-background" src="https://images.pexels.com/photos/1018350/pexels-photo-1018350.jpeg?auto=compress&cs=tinysrgb&h=350" alt="" width="640" height="310" />
                    <div class="title">Sushi time</div>
                </div>
                <div class='carousel-item has-background'>
                    <img class="is-background" src="https://images.pexels.com/photos/305225/pexels-photo-305225.jpeg?auto=compress&cs=tinysrgb&h=350" alt="" width="640" height="310" />
                    <div class="title">Life</div>
                </div>
            </div>
            <div class="carousel-navigation is-overlay">
                <div class="carousel-nav-left">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </div>
                <div class="carousel-nav-right">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
  if (process.browser) {
    require('bulma-extensions/bulma-carousel/dist/bulma-carousel')
  }
  export default {
    name: 'carousel',
    computed: {
      heightStyle:function(){
        var height = 599;
        if (process.browser) {
          height = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
        }
        return {
          'height': (parseInt(height) - 51) + 'px',
          'margin-top': '51px'
        }
      }
    }
  };
</script>

<style>
.carousel {
    position:relative;
    border:1px solid black;
    margin: auto;
    display:flex;
}
</style>
