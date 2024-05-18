<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-light sidebar">
        <button class="btn btn-primary d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="true" aria-label="Toggle navigation">
            <span>Close</span>
          </button>
        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <span class="fs-4 d-flex flex-column align-items-center">
                <img
                    src="{{ Auth::user()->user_image ? asset('storage/img/user/' . Auth::user()->user_image) : asset('image/user.jpg') }}"
                    alt="" width="100" height="100" style="border-radius: 100%">
                <h4 class="">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
            </span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="/user/list" class="nav-link link-dark" aria-current="page">
                    User List
                </a>
            </li>
            <li>
                <a href="/genders" class="nav-link link-dark">
                    Gender List
                </a>
            </li>
            <li>
                <a href="/gender/create" class="nav-link link-dark">
                    Add Gender
                </a>
            </li>
            <li>
                <a href="/user/create" class="nav-link link-dark">
                    Add User
                </a>
            </li>
        </ul>
        <hr>
        <div>
            <a href="/process/logout" class="d-flex align-items-center link-dark text-decoration-none">
                Logout
            </a>
        </div>
    </div>
</nav>

<button class="btn btn-primary d-md-none m-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar"
    aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
    <span>Menu</span>
</button>
