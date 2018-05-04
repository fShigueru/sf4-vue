<template>
    <div id="ListNews">
        <div class="columns is-multiline" data-aos="zoom-in" v-if="news">
            <div class="column is-half" v-for="item in news">
                <div v-bind:style="{background: 'url(' + item.capa + ') no-repeat center center  ', backgroundSize: 'auto'}">
                    <div class="content">
                        <h2 class="title is-3">
                            {{ item.title }}
                        </h2>
                        <h3 class="subtitle">With some content</h3>
                        <p>{{ item.description }}</p>
                        <section class="is-pulled-right">
                            <a class="button is-dark hvr-push">Ver mais</a>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            Aguarde...
        </div>
    </div>
</template>
<script>
  export default {
    name: 'ListNews',
    computed: {
      news(){
        if (this.$store.state.error.length > 0) {
            return null;
        } else {
          return this.$store.state.news
        }
      }
    },
    created(){
      this.$store.cache.dispatch('load-news');
    }
  }
</script>