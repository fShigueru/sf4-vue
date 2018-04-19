<template>
    <div id="about" class="container">
        <div class="tile is-ancestor">
            <div class="tile is-vertical is-8">
                <div class="tile">
                    <div class="tile is-parent is-vertical">
                        <article class="tile is-child notification is-primary">
                            <p class="title">{{ title }}</p>
                            <p class="subtitle">Top tile</p>
                            <span class="icon is-large" style="background-color: yellow">
                      <i class="mdi mdi-48px mdi-home" style="color: #000000"></i>
                    </span>
                        </article>
                        <article class="tile is-child notification is-warning">
                            <p class="title">...tiles</p>
                            <p class="subtitle">Bottom tile</p>
                            <div class="field">
                                <input class="is-checkradio has-background-color is-danger" id="exampleCheckboxBackgroundColorDanger" type="checkbox" name="exampleCheckboxBackgroundColorDanger" checked="checked">
                                <label for="exampleCheckboxBackgroundColorDanger">Checkbox - danger</label>
                            </div>
                        </article>
                    </div>
                    <div class="tile is-parent">
                        <article class="tile is-child notification is-info">
                            <p class="title">Middle tile</p>
                            <p class="subtitle">With an image</p>
                            <figure class="image is-4by3">
                                <img src="https://bulma.io/images/placeholders/640x480.png">
                            </figure>
                        </article>
                    </div>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child notification is-danger">
                        <p class="title">Wide tile</p>
                        <p class="subtitle">Aligned with the right tile</p>
                        <div class="content">
                            <div class="tabs is-toggle">
                                <ul>
                                    <li class="is-active">
                                        <a>
                                            <span class="icon is-small"><i class="fas fa-image" aria-hidden="true"></i></span>
                                            <span>Pictures</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="icon is-small"><i class="fas fa-music" aria-hidden="true"></i></span>
                                            <span>Music</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="icon is-small"><i class="fas fa-film" aria-hidden="true"></i></span>
                                            <span>Videos</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="icon is-small"><i class="fas fa-file-text-o" aria-hidden="true"></i></span>
                                            <span>Documents</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child notification is-success">
                    <div class="content">
                        <p class="title">Tall tile</p>
                        <p class="subtitle">With even more content</p>
                        <div class="content">
                            <article class="message">
                                <div class="message-header">
                                    <p>Hello World</p>
                                    <button class="delete" aria-label="delete"></button>
                                </div>
                                <div class="message-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
                                </div>
                            </article>
                            <article class="message is-danger">
                                <div class="message-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
                                </div>
                            </article>
                            <a class="open-modal" data-modal-id="#my-modal" @click="openModal">Open My Modal</a>

                            <div class="modal" v-bind:class="classObject">
                                <div class="modal-background"></div>
                                <div class="modal-content">
                                    <p class="image is-4by3">
                                        <img src="https://bulma.io/images/placeholders/1280x960.png" alt="">
                                    </p>
                                </div>
                                <button class="modal-close is-large" aria-label="close" @click="closeModal"></button>
                            </div>

                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</template>
<script>
  export default {
    name: 'about',
    data () {
      return {
        title: 'About',
        classObject: {
          'is-active': false
        }
      }
    },
    methods: {
      openModal: function(){
        this.classObject['is-active'] = true
      },
      closeModal: function(){
        this.classObject['is-active'] = false
      }
    }
  };
</script>
