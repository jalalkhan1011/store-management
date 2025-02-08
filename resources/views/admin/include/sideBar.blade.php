@if (Auth::user()->user_type == 'merchant')
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('storeList') }}">
            <div class="sidebar-brand-text mx-3">Merechant</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('storeList') }}">
                <span>Store List</span></a>
        </li>
        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('createStore') }}">
                <span>Create Store</span></a>
        </li> 
        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('categoryList') }}">
                <span>Category List</span></a>
        </li>
        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('createCategory') }}">
                <span>Create Category</span></a>
        </li>
        <hr class="sidebar-divider">
    </ul>
@endif
