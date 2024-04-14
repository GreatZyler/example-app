$(document).ready(function(){
    $('#action_menu_btn').click(function(){
        $('.action_menu').toggle();
    });
        });

        let auth_user_id=Number(document.querySelector(".auth").id)
      
        let cs=document.querySelector(".cs");
        let csrf=cs.querySelector("input")
        let cont=document.querySelector(".kj")

let searchbar=document.querySelector("#search")
searchbar.addEventListener('keyup',()=>{
  document.querySelector(".searched").style.display="block"
  let val={text:searchbar.value};
 
  closeSearch();

 

  if(searchbar.value.length===0){
cont.innerHTML=''
  }else{
   
    document.querySelector(".loader").style.display="block";
  fetch("/searchresult",{
    method:"POST",
    headers:{ 
     'Content-Type':"application/json",
     'X-CSRF-TOKEN':csrf.value,
   },
   body:JSON.stringify(val)
  })
  .then(e=>e.json())
  .then((data)=>{
console.log(data)
    document.querySelector(".loader").style.display="none";
    cont.innerHTML=''
   
    data.users.forEach(res => {
      let tj='';
      let yj='';
            let df='';
let match1=data.owner.find((sr)=>{
      if ( res.id == sr) {
        return tj=3;
      }
    })   
    console.log(match1)
  
let matching2 = data.request.find(function(user2) {
    if ( res.id === user2.for_id &&  user2.from_id==auth_user_id) {
      yj=user2.id;
      return  tj=1;

    }else if (res.id === user2.from_id &&  user2.for_id==auth_user_id) {
      yj=user2.id;
      return tj=2
    }
  });

  if (tj==1) {
    df=`<p class="af  c-red can-req" id=${yj} un=${res.id}>Cancel Request <div class="lader" id="loader-1"></div></p>`;
    }else if(tj==2){
      df=`<p class="af c-blue acp-request" id=${res.id} un=${yj}>Accept Request <div class="lader" id="loader-1"></div></p>`;
    }else if(tj==3){
      df=`<p class="af" id=${res.id}><a href="/chat/${res.id}" style="text-decoration:none;">Message</a> <div class="lader" id="loader-1"></div></p>` 
    }
    else{
    df=`<p class="af tgn" id=${res.id}>Add Friend <div class="lader" id="loader-1"></div></p>` 
  }

      let tg=`<li class="hup">
      <div class="d-flex bd-highlight">
        
        <div class="us_fo">
          <span>${res.first_name +" "+ res.second_name}</span>
          <p>Kalid is online</p>
        
          <div class="lk">`
          + 
          df
         +
          `</div>
        </div>
      </div>

    </li>`

    cont.innerHTML +=tg;
    add_friends()
    can_req();
    acp_request();
    });
  })
  }
})    
   


function add_friends() {

  let clicks=document.querySelectorAll(".tgn");
  clicks.forEach(click => {
    let check="";
    click.addEventListener("click",()=>{


if (check !== 'sent') {
  let parent=click.parentElement;
  parent.querySelector(".lader").style.display="block";
  let id={num:click.id}
 
  click.style.display="none"

      fetch("/Res",{
        method:"POST",
        headers:{ 
         'Content-Type':"application/json",
         'X-CSRF-TOKEN':csrf.value,
       },
       body:JSON.stringify(id)
      }).then(e=>e.json())
      .then((data)=>{
        parent.querySelector(".lader").style.display="none";
        click.style.display="block";
        click.innerHTML="Request Sent";
        click.className="sen"
        check="sent";
      })

    }else{

    }
    })
  });
}


function closeSearch() {
  document.querySelector(".close").addEventListener("click",()=>{
    
    document.querySelector(".close").parentElement.style.display="none";
  })
}


//canceling request

function can_req(params) {
  let requests=document.querySelectorAll(".can-req");
  requests.forEach(quest => {
    quest.addEventListener("click",()=>{

      let parent=quest.parentElement;
      parent.querySelector(".lader").style.display="block";
      let id={num:quest.id}


 
 fetch("/cancel",{
  method:"POST",
  headers:{ 
   'Content-Type':"application/json",
   'X-CSRF-TOKEN':csrf.value,
 },
 body:JSON.stringify(id)
}).then(e=>e.json())
.then((data)=>{
 
  parent.querySelector(".lader").style.display="none";
  quest.style.display="block";
  quest.innerHTML="Request Cancelled";
  quest.className="sen"
  

})


    })
  });
}


//accepting request

function acp_request(params) {
  let request =document.querySelectorAll(".acp-request");
  request.forEach(quest => {



    quest.addEventListener("click",()=>{



      let parent=quest.parentElement;
      parent.querySelector(".lader").style.display="block";
      let id={user_id:Number(quest.id),data_id:Number(quest.getAttribute("un"))}
   

 
 fetch("/accept",{
  method:"POST",
  headers:{ 
   'Content-Type':"application/json",
   'X-CSRF-TOKEN':csrf.value,
 },
 body:JSON.stringify(id)
}).then(e=>e.json())
.then((data)=>{

  parent.querySelector(".lader").style.display="none";
  parent.querySelector(".af").remove();

  parent.innerHTML +=` <p class="af"> <a href="/chat/${id.user_id}" style="text-decoration:none;">Message</a></p>`;

  

})
    })
  });
}


acp_request();