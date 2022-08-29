require('./bootstrap');

const axios = require("axios");

//appel form du la page welcome.blade.php

const form = document.getElementById('form') ;
// message
const inputMessage = document.getElementById('input-message');

//
form.addEventListener('submit', function (event) {
event.preventDefault();
    const userInput = inputMessage.value;

    axios.post('/chat-message', {
        message: userInput
    })

});


const channel = Echo.channel('public.chat.1');

channel.subscribed(()=> {
    console.log('subscribed!');
    }).listen('.chat-message',(event) => {

    console.log(event);
    }
)


