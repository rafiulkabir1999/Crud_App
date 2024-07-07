
<div>
  <div class="d-flex justify-content-between p-2 bg-primary text-light">
    <div class="d-flex ps-4">
        <a href="/" class="text-decoration-none text-light">
          <p class="pe-4 pb-1 mb-0 text-center">Home</p>
        </a>
        <a href="/students" class="text-decoration-none text-light">
          <p class="pe-4 pb-1 mb-0">Student</p>
        </a>
        <a href="/users" class="text-decoration-none text-light">
          <p class="pe-4 pb-1 mb-0">User</p>
        </a>
        <a href="/blogs" class="text-decoration-none text-light">
          <p class="pe-4 pb-1 mb-0">Blog</p>
        </a>
        <a href="/showrooms" class="text-decoration-none text-light">
          <p class="pe-4 pb-1 mb-0">Dashboard</p>
        </a>
  
    </div>
  
 
    @if (Auth::check())
   <a href='users/logout' class="text-light pe-4 rounded-3 btn-sm text-center text-decoration-none btn-danger">Logout</a>
@else
             
    <a href='/login' class="text-light pe-4 btn-sm text-decoration-none btn-warning">Login</a>
@endif
    

  </div>
  
<div>
