<template>
    <div id="quickview">
        <div id="quickviewDefault" class="quickview">
            <header class="quickview-header">
                <p class="title"></p>
                <span class="delete" data-dismiss="quickview"></span>
            </header>
            <div class="quickview-body">
                <div class="section">
                    <div class="quickview-block">
                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Text input">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Username</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-success" type="text" placeholder="Text input" value="bulma">
                                <span class="icon is-small is-left">
                                <i class="fa fa-user"></i>
                            </span>
                                <span class="icon is-small is-right">
                                <i class="fa fa-check"></i>
                            </span>
                            </div>
                            <p class="help is-success">This username is available</p>
                        </div>

                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-danger" type="email" placeholder="Email input" value="hello@">
                                <span class="icon is-small is-left">
                              <i class="fa fa-envelope"></i>
                            </span>
                                <span class="icon is-small is-right">
                              <i class="fa fa-exclamation-triangle"></i>
                            </span>
                            </div>
                            <p class="help is-danger">This email is invalid</p>
                        </div>

                        <div class="field">
                            <label class="label">Message</label>
                            <div class="control">
                                <textarea class="textarea" placeholder="Textarea"></textarea>
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
        <!--
        <button class="button is-primary" data-show="quickview" data-target="quickviewDefault">
            Show quickview
        </button>
        -->
    </div>
</template>

<script>
  import './../assets/js/quickview'
  export default {
    name: 'quickview',
  }
</script>