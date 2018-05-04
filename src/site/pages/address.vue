<template>
    <div id="localizacao">
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
                                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    </span>
                                    <span>Localização</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </section>
            </div>
            <section class="hero">
                <div class="container">
                    <div class="columns features">
                        <div class="column" data-aos="zoom-in">
                            <div class="card is-shady">
                                <div class="card-image has-text-centered">
                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                </div>
                                <div class="card-content">
                                    <div class="content">
                                        <h4 class="has-text-centered">(11) 98765-7654</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column" data-aos="zoom-in">
                            <div class="card is-shady">
                                <div class="card-image has-text-centered">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                </div>
                                <div class="card-content">
                                    <div class="content">
                                        <h4 class="has-text-centered">contato@gmail.com</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column" data-aos="zoom-in">
                            <div class="card is-shady">
                                <div class="card-image has-text-centered">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                                <div class="card-content">
                                    <div class="content">
                                        <h4 class="has-text-centered">Av Camelos, 34 - São Paulo SP </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <no-ssr>
                <google-map />
            </no-ssr>
        </div>
    </div>
</template>

<script>
  import GoogleMap from "~/components/GoogleMap";
  import './../assets/scss/address.scss'
  export default {
    name: 'localizacao',
    data () {
      return {
        title: 'Localização',
        description: 'No entanto, não podemos esquecer que o desenvolvimento contínuo de distintas formas de atuação faz parte de um processo de gerenciamento das posturas dos órgãos dirigentes com relação às suas atribuições. Acima de tudo, é fundamental ressaltar que a execução dos pontos do programa cumpre um papel essencial na formulação do orçamento setorial. É importante questionar o quanto o novo modelo',
        image: {
          src: 'http://lorempixel.com/544/362/',
          alt: 'Endereço'
        }
      }
    },
    components: {
      GoogleMap
    },
    metaInfo: {
      titleTemplate: '%s ← Localização',
      meta: [
        { vmid: 'description', name: 'description', content: 'Localização do site base' },
        { itemprop: 'name', content: 'Fshigueru base ← Localização' },
        { itemprop: 'description', content: 'Localização do site base' },
        { itemprop: 'image', content: '' }
      ]
    }
  }
</script>