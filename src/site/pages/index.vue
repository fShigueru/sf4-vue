<template>
    <div id="app">
        <Carousel/>
        <div class="bg-default">
            <div class="intro column is-8 is-offset-2">
                <h2 class="title">Conceito</h2><br>
                <p class="subtitle">Vel fringilla est ullamcorper eget nulla facilisi. Nulla facilisi nullam vehicula ipsum a. Neque egestas congue quisque egestas diam in arcu cursus.</p>
            </div>
            <section class="container">
              <div class="columns features">
                  <div class="column is-4" data-aos="zoom-in">
                      <div class="card is-shady">
                          <div class="card-image has-text-centered">
                              <i class="fa fa-wheelchair-alt" aria-hidden="true"></i>
                          </div>
                          <div class="card-content">
                              <div class="content">
                                  <h4>Tristique senectus et netus et. </h4>
                                  <p>Purus semper eget duis at tellus at urna condimentum mattis. Non blandit massa enim nec. Integer enim neque volutpat ac tincidunt vitae semper quis.</p>
                                  <p><a href="#">Learn more</a></p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="column is-4" data-aos="zoom-in">
                      <div class="card is-shady">
                          <div class="card-image has-text-centered">
                              <i class="fa fa-clock-o" aria-hidden="true"></i>
                          </div>
                          <div class="card-content">
                              <div class="content">
                                  <h4>Tempor orci dapibus ultrices in.</h4>
                                  <p>Ut venenatis tellus in metus vulputate. Amet consectetur adipiscing elit pellentesque. Sed arcu non odio euismod lacinia at quis risus. Faucibus turpis.</p>
                                  <p><a href="#">Learn more</a></p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="column is-4" data-aos="zoom-in">
                      <div class="card is-shady">
                          <div class="card-image has-text-centered">
                              <i class="fa fa-leaf" aria-hidden="true"></i>
                          </div>
                          <div class="card-content">
                              <div class="content">
                                  <h4> Leo integer malesuada nunc vel risus.  </h4>
                                  <p>Imperdiet dui accumsan sit amet nulla facilisi morbi. Fusce ut placerat orci nulla pellentesque dignissim enim.</p>
                                  <p><a href="#">Learn more</a></p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </section>
            <section class="container">
              <Gallery/>
            </section>
        </div>
        <div>
            <div class="columns features">
                <div class="column is-4"></div>
                <div class="column is-4"></div>
                <div class="column is-4">
                    <div class="card is-shady" data-aos="fade-left">
                        <div class="card-image has-text-centered">
                            <i class="fa fa-wheelchair-alt" aria-hidden="true"></i>
                        </div>
                        <div class="card-content">
                            <div class="content">
                                <h4>Tristique senectus et netus et. </h4>
                                <p>Purus semper eget duis at tellus at urna condimentum mattis. Non blandit massa enim nec. Integer enim neque volutpat ac tincidunt vitae semper quis.</p>
                                <p><a href="#">Learn more</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <Parallaxy :img="img" :fixed="fixed"/>
        </div>

    </div>
</template>

<script>
import Logo from '~/components/Logo.vue'
import Carousel from '~/components/Carousel.vue'
import Gallery from '~/components/Gallery.vue';
import Parallaxy from '~/components/Parallaxy.vue';
import Parallaxy2 from '~/components/Parallaxy.vue';

import 'aos/dist/aos.css'


export default {
  name: 'app',
  components: {
    Logo,
    Carousel,
    Gallery,
    Parallaxy,
    Parallaxy2
  },
  created () {
    if (process.browser) {
      const AOS = require('aos')
      AOS.init();
    }

  },
  data (context) {
    return {
      img: 'https://wikiki.github.io/images/merry-christmas.jpg',
      fixed: true
    }
  }

}
</script>