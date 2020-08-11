<div class="sidebar" data-color="green" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('e_RTG Project') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('countries.index') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Admin Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Country-Management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('countries.index') }}">
          <i class="material-icons">language</i>
            <p>{{ __('Country Management') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Distributor-Management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('distributors.index') }}">
          <i class="material-icons">people</i>
            <p>{{ __('Distributor Management') }}</p>
        </a>
      </li>
      
      <li class="nav-item{{ $activePage == 'Customer-Management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('customers.index') }}">
          <i class="material-icons">transfer_within_a_station</i>
            <p>{{ __('Customer Management') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'User-Management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="material-icons">person</i>
            <p>{{ __('User Management') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
        <i class="material-icons">add_shopping_cart</i>
          <p>{{ __('Product Management') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'Category-Management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('categories.index') }}">
                <span class="sidebar-mini"> CM </span>
                <span class="sidebar-normal">{{ __('Category Management') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'Attribute-Management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('attributes.index') }}">
                <span class="sidebar-mini"> AM </span>
                <span class="sidebar-normal"> {{ __('Attribute Management') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'Item-Management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('items.index') }}">
                <span class="sidebar-mini"> IM </span>
                <span class="sidebar-normal"> {{ __('Item Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'PushToRetailer-Management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('pushtoretailers.index') }}">
          <i class="material-icons">person</i>
            <p>{{ __('Push To Retailer') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>