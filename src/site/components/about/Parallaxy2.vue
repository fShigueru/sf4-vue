<template>
    <div id="parallaxy2">
        <div class="hero bg-parallax" style="position: relative; z-index: 1">
            <no-ssr>
                <Parallaxy :parallax="true" :fixed="fixed" :speedFactor="0.07">
                    <img :src="img" alt="very cool bg" style="position: fixed">
                    <div class="features-history">
                        <section class="container">
                            <div class="columns features">
                                <div class="column is-6" data-aos="fade-right">
                                    <div class="card is-shady">
                                        <img :src="image.src" :alt="image.alt">
                                    </div>
                                </div>
                                <div class="column is-6" data-aos="zoom-in">
                                    <section class="content">
                                        <h2 class="title">{{ title }}</h2>
                                        <p class="subtitle">{{ description }}</p>
                                    </section>
                                </div>
                            </div>
                        </section>
                    </div>
                </Parallaxy>
            </no-ssr>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'parallaxy2',
    data (context) {
      return {
        title: 'Conquistas',
        description: 'No entanto, não podemos esquecer que o desenvolvimento contínuo de distintas formas de atuação faz parte de um processo de gerenciamento das posturas dos órgãos dirigentes com relação às suas atribuições. Acima de tudo, é fundamental ressaltar que a execução dos pontos do programa cumpre um papel essencial na formulação do orçamento setorial. É importante questionar o quanto o novo modelo',
        image: {
          src: 'academia-2.jpg',
          alt: 'Academia'
        }
      }
    },
    props: ['img', 'fixed']
  }
</script>

<style lang="scss">
    #parallaxy2 {
        div.hero.bg-parallax {
            position: relative; z-index: 1
        }
        .features-history {
            z-index: 2;
            section.container {
                margin-top: 60px;
                margin-bottom: 3em;
            }
        }
    }
</style>