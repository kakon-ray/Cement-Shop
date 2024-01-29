<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard.home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Cement Shop</div>
    </a>

    <hr class="sidebar-divider my-0">


    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard.home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Product</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white my-1 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.dashboard.product.home')}}">Manage Product</a>
            </div>
            <div class="bg-white my-1 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.dashboard.product.add')}}">Add Product</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3"
            aria-expanded="true" aria-controls="collapse3">
            <i class="fas fa-fw fa-cog"></i>
            <span>Employe</span>
        </a>
        <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white my-1 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.dashboard.employee.home')}}">Manage Employe</a>
            </div>
            <div class="bg-white my-1 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.dashboard.employee.add')}}">Add Employe</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5"
            aria-expanded="true" aria-controls="collapse5">
            <i class="fas fa-fw fa-cog"></i>
            <span>Gallery</span>
        </a>
        <div id="collapse5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white my-1 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.dashboard.gallery.home')}}">Manage Gallery</a>
            </div>
            <div class="bg-white my-1 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.dashboard.gallery.add')}}">Add Gallery</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse7"
            aria-expanded="true" aria-controls="collapse7">
            <i class="fas fa-fw fa-cog"></i>
            <span>Slider Manage</span>
        </a>
        <div id="collapse7" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white my-1 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.dashboard.slider.home')}}">Manage Slider</a>
            </div>
            <div class="bg-white my-1 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.dashboard.slider.add')}}">Add Slider</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse6"
            aria-expanded="true" aria-controls="collapse6">
            <i class="fas fa-fw fa-cog"></i>
            <span>Contact Message</span>
        </a>
        <div id="collapse6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white my-1 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.dashboard.contact.home')}}">Contact Message</a>
            </div>
        </div>
    </li>

</ul>