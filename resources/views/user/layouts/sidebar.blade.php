<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('employee')}}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Employee</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{route('employee')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Shop
        </div>
<!-- product -->
<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productCollapse" aria-expanded="true" aria-controls="productCollapse">
          <i class="fas fa-cubes"></i>
          <span>Products</span>
        </a>
        <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product Options:</h6>
            <a class="collapse-item" href="{{route('product.index')}}">Products</a>
            <a class="collapse-item" href="{{route('product.create')}}">Add Product</a>
          </div>
        </div>
    </li>
    <!--Orders -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Orders</span>
        </a>
    </li>

    <!-- Reviews -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('emp.productreview.index')}}">
            <i class="fas fa-comments"></i>
            <span>Reviews</span></a>
    </li>
    

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
      Posts
    </div> -->
    <!-- Comments -->
    <hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Posts
</div>

<!-- Posts -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCollapse" aria-expanded="true" aria-controls="postCollapse">
    <i class="fas fa-fw fa-folder"></i>
    <span>Posts</span>
  </a>
  <div id="postCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Post Options:</h6>
      <a class="collapse-item" href="{{route('Epost.index')}}">Posts</a>
      <a class="collapse-item" href="{{route('Epost.create')}}">Add Post</a>
    </div>
  </div>
</li>

 <!-- Category -->
 <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCategoryCollapse" aria-expanded="true" aria-controls="postCategoryCollapse">
      <i class="fas fa-sitemap fa-folder"></i>
      <span>Category</span>
    </a>
    <div id="postCategoryCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Category Options:</h6>
        <a class="collapse-item" href="{{route('Epost-category.index')}}">Category</a>
        <a class="collapse-item" href="{{route('Epost-category.create')}}">Add Category</a>
      </div>
    </div>
  </li>

  <!-- Tags -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tagCollapse" aria-expanded="true" aria-controls="tagCollapse">
        <i class="fas fa-tags fa-folder"></i>
        <span>Tags</span>
    </a>
    <div id="tagCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Tag Options:</h6>
        <a class="collapse-item" href="{{route('Epost-tag.index')}}">Tag</a>
        <a class="collapse-item" href="{{route('Epost-tag.create')}}">Add Tag</a>
        </div>
    </div>
</li>




    <li class="nav-item">
      <a class="nav-link" href="{{route('emp.post-comment.index')}}">
          <i class="fas fa-comments fa-chart-area"></i>
          <span>Comments</span>
      </a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>