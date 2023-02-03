<li class="nav-item">
    <a href="{{ route('admin') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

{{-- Shipping Management  --}}
<li class="nav-item {{ Request::is('shipping/*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Shipping
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('shipping.index') }}"
                class="nav-link {{ Request::is('shipping/index') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Show Shipping</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('shipping.create') }}"
                class="nav-link {{ Request::is('shipping/create') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Add Shipping</p>
            </a>
        </li>
    </ul>
</li>

{{-- Order Management  --}}
<li class="nav-item {{ Request::is('order/*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Order
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('order.index') }}" class="nav-link {{ Request::is('order/index') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Show Order</p>
            </a>
        </li>
    </ul>
</li>

{{-- Add Order status   --}}
@if (Auth::user()->name == 'admin' && Auth::user()->roll == 2)

     <li class="nav-item {{ Request::is('order-status/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
                Order Status
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('order-status.index') }}"
                    class="nav-link {{ Request::is('order-status/index') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Show Order status</p>
                </a>
            </li>
        </ul>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('order-status.create') }}"
                    class="nav-link {{ Request::is('order-status/create') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Add Order status</p>
                </a>
            </li>
        </ul>
    </li>
    @endif

    {{-- Setting  --}}
@if (Auth::user()->name == 'admin' && Auth::user()->roll == 2)
     <li class="nav-item {{ Request::is('order-status/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
                Setting
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('company-details.create') }}"
                    class="nav-link {{ Request::is('company-details/create') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Site Information</p>
                </a>
            </li>
        </ul>
    </li>
@endif
