window.onload=function(i){let r=JSON.parse(document.querySelector(".usert").getAttribute("ig")),l=document.querySelector(".chat-container");l.scrollTop=l.scrollHeight;let t=document.querySelectorAll(".ownerChat");if(t.length!==0){let o=t.length-1,n=t[o],e="";n.getAttribute("check")=="unread"?e=`
<div class="tickbg tun">
   <div class="tick">
   </div>
</div>`:e=`
<div class="lp"><span>${r.first_name[0]+r.second_name[0]}</span></div>
`;let c=document.querySelector(".chat-container").lastElementChild;c.id===n.id&&n.parentElement.insertAdjacentHTML("afterend",e),console.log(c.id),a()}};function a(i){let l=document.querySelector(".cs").querySelector("input"),t=document.querySelectorAll(".otherChat"),o=[];t.forEach(e=>{e.getAttribute("check")=="unread"&&o.unshift(Number(e.id))});let n={text:o};fetch("/read",{method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":l.value},body:JSON.stringify(n)}).then(e=>e.json()).then(e=>{console.log(e)})}
