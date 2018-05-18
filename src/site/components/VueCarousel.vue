<template>
    <div id="vueCarousel">
        <carousel :scrollPerPage="true" :perPageCustom="[[768, 1]]" style="margin-top: 51px">
            <slide><img src="https://images.pexels.com/photos/90099/pexels-photo-90099.jpeg?auto=compress&cs=tinysrgb&h=350" style="width: 100%;" :style="heightStyle"></slide>
            <slide><img src="https://picsum.photos/300/100/" style="width: 100%;" :style="heightStyle"></slide>
            <slide><img src="https://picsum.photos/300/100/" style="width: 100%;" :style="heightStyle"></slide>
            <slide><img src="https://picsum.photos/300/100/" style="width: 100%;" :style="heightStyle"></slide>
        </carousel>
    </div>
</template>

<script>
  export default {
    name: 'vueCarousel',
    computed: {
      heightStyle:function(){
        var height = 599;
        if (process.browser) {
          height = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
          console.log(height);
        }
        return {
          'height': (parseInt(height) - 51) + 'px'
        }
      }
    }
  }
</script>