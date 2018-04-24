<template>
    <div class="hero bg-parallax" style="position: relative;">
        <div class="columns features features-history" id="historia">
            <div class="column is-4"></div>
            <div class="column is-4">
                <div class="intro column is-8 is-offset-2">
                    <h2 class="title">Nossa história</h2>
                </div>
                <Timeline/>
            </div>
            <div class="column is-4">
            </div>
        </div>
        <no-ssr>
            <Parallaxy :parallax="true" :fixed="fixed" :speedFactor="0.10" :sectionHeight="0">
                <img :src="img" alt="very cool bg">
            </Parallaxy>
        </no-ssr>
    </div>
</template>

<script>
  import Timeline from '~/components/Timeline.vue'
  export default {
    components: {
      Timeline
    },
    props: ['img', 'fixed']
  }
</script>