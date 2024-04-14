import './bootstrap';
const form =document.querySelector("#form");
const listMessage=document.querySelector(".chat-container");
const typing=document.querySelector(".typing");
const inputMessage=document.querySelector("#input-message");

let other_info=JSON.parse(document.querySelector(".usert").getAttribute("ig"));
let otherOnline=other_info.last_seen;
console.log(otherOnline)
let connect=false;


//removing marking tick
function re_tick(params) {

    let ownerChats=document.querySelectorAll(".ownerChat")

  
        

  let nim=ownerChats.length-1;

let lastChat=ownerChats[nim];
if (lastChat !== undefined) {
if (lastChat.parentElement.parentElement.querySelector(".lp") != null) {
    lastChat.parentElement.parentElement.querySelector(".lp").remove()
}
if(lastChat.parentElement.parentElement.querySelector(".tickbg") != null){
    lastChat.parentElement.parentElement.querySelector(".tickbg").remove()
}

}
}





let id_r=document.querySelector(".id_r").value;
let owner_id=document.querySelector(".owner_id").value;
let reciever_id=document.querySelector(".reciever_id").value;



let channel3 =Echo.join("presence.user."+id_r);
channel3.here((user)=>{
    console.log(user.length)
    if (user.length == 2) {
        connect=true
    }
})
.joining((user)=>{
console.log(user.first_name+"joined")
connect=true
other_info.last_seen="now"
})
.leaving((user)=>{
    console.log(user.first_name+"left")
    connect=false
    other_info.last_seen=new Date()
})

let channel =Echo.private("private.playground."+id_r);

inputMessage.addEventListener("input",function (params) {

    if (inputMessage.value === 0) {
    
    }else{
    channel.whisper('typing',{
        email:"okolo"
    })
 

}
})

inputMessage.addEventListener("blur",function (params) {
        
        channel.whisper('stoppedTyping')   
    
})


channel.subscribed(()=>{
    console.log(channel)
})
.listenForWhisper('typing',(event)=>{
    typing.textContent=event.email + "is typing..."
    })

    .listenForWhisper('stoppedTyping',(event)=>{
        typing.textContent=" "
        })
        .listenForWhisper('chat',(event)=>{

            re_tick()
   
gret(event.chat,"justify-content-start",false,"otherChat")


typing.textContent=" "
            })

    


form.addEventListener("submit",function (event) {
    const inputMessage=document.querySelector("#input-message");
    event.preventDefault() 
    if (inputMessage.value===0) {
        
    }else{

     

    //mark as read if the two users are connected

    

        re_tick()




channel.whisper("chat",{
    chat:inputMessage.value

})

    const userInput=inputMessage.value;
gret(userInput,"justify-content-end",true,"ownerChat")


mess2(other_info,userInput)


    
    inputMessage.value="";


    axios.post("/chat-message",{
        owner_id:owner_id,
        reciever_id:reciever_id,
        chat_id:id_r,
        message:userInput,
        check:connect
    })
}
})

//updating message list


let channel2=Echo.channel("public.sendMessage"+owner_id);

channel2.subscribed(()=>{

    console.log(channel2)
})
.listen('.sendMessage',(e)=>{
mess(e)

})

function mess(e) {
    let rt='';
    if (otherOnline== "now") {
        rt=`<span class="online_icon""></span>`
    }
        
    let urel="http://127.0.0.1:8000/chat/" + e.user[0].id;

    let real=  `	<li class="hup divide">
    <a href="${urel}" style="text-decoration:none;" class="d-flex bd-highlight">
        
            <div class="img_cont2">
            <div class="pp"><span>${other_info.first_name[0] + other_info.second_name[0]}</span></div>
                ${rt}
            </div>
            <div class="user_info">
            
                <span>${e.user[0].first_name}</span>
              
                <p>${e.chat.message}</p>

                <span class="user_id" id="${e.user[0].id}"></span>
            </div>

        </a> 
        <p class="comingIn">5</p>
    </li>`


    let users_id=document.querySelectorAll(".user_id");
  
   
    users_id.forEach(ele => {
        let id=ele.id;
        if (id == e.user[0].id) {
            ele.parentElement.parentElement.parentElement.remove()
        }
    });

    document.querySelector(".contacts").insertAdjacentHTML('afterbegin',real)
}

function gret(e,cl,ft,th) {
    let add=``
   if (ft) {
        if (connect) {
            add=` <div class="lp"><span>${other_info.first_name[0]+other_info.second_name[0]}</span></div>`  
    }else{
        add=` <div class="tickbg tun"> <div class="tick"> </div> </div>`;
    }
    }
  
    let gy=`
    <div class="d-flex mb-4 ${cl}">
								
    <div class="msg_cotainer">
<span class="${th}">${e}</span>

    </div>
${add}
</div> `;
listMessage.innerHTML +=gy
let div = document.querySelector('.chat-container');
  div.scrollTop = div.scrollHeight;
}


function mess2(user,chat) {
    let rt='';
    if (otherOnline== "now") {
        rt=`<span class="online_icon""></span>`
    }
    let urel="http://127.0.0.1:8000/chat/" + user.id;

    let real=  `	<li class="hup divide">
    <a href="${urel}" style="text-decoration:none;" class="d-flex bd-highlight">
        
            <div class="img_cont2">
            <div class="pp"><span>${other_info.first_name[0] + other_info.second_name[0]}</span></div>
               ${rt}
            </div>
            <div class="user_info">
            
                <span>${user.first_name}</span>
                <p>${chat}</p>

                <span class="user_id" id="${user.id}"></span>
            </div>

        </a> 
        <p class="comingIn">5</p>
    </li>`


    let users_id=document.querySelectorAll(".user_id");
  
   
    users_id.forEach(ele => {
        let id=ele.id;
        if (id == user.id) {
            ele.parentElement.parentElement.parentElement.remove()
        }
    });

    document.querySelector(".contacts").insertAdjacentHTML('afterbegin',real)   
}