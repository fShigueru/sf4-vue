<template>
    <div id="news">
        <div class="bg-default">
            <section class="hero is-warning is-medium intro">
                <div class="div clasy">
                    <div class="container">
                        <div class="intro-columns">
                            <div class="intro-content animated flipInX">
                                <h1 class="title" data-aos="zoom-in">
                                    {{ title }}
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container">
                <section class="section section-breadcrumb">
                    <nav class="breadcrumb" aria-label="breadcrumbs">
                        <ul>
                            <li>
                                <a href="#">
                                <span class="icon is-small">
                                  <i class="fa fa-home" aria-hidden="true"></i>
                                </span>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                <span class="icon is-small">
                                  <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                </span>
                                    <span>Notícias</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </section>
            </div>
            <div class="container">
            <section class="section">
                <NewsList />
            </section>
            </div>
        </div>
    </div>
</template>

<script>
 import NewsList from '~/components/NewsList.vue'
 import './../assets/scss/news.scss'
  export default {
    name: 'news',
    data () {
      return {
        title: 'Notícias'
      }
    },
    components: {
      NewsList
    },
    metaInfo: {
      titleTemplate: '%s ← Notícias',
      meta: [
        { vmid: 'description', name: 'description', content: 'Notícias do site base' },
        { itemprop: 'name', content: 'Fshigueru base ← Notícias' },
        { itemprop: 'description', content: 'Notícias do site base' },
        { itemprop: 'image', content: '' }
      ]
    }
  }
</script>