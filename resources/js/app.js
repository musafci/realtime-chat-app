
require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'

import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('message', require('./components/message.vue').default);


const app = new Vue({
    el: '#app',
    
    data: {
        message: '',
        chat: {
            message: [],
        },
    },

    methods: {
        send() {
            if(this.message.length != 0) {
                this.chat.message.push(this.message)               
                
                axios.post('/send', {
                    message: this.message
                })
                .then(function (response) {
                    console.log(response)
                    this.message = ''
                })
                .catch(function (error) {
                    console.log(error)
                })

            }
        }
    },

    mounted(){
        Echo.private('chat')
        .listen('ChatEvent', (e) => {
            this.chat.message.push(e.message)
            console.log(e);
        });
    },

});
