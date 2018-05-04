<template>
    <div class="hero bg-parallax" >
        <no-ssr>
            <Parallaxy :parallax="true" :fixed="fixed" :speedFactor="0.10" :sectionHeight="0">
                <img :src="img" alt="very cool bg">
            </Parallaxy>
        </no-ssr>

        <div class="features-history">
            <section class="container">
                <div class="columns features">
                    <div class="column is-6" data-aos="zoom-in">
                        <section class="content">
                            <h2 class="title">{{ title }}</h2>
                            <p class="subtitle">{{ description }}</p>
                        </section>
                    </div>
                    <div class="column is-6" data-aos="zoom-in">
                        <div class="card is-shady">
                            <img :src="image.src" :alt="image.alt">
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</template>

<script>
  export default {
    data (context) {
      return {
        title: 'Nossa história',
        description: 'No entanto, não podemos esquecer que o desenvolvimento contínuo de distintas formas de atuação faz parte de um processo de gerenciamento das posturas dos órgãos dirigentes com relação às suas atribuições. Acima de tudo, é fundamental ressaltar que a execução dos pontos do programa cumpre um papel essencial na formulação do orçamento setorial. É importante questionar o quanto o novo modelo',
        image: {
          src: 'academia-1.jpg',
          alt: 'Academia'
        }
      }
    },
    props: ['img', 'fixed']
  }
</script>