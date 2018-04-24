<template>
    <div id="home">
        <no-ssr>
            <div class="quick-menu-home">
                <scrollactive class="my-nav">
                    <quick-menu
                            :menu-count=quickMenu.count
                            :icon-class=quickMenu.icons
                            :menu-url-list=quickMenu.list
                            :backgroundColor=quickMenu.bg
                            :color=quickMenu.color
                    />
                </scrollactive>
            </div>
        </no-ssr>
        <carousel/>
        <div class="bg-default" id="conceito">
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
            <div class="is-divider" data-content="BULMA"></div>
        </div>
        <Parallaxy :img="img" :fixed="fixed"/>
        <div class="bg-default" id="galeria">
            <div class="is-divider" data-content="BULMA"></div>
            <section class="container">
                <div class="intro column is-8 is-offset-2">
                    <h2 class="title">Galeria</h2>
                    <br />
                    <p class="subtitle">Vel fringilla est ullamcorper eget nulla facilisi. Nulla facilisi nullam vehicula ipsum a. Neque egestas congue quisque egestas diam in arcu cursus.</p>
                    <br />
                </div>
                <Gallery/>
                <br />
                <br />
            </section>
        </div>
        <QuickView/>
    </div>
</template>

<script>
import Logo from '~/components/Logo.vue'
import Carousel from '~/components/Carousel.vue'
import Gallery from '~/components/Gallery.vue'
import Parallaxy from '~/components/Parallaxy.vue'
import QuickView from '~/components/QuickView.vue'
import './../assets/scss/home.scss'
import './../assets/js/scroll'
import 'aos/dist/aos.css'


export default {
  name: 'home',
  components: {
    Logo,
    Carousel,
    Gallery,
    Parallaxy,
    QuickView
  },
  created () {
    if (process.browser) {
      const AOS = require('aos')
      AOS.init();
    }
    if (process.browser) {
      window.addEventListener('load', function () {
        let element = document.getElementsByClassName("quick-menu");
        element[0].children[3].children[0].addEventListener("click", function(){
            document.getElementById("btn-contact").click();
        });

        let el = document.getElementsByClassName("sub-menu");
        for (let key in el) {
          if (el[key].children !== undefined) {
            el[key].children[0].addEventListener("click", function(){
              document.getElementsByClassName("quick-menu")[0].classList.remove("active");
            })
          }
        }

        let navMenu = document.getElementsByClassName('navbar-start');
        let navEl = navMenu[0].children;
        for (let key in navEl) {
          if (Number.isInteger(navEl[key]) === false) {
            if (navEl[key] && {}.toString.call(navEl[key]) !== '[object Function]') {
              navEl[key].addEventListener("click", function(){
                document.getElementsByClassName("navbar-menu")[0].classList.remove("is-active");
                document.getElementsByClassName("navbar-burger")[0].classList.remove("is-active");
              })
            }
          }
        }
      })
    }
  },
  mounted () {
  },
  data (context) {
    return {
      img: 'https://st2.depositphotos.com/1029143/10762/v/950/depositphotos_107629244-stock-illustration-pattern-with-flowers-and-leaves.jpg',
      quickMenu: {
        count: 4,
        list: ['#conceito','#galeria' ,'#historia' ,'#contato'],
        icons: ['fa fa-users', 'fa fa-picture-o', 'fa fa-history', 'fa fa-envelope-o'],
        bg: 'hsl(48, 100%, 67%)',
        color: 'hsl(0, 0%, 4%)'
      },
      fixed: true
    }
  }

}
</script>
