<nav id="sidebar">
    <ul>
        <li>
            <span class="logo">Inventory System</span>
            <button id="toggle-btn">
                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20" height="20"><path d="M10.48,19a1,1,0,0,1-.7-.29L5.19,14.12a3,3,0,0,1,0-4.24L9.78,5.29a1,1,0,0,1,1.41,0,1,1,0,0,1,0,1.42L6.6,11.29a1,1,0,0,0,0,1.42l4.59,4.58a1,1,0,0,1,0,1.42A1,1,0,0,1,10.48,19Z"/><path d="M17.48,19a1,1,0,0,1-.7-.29l-6-6a1,1,0,0,1,0-1.42l6-6a1,1,0,0,1,1.41,0,1,1,0,0,1,0,1.42L12.9,12l5.29,5.29a1,1,0,0,1,0,1.42A1,1,0,0,1,17.48,19Z"/></svg>
            </button>
        </li>
        <li class="{{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.admin') }}">
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="20" height="20">
                    <path d="m9,0h-4C2.243,0,0,2.243,0,5v2c0,1.103.897,2,2,2h7c1.103,0,2-.897,2-2V2c0-1.103-.897-2-2-2ZM2,7v-2c0-1.654,1.346-3,3-3h4l.002,5H2Zm20,8h-7c-1.103,0-2,.897-2,2v5c0,1.103.897,2,2,2h4c2.757,0,5-2.243,5-5v-2c0-1.103-.897-2-2-2Zm0,4c0,1.654-1.346,3-3,3h-4v-5h7v2ZM19,0h-4c-1.103,0-2,.897-2,2v9c0,1.103.897,2,2,2h7c1.103,0,2-.897,2-2v-6c0-2.757-2.243-5-5-5Zm-4,11V2h4c1.654,0,3,1.346,3,3l.002,6h-7.002Zm-6,0H2c-1.103,0-2,.897-2,2v6c0,2.757,2.243,5,5,5h4c1.103,0,2-.897,2-2v-9c0-1.103-.897-2-2-2Zm-4,11c-1.654,0-3-1.346-3-3v-6h7l.002,9h-4.002Z"/>
                  </svg>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <button onclick="toggleSubMenu(this)" class="dropdown-btn">
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="20" height="20"><path d="m12,0C5.383,0,0,5.383,0,12s5.383,12,12,12,12-5.383,12-12S18.617,0,12,0Zm-4,21.164v-.164c0-2.206,1.794-4,4-4s4,1.794,4,4v.164c-1.226.537-2.578.836-4,.836s-2.774-.299-4-.836Zm9.925-1.113c-.456-2.859-2.939-5.051-5.925-5.051s-5.468,2.192-5.925,5.051c-2.47-1.823-4.075-4.753-4.075-8.051C2,6.486,6.486,2,12,2s10,4.486,10,10c0,3.298-1.605,6.228-4.075,8.051Zm-5.925-15.051c-2.206,0-4,1.794-4,4s1.794,4,4,4,4-1.794,4-4-1.794-4-4-4Zm0,6c-1.103,0-2-.897-2-2s.897-2,2-2,2,.897,2,2-.897,2-2,2Z"/></svg>
                <span>Users</span>
                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20" height="20"><path d="M6.41,9H17.59a1,1,0,0,1,.7,1.71l-5.58,5.58a1,1,0,0,1-1.42,0L5.71,10.71A1,1,0,0,1,6.41,9Z"/></svg>
            </button>
            <ul class="sub-menu">
                <div>
                    <li><a href="#">List</a></li>
                    <li><a href="#">Create</a></li>
                    <li><a href="#">Roles</a></li>
                </div>
            </ul>
        </li>
        <li>
            <button onclick=toggleSubMenu(this) class="dropdown-btn {{ request()->routeIs('product-category.*') || request()->routeIs('product.*')  ? 'rotate' : '' }}"">
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="20" height="20"><path d="M19.5,16c0,.553-.447,1-1,1h-2c-.553,0-1-.447-1-1s.447-1,1-1h2c.553,0,1,.447,1,1Zm4.5-1v5c0,2.206-1.794,4-4,4H4c-2.206,0-4-1.794-4-4v-5c0-2.206,1.794-4,4-4h1V4C5,1.794,6.794,0,9,0h6c2.206,0,4,1.794,4,4v7h1c2.206,0,4,1.794,4,4ZM7,11h10V4c0-1.103-.897-2-2-2h-6c-1.103,0-2,.897-2,2v7Zm-3,11h7V13H4c-1.103,0-2,.897-2,2v5c0,1.103,.897,2,2,2Zm18-7c0-1.103-.897-2-2-2h-7v9h7c1.103,0,2-.897,2-2v-5Zm-14.5,0h-2c-.553,0-1,.447-1,1s.447,1,1,1h2c.553,0,1-.447,1-1s-.447-1-1-1ZM14,5c0-.553-.447-1-1-1h-2c-.553,0-1,.447-1,1s.447,1,1,1h2c.553,0,1-.447,1-1Z"/></svg>
                <span>Inventory</span>
                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20" height="20"><path d="M6.41,9H17.59a1,1,0,0,1,.7,1.71l-5.58,5.58a1,1,0,0,1-1.42,0L5.71,10.71A1,1,0,0,1,6.41,9Z"/></svg>
            </button>
            <ul class="sub-menu {{ request()->routeIs('product-category.*') || request()->routeIs('product.*') ? 'show' : '' }}">
                <div>
                    <li class="{{ request()->routeIs('product.index') ? 'active' : '' }}"><a href="{{ route('product.index') }}">Products</a></li>
                    <li><a href="#">Transfer</a></li>
                    <li class="{{ request()->routeIs('product-category.index') ? 'active' : '' }}"><a href="{{ route('product-category.index') }}">Categories</a></li>
                </div>
            </ul>
        </li>
        <li class="{{ request()->routeIs('warehouse.*') ? 'active' : '' }}">
            <a href="{{ route('warehouse.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="20" height="20"><path d="M21.8,5.579,14.8.855A4.981,4.981,0,0,0,9.2.855l-7,4.724A4.992,4.992,0,0,0,0,9.724V19a5.006,5.006,0,0,0,5,5H19a5.006,5.006,0,0,0,5-5V9.724A4.993,4.993,0,0,0,21.8,5.579ZM18,22H6V13a2,2,0,0,1,2-2h8a2,2,0,0,1,2,2Zm4-3a3,3,0,0,1-2,2.828V13a4,4,0,0,0-4-4H8a4,4,0,0,0-4,4v8.828A3,3,0,0,1,2,19V9.724A3,3,0,0,1,3.322,7.237l7-4.723a2.983,2.983,0,0,1,3.356,0l7,4.723A3,3,0,0,1,22,9.724Zm-8,0a1,1,0,0,1-1,1H11a1,1,0,0,1,0-2h2A1,1,0,0,1,14,19Z"/></svg>
                <span>Warehouse</span>
            </a>
        </li>
        <li>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20" height="20"><path d="M1,4.75H3.736a3.728,3.728,0,0,0,7.195,0H23a1,1,0,0,0,0-2H10.931a3.728,3.728,0,0,0-7.195,0H1a1,1,0,0,0,0,2ZM7.333,2a1.75,1.75,0,1,1-1.75,1.75A1.752,1.752,0,0,1,7.333,2Z"/><path d="M23,11H20.264a3.727,3.727,0,0,0-7.194,0H1a1,1,0,0,0,0,2H13.07a3.727,3.727,0,0,0,7.194,0H23a1,1,0,0,0,0-2Zm-6.333,2.75A1.75,1.75,0,1,1,18.417,12,1.752,1.752,0,0,1,16.667,13.75Z"/><path d="M23,19.25H10.931a3.728,3.728,0,0,0-7.195,0H1a1,1,0,0,0,0,2H3.736a3.728,3.728,0,0,0,7.195,0H23a1,1,0,0,0,0-2ZM7.333,22a1.75,1.75,0,1,1,1.75-1.75A1.753,1.753,0,0,1,7.333,22Z"/></svg>
                <span>Settings</span>
            </a>
        </li>
    </ul>
</nav>