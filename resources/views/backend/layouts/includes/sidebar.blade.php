<div class="sidebar-wrapper">
  <ul class="nav">
    <li class="active ">
      <a href="/superadmin">
        <i class="nc-icon nc-bank"></i>
        <p>Dashboard</p>
      </a>
    </li>


@if (auth::user()->user_type == 0)
<li>
        <a href="/category">
          <i class="nc-icon nc-bullet-list-67"></i>
          <p>Category </p>
        </a>
      </li>

      <li>
        <a href="/user">
          <i class="nc-icon nc-bullet-list-67"></i>
          <p>Users</p>
        </a>
      </li>

      <li>
            <a href="/blog">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Blogs</p>
            </a>
          </li>

            <li class="active-pro">
              <a href="./upgrade.html">
                {{-- <i class="nc-icon nc-spaceship"></i> --}}
                <p style="text-align:center">Blogs</p>
              </a>
            </li>
          </ul>
@else

<li>
        <a href="/blog">
          <i class="nc-icon nc-bullet-list-67"></i>
          <p>My Blogs</p>
        </a>
      </li>

        <li class="active-pro">
          <a href="./upgrade.html">
            {{-- <i class="nc-icon nc-spaceship"></i> --}}
            <p style="text-align:center">Blog</p>
          </a>
        </li>
      </ul>
@endif



</div>
</div>
