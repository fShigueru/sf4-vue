<template>
    <div id="about">
        <div class="bg-default">
            <section class="hero is-medium intro">
                <div class="div clasy">
                    <div class="container">
                        <div class="intro-columns">
                            <div class="intro-content animated flipInX">
                                <h1 class="title" data-aos="zoom-in">
                                    {{ titles.one }}
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <section class="hero brad">
            <div class="container">
                <section class="section section-breadcrumb">
                    <nav class="breadcrumb" aria-label="breadcrumbs">
                        <ul>
                            <li>
                                <nuxt-link to="/">
                                    <span class="icon is-small">
                                      <i class="fa fa-home" aria-hidden="true"></i>
                                    </span>
                                    <span>Home</span>
                                </nuxt-link>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon is-small">
                                      <i class="fa fa-header" aria-hidden="true"></i>
                                    </span>
                                    <span>Quem somos</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </section>
            </div>
        </section>
        <Parallaxy :img="img" :fixed="true"/>
        <div class="bg-default">
            <section class="hero is-medium intro">
                <div class="div clasy">
                    <div class="container">
                        <div class="intro-columns">
                            <div class="intro-content animated flipInX">
                                <h1 class="title" data-aos="zoom-in">
                                    {{ titles.two }}
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <Parallaxy2 :img="img2" :fixed="false"/>
    </div>
</template>
<script>
  import Parallaxy from '~/components/about/Parallaxy.vue'
  import Parallaxy2 from '~/components/about/Parallaxy2.vue'
  import './../assets/scss/about.scss'

  export default {
    name: 'about',
    data () {
      return {
        img: 'https://st2.depositphotos.com/1029143/10762/v/950/depositphotos_107629244-stock-illustration-pattern-with-flowers-and-leaves.jpg',
        img2: 'https://st3.depositphotos.com/1465111/18943/i/1600/depositphotos_189430050-stock-photo-indigenous-colourful-wood-artisan-handicraft.jpg',
        fixed: true,
        titles: {
          one: 'Quem somos',
          two: 'Conquistas'
        }
      }
    },
    components: {
      Parallaxy,
      Parallaxy2
    },
    metaInfo: {
      titleTemplate: '%s ← Quem somos',
      meta: [
        { vmid: 'description', name: 'description', content: 'Quem somos do site base' },
        { itemprop: 'name', content: 'Fshigueru base ← Quem somos' },
        { itemprop: 'description', content: 'Quem somos do site base' },
        { itemprop: 'image', content: '' }
      ]
    }
  };
</script>
