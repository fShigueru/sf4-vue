<template>
    <div id="quickviewButton">
        <a href="javascript://Contato" v-on:click="quickViewShow" class="navbar-item m-r-md">Contato</a>
    </div>
</template>

<script>
  export default {
    name: 'quickviewButton',
    methods: {
      quickViewShow: function () {
        this.$options.parent.$children.map(function (current) {
            if (current.$el.querySelector('.quickview') != undefined ) {
              current.$el.querySelector('.quickview').classList.add('is-active');
            }
        });
      }
    }
  }
</script>
