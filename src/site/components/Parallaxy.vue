<template>
    <div class="hero" style="position: relative;">
        <no-ssr>
            <Parallaxy :parallax="true" :fixed="fixed" :speedFactor="0.10" :sectionHeight="20">
                <img :src="img" alt="very cool bg">
            </Parallaxy>
        </no-ssr>
    </div>
</template>

<script>
  export default {
    props: ['img', 'fixed']
  }
</script>