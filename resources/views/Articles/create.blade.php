@extends('auth.layouts')

@section('content')
<style>
  #container {
    width: 100%;
    margin-right: auto;
  }
  .ck-editor__editable[role="textbox"] {
    /* editing area */
    min-height: 200px;
  }
  .ck-content .image {
    /* block images */
    max-width: 65%;
    /* margin: 20px auto; */
  }
  </style>

<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->
<div class="container">
<nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar" style="margin: 1%;"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('password.change') }}">
                            <i class="bx bx-cog me-2"></i>
                            <span class="align-middle">Ganti Password</span>
                        </a>
                    </li>
                    <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            ><span class="bx bx-user me-2"></span>
                            Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                  </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

  <form action="{{ route('articles.store') }}" method="POST">
    @csrf
    <div class="row">
      <div class="col-8">
        <input type="text" class="form-control" placeholder="Judul Artikel..." name="judul">
        <div id="container" class="col-8 text-start">
          <textarea id="editor" name="konten"></textarea>
        </div>
      </div>
      <div class="col-4">
        <div class="d-grid">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Label 1</th>
                <th scope="col">Label 2</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row">1</td>
                <td scope="row">1</td>
              </tr>
            </tbody>
          </table>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">📆</span>
            <input type="text" class="form-control" placeholder="Tanggal Publish" aria-label="Tanggal Publish" aria-describedby="basic-addon1" name="tanggal_publish">
          </div>
          <div class="mt-1">
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="col-6 d-flex justify-content-evenly w-100 mt-2">
            <button type="button" class="btn btn-danger w-25">Draf</button>
            <input type="submit" class="btn btn-primary w-50" value="Publish">
          </div>
        </div>
      </div>
    </div>
  </form>
</div>





@endsection