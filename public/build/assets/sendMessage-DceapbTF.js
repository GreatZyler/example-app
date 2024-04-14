import"./bootstrap-CtnzlWyv.js";const _=document.querySelector("#form"),y=document.querySelector(".chat-container"),d=document.querySelector(".typing"),u=document.querySelector("#input-message");let i=JSON.parse(document.querySelector(".usert").getAttribute("ig")),p=i.last_seen;console.log(p);let o=!1;function f(e){let t=document.querySelectorAll(".ownerChat"),n=t.length-1,s=t[n];s!==void 0&&(s.parentElement.parentElement.querySelector(".lp")!=null&&s.parentElement.parentElement.querySelector(".lp").remove(),s.parentElement.parentElement.querySelector(".tickbg")!=null&&s.parentElement.parentElement.querySelector(".tickbg").remove())}let m=document.querySelector(".id_r").value,g=document.querySelector(".owner_id").value,E=document.querySelector(".reciever_id").value,S=Echo.join("presence.user."+m);S.here(e=>{console.log(e.length),e.length==2&&(o=!0)}).joining(e=>{console.log(e.first_name+"joined"),o=!0,i.last_seen="now"}).leaving(e=>{console.log(e.first_name+"left"),o=!1,i.last_seen=new Date});let c=Echo.private("private.playground."+m);u.addEventListener("input",function(e){u.value===0||c.whisper("typing",{email:"okolo"})});u.addEventListener("blur",function(e){c.whisper("stoppedTyping")});c.subscribed(()=>{console.log(c)}).listenForWhisper("typing",e=>{d.textContent=e.email+"is typing..."}).listenForWhisper("stoppedTyping",e=>{d.textContent=" "}).listenForWhisper("chat",e=>{f(),v(e.chat,"justify-content-start",!1,"otherChat"),d.textContent=" "});_.addEventListener("submit",function(e){const t=document.querySelector("#input-message");if(e.preventDefault(),t.value!==0){f(),c.whisper("chat",{chat:t.value});const n=t.value;v(n,"justify-content-end",!0,"ownerChat"),$(i,n),t.value="",axios.post("/chat-message",{owner_id:g,reciever_id:E,chat_id:m,message:n,check:o})}});let h=Echo.channel("public.sendMessage"+g);h.subscribed(()=>{console.log(h)}).listen(".sendMessage",e=>{q(e)});function q(e){let t="";p=="now"&&(t='<span class="online_icon""></span>');let s=`	<li class="hup divide">
    <a href="${"http://127.0.0.1:8000/chat/"+e.user[0].id}" style="text-decoration:none;" class="d-flex bd-highlight">
        
            <div class="img_cont2">
            <div class="pp"><span>${i.first_name[0]+i.second_name[0]}</span></div>
                ${t}
            </div>
            <div class="user_info">
            
                <span>${e.user[0].first_name}</span>
              
                <p>${e.chat.message}</p>

                <span class="user_id" id="${e.user[0].id}"></span>
            </div>

        </a> 
        <p class="comingIn">5</p>
    </li>`;document.querySelectorAll(".user_id").forEach(a=>{a.id==e.user[0].id&&a.parentElement.parentElement.parentElement.remove()}),document.querySelector(".contacts").insertAdjacentHTML("afterbegin",s)}function v(e,t,n,s){let l="";n&&(o?l=` <div class="lp"><span>${i.first_name[0]+i.second_name[0]}</span></div>`:l=' <div class="tickbg tun"> <div class="tick"> </div> </div>');let a=`
    <div class="d-flex mb-4 ${t}">
								
    <div class="msg_cotainer">
<span class="${s}">${e}</span>

    </div>
${l}
</div> `;y.innerHTML+=a;let r=document.querySelector(".chat-container");r.scrollTop=r.scrollHeight}function $(e,t){let n="";p=="now"&&(n='<span class="online_icon""></span>');let l=`	<li class="hup divide">
    <a href="${"http://127.0.0.1:8000/chat/"+e.id}" style="text-decoration:none;" class="d-flex bd-highlight">
        
            <div class="img_cont2">
            <div class="pp"><span>${i.first_name[0]+i.second_name[0]}</span></div>
               ${n}
            </div>
            <div class="user_info">
            
                <span>${e.first_name}</span>
                <p>${t}</p>

                <span class="user_id" id="${e.id}"></span>
            </div>

        </a> 
        <p class="comingIn">5</p>
    </li>`;document.querySelectorAll(".user_id").forEach(r=>{r.id==e.id&&r.parentElement.parentElement.parentElement.remove()}),document.querySelector(".contacts").insertAdjacentHTML("afterbegin",l)}
