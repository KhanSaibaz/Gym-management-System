const body= document.querySelector("body"),
     sidebar= body.querySelector(".sidebar"),
     toggle= body.querySelector(".toggle"),
     Searchbox= body.querySelector(".Search-box"),
     modeswitch= body.querySelector(".toggle-switch"),
     modetext= body.querySelector(".mode-text");


     toggle.addEventListener('click',()=>{
        sidebar.classList.toggle("close");
     })

     modeswitch.addEventListener('click',()=>{
        body.classList.toggle("dark");

        if(body.classList.contains('dark')){
         modetext.innerHTML='Light Mode'
        }
        else{
         modetext.innerHTML='Dark Mode'

        }
     })