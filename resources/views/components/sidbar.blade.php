<ul class="list-group list-group">
  <a href="{{route("category.index")}}" class="hover list-group-item nav-link d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto d-flex">
        <i class="fa-solid fa-list mt-1 m-2 text-primary"></i>
      <div class="fw-bold">Categories</div>
    </div>
    <span class="badge bg-primary rounded-pill">{{App\Models\Category::all()->count()}}</span>
  </a>
  <a href="{{route("menu.index")}}" class="list-group-item  nav-link d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto d-flex">
        <i class="fa-solid fa-clipboard-list mt-1 m-2 text-primary"></i>
      <div class="fw-bold">Menus</div>
    </div>
    <span class="badge bg-primary rounded-pill">{{App\Models\Menu::all()->count()}}</span>
  </a>
  <a href="{{route("table.index")}}" class="list-group-item nav-link d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto d-flex">
        <i class="fa-solid fa-chair mt-1 m-2 text-primary" ></i>
      <div class="fw-bold">Tables</div>
    </div>
    <span class="badge bg-primary rounded-pill">{{App\Models\Table::all()->count()}}</span>
  </a>
  <a href="{{route("server.index")}}" class="list-group-item d-flex nav-link justify-content-between align-items-start">
    <div class="ms-2 me-auto d-flex">
        <i class="fa-solid fa-user-gear mt-1 m-2 text-primary"></i>
      <div class="fw-bold">Servers</div>
    </div>
    <span class="badge bg-primary rounded-pill">{{App\Models\Servant::all()->count()}}</span>
  </a>
  <a href="{{route("add_payement.index")}}" class="list-group-item d-flex nav-link justify-content-between align-items-start">
    <div class="ms-2 me-auto d-flex">
      <i class="fa-solid fa-cart-shopping mt-1 m-2 text-primary"></i>
      <div class="fw-bold">Sales</div>
    </div>
    <span class="badge bg-primary rounded-pill">{{App\Models\Sale::all()->count()}}</span>
  </a>
  <a href="{{route("payement.index")}}" class="list-group-item d-flex nav-link justify-content-between align-items-start">
    <div class="ms-2 me-auto d-flex">
      <i class="fa-solid fa-money-bill mt-1 m-2 text-primary"></i>
      <div class="fw-bold">Payement</div>
    </div>
  </a>
  <a href="{{route("reports.index")}}" class="list-group-item d-flex nav-link justify-content-between align-items-start">
    <div class="ms-2 me-auto d-flex">
      <i class="fa-solid fa-file-invoice mt-1 m-2 text-primary"></i>
      <div class="fw-bold">Reports</div>
    </div>
  </a>
</ul>