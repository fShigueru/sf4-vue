<template>
    <div id="vueAgile">
        <no-ssr placeholder="Loading...">
            <agile :arrows="false" :speed="750"
                   :timing="'linear'" :fade="true"
                   :autoplay="true" :pauseOnHover="false">
                <div class="slide slide--1" :style="heightStyle"></div>
                <div class="slide slide--2" :style="heightStyle"></div>
                <div class="slide slide--3" :style="heightStyle"></div>
            </agile>
        </no-ssr>
    </div>
</template>

<script>
  export default {
    name: 'vueAgile',
    computed: {
      heightStyle:function(){
        let height = 0;
        let width = 0;
        if (process.browser) {
          height = screen.height;
          width = screen.width;
        }

        let style = {};
        if (width <= 380) {
          style = {
            'height': (parseInt(height) - 180) + 'px',
            'margin-top': '51px'
          }
        } else {
          style = {
            'height': (parseInt(height) - 170) + 'px',
            'margin-top': '51px'
          }
        }

        return style;
      }
    }
  }
</script>

<style lang="scss">
@mixin circle($width, $color) {
    width: $width;
    height: $width;
    background: $color;
    -webkit-border-radius: $width/2;
    -moz-border-radius: $width/2;
    border-radius: $width/2;
}
.agile {
    &__dots {
        bottom: 0;
        display: block;
        left: 10px;
        position: absolute;
        width: 30px;
    }

    &__dot {
        margin-bottom: 10px;
        button {
            background-color: transparent;
            border: 1px solid #fff;
            margin-top: 10px;
            @include circle(13px,  hsl(48, 100%, 67%));
            &:hover {
                background-color: #fff;
            }
        }
        &--current {
            button {
                background-color: #fff;
            }
        }
    }
}
.slide {
    background-position: center;
    background-size: cover;
    height: 500px;
}
.slide--1 {
    background-image: url('../static/academia-1.jpg');
}
.slide--2 {
    background-image: url('../static/academia-2.jpg');
}
.slide--3 {
    background-image: url('../static/academia-3.jpg');
}
</style>