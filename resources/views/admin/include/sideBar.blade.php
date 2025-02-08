@if (Auth::user()->user_type == 'merchant')
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html"> 
            <div class="sidebar-brand-text mx-3">Merechant</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="index.html"> 
                <span>Store List</span></a>
        </li>  
        <hr class="sidebar-divider my-0">

        <li class="nav-item active">
            <a class="nav-link" href="index.html"> 
                <span>Create Store</span></a>
        </li>   
        <hr class="sidebar-divider"> 
    </ul>
@endif
