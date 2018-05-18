<template>
    <div id="quickview">
        <div id="quickviewDefault" class="quickview" v-bind:class="{ 'is-active': quickActive}">
            <header class="quickview-header">
                <p class="title">
                    Dúvidas? entre em contato :)
                </p>
                <span class="delete" v-on:click="quickViewHide" data-dismiss="quickview"></span>
            </header>
            <div class="quickview-body">
                <div class="section">
                    <div class="quickview-block">
                        <div class="field">
                            <label class="label">Nome</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input" type="text" placeholder="Nome">
                                <span class="icon is-small is-left">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">E-mail</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input" type="email" placeholder="E-mail">
                                <span class="icon is-small is-left">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Mensagem</label>
                            <div class="control">
                                <textarea class="textarea" placeholder="Mensagem"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="quickview-footer">
                <div class="field is-grouped">
                    <div class="control m-r-md">
                        <button class="button is-success">Submit</button>
                    </div>
                    <div class="control">
                        <button class="button is-danger">Cancel</button>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'quickview',
    data () {
      return {
        quickActive: false
      }
    },
    methods: {
      quickViewHide: function () {
        this.$el.querySelector('.quickview').classList.remove('is-active');
      }
    }
  }
</script>
<style lang="scss">
.quickview-header {
    .title {
        margin: 0;
        font-weight: 400;
    }
}
</style>