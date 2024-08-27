<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('admin/assets/images/logo.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Pro1</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="/dashboard" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Home</div>
            </a>

        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Categories & products</div>
            </a>
            <ul>
                <li> <a href="{{route('all.categories')}}"><i class="bx bx-right-arrow-alt"></i>All Categories</a>
                </li>
                <li> <a href="{{route('all.subcategory')}}"><i class="bx bx-right-arrow-alt"></i>All SubCategory </a>
                </li>
                <li> <a href="{{route('all.products')}}"><i class="bx bx-right-arrow-alt"></i>Products List</a>
                </li>


            </ul>
        </li>
        <li class="menu-label">UI Elements</li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Orders</div>
            </a>
            <ul>
                <li> <a href="{{route('pending.order')}}"><i class="bx bx-right-arrow-alt"></i>Pending orders</a>
                </li>
                <li> <a href="{{route('processing.order')}}"><i class="bx bx-right-arrow-alt"></i>Processing orders</a>
                </li>
                <li> <a href="{{route('complate.order')}}"><i class="bx bx-right-arrow-alt"></i>Complate orders</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Contact</div>
            </a>
            <ul>
                <li> <a href="{{route('all.message')}}"><i class="bx bx-right-arrow-alt"></i>Messages</a>
                </li>

            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx bx-repeat'></i>
                </div>
                <div class="menu-title">Notification</div>
            </a>
            <ul>
                <li> <a href="{{route('all.notification')}}"><i class="bx bx-right-arrow-alt"></i>All Notification</a>
                </li>

            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-lock'></i>
                </div>
                <div class="menu-title">Slider</div>
            </a>
            <ul>
                <li> <a href="{{route('all.slider')}}"><i class="bx bx-right-arrow-alt"></i>View Slider </a>
                </li>

            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-grid-alt'></i>
                </div>
                <div class="menu-title">Site Information</div>
            </a>
            <ul>
                <li> <a href="{{route('all.info')}}"><i class="bx bx-right-arrow-alt"></i>View Site Information </a>
                </li>

            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-donate-blood'></i>
                </div>
                <div class="menu-title">Review</div>
            </a>
            <ul>
                <li> <a href="{{route('all.review')}}"><i class="bx bx-right-arrow-alt"></i>View Review </a>
                </li>

            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
