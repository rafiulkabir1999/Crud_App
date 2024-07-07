<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}

     <!-- Link Bootstrap CSS -->
     <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
     <!-- Additional CSS -->
     <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <title>Document</title>
</head>
<body style=" margin:0 auto" class="">

    <div class="d-flex">
        @include('common.dashboardHeader')
        <div id='website-body' class="flex-grow-1 slowdown content" style=''>
            <div class="p-3 text-white" style="background:#00652e">
                <div class="d-flex justify-content-between">
                    <div class="menu-hamburger" onclick="toggleSidebar()">
                        <svg width="25px" height="25px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path fill="#ffff" fill-rule="evenodd" d="M19 4a1 1 0 01-1 1H2a1 1 0 010-2h16a1 1 0 011 1zm0 6a1 1 0 01-1 1H2a1 1 0 110-2h16a1 1 0 011 1zm-1 7a1 1 0 100-2H2a1 1 0 100 2h16z"/>
                          </svg>
                    </div>

                    <div class="position-relative " id='logout' onclick="showmenu()" style="cursor:pointer">

                      <div class="profile">
                        <svg width="25px" height="25px" viewBox="0 0 20 20" version="1.1" 
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
   
                           {{-- <title>profile [#1341]</title>
                           <desc>Created with Sketch.</desc> --}}
                           <defs>
                       
                       </defs>
                           <g id="Page-1" stroke="none" stroke-width="1" fill="#ffff" fill-rule="evenodd">
                               <g id="Dribbble-Light-Preview" transform="translate(-180.000000, -2159.000000)" fill="#ffff">
                                   <g id="icons" transform="translate(56.000000, 160.000000)">
                                       <path d="M134,2008.99998 C131.783496,2008.99998 129.980955,2007.20598 129.980955,2004.99998 C129.980955,2002.79398 131.783496,2000.99998 134,2000.99998 C136.216504,2000.99998 138.019045,2002.79398 138.019045,2004.99998 C138.019045,2007.20598 136.216504,2008.99998 134,2008.99998 M137.775893,2009.67298 C139.370449,2008.39598 140.299854,2006.33098 139.958235,2004.06998 C139.561354,2001.44698 137.368965,1999.34798 134.722423,1999.04198 C131.070116,1998.61898 127.971432,2001.44898 127.971432,2004.99998 C127.971432,2006.88998 128.851603,2008.57398 130.224107,2009.67298 C126.852128,2010.93398 124.390463,2013.89498 124.004634,2017.89098 C123.948368,2018.48198 124.411563,2018.99998 125.008391,2018.99998 C125.519814,2018.99998 125.955881,2018.61598 126.001095,2018.10898 C126.404004,2013.64598 129.837274,2010.99998 134,2010.99998 C138.162726,2010.99998 141.595996,2013.64598 141.998905,2018.10898 C142.044119,2018.61598 142.480186,2018.99998 142.991609,2018.99998 C143.588437,2018.99998 144.051632,2018.48198 143.995366,2017.89098 C143.609537,2013.89498 141.147872,2010.93398 137.775893,2009.67298" id="profile-[#1341]">
                       
                       </path>
                                   </g>
                               </g>
                           </g>
                       </svg>
                      </div>

                        <div id='logoutcard' class="p-2 ms-auto card d-flex flex-column position-absolute  border  px-3 shadow hide" style="max-height:200px; right:0px ;right:0px ; transition:height .3s ease ;">
                            <span class="text-center" style="width:25px; height:25px ; background:red; text-align:right;">&#x2715;</span>
                            {{-- <button class="text-secondary  text-right cursor-pointer btn-sm btn-danger rounded-circle text-white " style="width:30px ; height:30px ;margin-left:auto" onclick="closelogout()">&#x2715;</button> --}}
                        <div class="my-1 p-2 text-white rounded" id='logoutbtn' style="min-width: 200px;">
                         <a href='/users/logout' class="text-secondary pe-4 rounded-3 fs-6 p-2 flex align-items-center text-white text-decoration-none ">     
                            
                             Logout
    
                        </a>
                        </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        <div class="p-4" style="width:100%;min-height:95vh">
            @yield('content')
        </div>
       <div class="d-flex justify-content-between  text-xs border align-items-center p-4" style="background:white;background#00652e">
        <p class="text-secondary m-0" style="font-size:13px">© Minister Hi-Tech Park Limited {{ now()->year }}, All Rights Reserved. Developed by <a class="text-decoration-none text-secondary icon-link icon-link-hover" href="https://trendsbird.com/">Trends Bird Limited</a></p>
      <img src="/image/icon/Banner-2.png" alt="">  
    </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Additional scripts -->
    <script src="{{ asset('js/app.js') }}"></script>



    <script>
        
        const toggleSidebar =()=> {
            const element = document.getElementById('sidebar')
            const content = document.getElementById('website-body')
            element.classList.toggle('sidebar')
            content.classList.toggle('content')

        }

       

        const showmenu = ()=> {
            const menu = document.getElementById('logoutcard')
            menu.classList.toggle('hide')
        }
        
        const closelogout = () => {
            // const elemnet = document.getElementById('logoutcard')
            // const menu = document.getElementById('logoutcard')
            // menu.classList.toggle('hide')
            const menu = document.getElementById('logoutcard')
            menu.classList.toggle('hide')
            console.log('clieked')
            showmenu();
            
        }
    </script>
</body>
</html>