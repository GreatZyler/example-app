//automatic scroll user to last chat on load

window.onload=function (params) {
  let other_info=JSON.parse(document.querySelector(".usert").getAttribute("ig"))

    let div = document.querySelector('.chat-container');
  div.scrollTop = div.scrollHeight;



  let ownerChats=document.querySelectorAll(".ownerChat")
if(ownerChats.length ===0){}else{
  let nim=ownerChats.length-1;

let lastChat=ownerChats[nim];

  let tun='';
if (lastChat.getAttribute("check")=="unread") {
tun=`
<div class="tickbg tun">
   <div class="tick">
   </div>
</div>`;
}else{
 tun=`
<div class="lp"><span>${other_info.first_name[0]+other_info.second_name[0]}</span></div>
`;
}
let chat_container=document.querySelector(".chat-container").lastElementChild;



if (chat_container.id === lastChat.id) {
  
lastChat.parentElement.insertAdjacentHTML('afterend',tun)
}
console.log(chat_container.id)



  auth();
}
}


function auth(params) {
  let cs=document.querySelector(".cs");
let csrf=cs.querySelector("input")
  let otherChats=document.querySelectorAll(".otherChat");
  let ids=[];
  otherChats.forEach(chat => {
    if (chat.getAttribute("check")=="unread") {
    
      ids.unshift(Number(chat.id))
    }
  });
  let info={
    'text':ids
  }
 fetch("/read",{
  method:"POST",
  headers:{ 
    'Content-Type':"application/json",
    'X-CSRF-TOKEN':csrf.value,
  },
  body:JSON.stringify(info)
 })
 .then(res=>res.json())
 .then((data)=>{
  console.log(data);
 })
}