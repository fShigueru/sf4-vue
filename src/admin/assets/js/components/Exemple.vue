<template>
    <p> {{ info.data }} </p>
</template>

<script>
    import axios from 'axios'
    export default {
        name: "example",
        data () {
            return {
              info: null
            }
        },
        mounted () {
            axios
                .get('http://localhost:8080/api/news', {
                    headers: {
                      "X-AUTH-TOKEN": "GztGBc9qjZfDg3K55xYQs9FN3eiHHt6wk5V8OfCTscI"
                    }
                })
                .then(response => (this.info = response))
        }
    }
</script>