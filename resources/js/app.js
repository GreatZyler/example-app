
import './bootstrap';

const listMessage=document.querySelector(".chat-container");
const typing=document.querySelector(".typing");
const inputMessage=document.querySelector("#input-message");
let id_r=document.querySelector(".id_r").value;

let channel =Echo.private("private.playground."+id_r);

let channel2=Echo.channel("public.sendMessage.1");

channel.subscribed(()=>{
    console.log(channel)
}).listen('.playground',(e)=>{

})




