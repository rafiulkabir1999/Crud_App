           <div id='sidebar' class="slowdown position-fixed mb-3 bg-dark" style="min-height: 100vh;width:300px">
           <div class="mt-3 bg-dark  border-secondary d-flex align-items-center justify-content-center">
               <p class="m-0    text-secondary text-center fw-bold fs-3 text-wrap ">
                   <a href="/" class="text-decoration-none">
                    <img src="/image/icon/Minister_Web_LOGO-03.png" alt="">    
                   </a>
               </p>
           
           </div>
               <p class="pb-4 text-secondary text-center fw-semibold fs-4 text-white">Dashboard</p>
               
               
               
               <div class=" mx-3">
               <div class=" p-0">
                   <div onclick="handleclick()" id='showroom' class="d-flex flex-column overflow-hidden open {{ request()->is('showrooms/*') ? 'open' : 'null'}}" >
                     <div class="d-flex justify-content-between align-items-center p-2 rounded-1 " style="background:#00652e;cursor:pointer">
                       
                         <p class="m-0 p-0 text-white fw-bold"> Showroom</p>
                         <div id='icon' class="cursor-pointer text-center  text-white" >
                           {{-- <img src="/image/icon/down-arrow.svg" alt="" style=""> --}}
                           {{-- <img src="image/profile_icon/profile_1.png" alt=""> --}}
                           <svg width="20px" height="20px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="#ffff" /></svg>
                         </div>
                     </div>
                       <ul id='submenu_showrooms' class="d-flex flex-column mt-1  px-0 ">
                        <a href="/showrooms" class="text-decoration-none  text-white text-xs  "> 
                         <li class="{{ request()->is('showrooms') ? 'active' : 'null'}} ps-4 list-unstyled p-2" style="font-size: 14px">
           
                           Show Showroom
                         </li>
                        </a>
                         
                         <a href="/showrooms/create" class="text-decoration-none  text-white text-xs ">
                         <li class="{{ request()->is('showrooms/create') ? 'active' : 'null'}}  ps-4  list-unstyled p-2" style="font-size: 14px">
           
                           Add Showroom
                         </li>
                        </a>
                         
                         
                       </ul>
                   </div>
                   
                   
                   
               </div>
           
               {{-- <div class="dropdown">
             <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
               Dropdown button
             </button>
             <ul class="dropdown-menu">
               <li><a class="dropdown-item" href="#">Action</a></li>
               <li><a class="dropdown-item" href="#">Another action</a></li>
               <li><a class="dropdown-item" href="#">Something else here</a></li>
             </ul>
           </div> --}}
           </div>
           </div>
           
           <script>
              function handleclick(){
                 const submenu = document.getElementById('showroom')
                 const icon = document.getElementById('icon')
                 submenu.classList.toggle('open');
                 icon.classList.toggle('rotate');
           
               }
           </script>
           