<div class="sidebar">
	<div class="sidebar-inner">
		{{-- SideBar Logo section Start --}}
		<div class="logo-part px-2 d-flex align-items-center sticky-top">
			<a href="/" class="m-auto">
				<img
					src="{{ Vite::asset('resources/images/logo.svg') }}"
					alt="Logo"
					class="img-fluid m-auto transition-x d-block"
				/>
				<img
					src="{{ Vite::asset('resources/images/side-logo.svg') }}"
					alt="Logo"
					class="img-fluid partial-logo transition-x w-0 d-block"
				/>
			</a>
			{{-- Mobile Sidebar Hamburg-button Start --}}
			<button class="btn btn-md shadow-none border-0 float-end sidebar-arrow d-md-none">
				<div class="hamburg-icon">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</button>
		</div>
		{{-- SideBar Logo section End --}}
		{{-- SideBar Menu Start --}}
		<ul class="sidebar-menus transition-x navbar-nav">
			{{-- Dashboard Menu Start --}}
			<li class="sidebar-menus-list-item d-flex align-items-start transition-x nav-item {{ isLinkActive('*/dashboard') }}">
				<span class="sidebar-menus-list-item-img">
					<img
						src="{{ Vite::asset('resources/images/dashboard.svg') }}"
						alt="Dashboard"
						class="img-fluid"
					/>
				</span>
				<div class="menu-with-icon transition-x">
					<a
						class="sidebar-menus-list-item-link nav-link transition-x py-0"
						aria-current="page"
						href="{{ route('admin.dashboard.index') }}"
						title="Dashboard"
					>
						Dashboard
					</a>
				</div>
			</li>
			{{-- Dashboard Menu End --}}
			{{-- Booking Menu Start --}}
			<li class="sidebar-menus-list-item d-flex align-items-start  transition-x nav-item">
				<span class="sidebar-menus-list-item-img">
					<img
						src="{{ Vite::asset('resources/images/booking.svg') }}"
						alt="Agent"
						class="img-fluid"
					/>
				</span>
				<div class="menu-with-icon transition-x">
					<a
						href="#Booking"
						class="sidebar-menus-list-item-link nav-link dropdown-toggle transition-x py-0"
						title="Booking"
						aria-current="page"
						data-bs-toggle="collapse"
						aria-expanded="false"
						aria-controls="Booking"
						role="button"
					>
						Bookings
					</a>
					{{-- Booking Dropdown Start --}}
					<ul
						class="collapse sidebar-menus-dropdown-list list-group list-unstyled"
						id="Booking">
						@can('role-list')
							<li class="mx-2 mt-3 mb-2 sidebar-menus-dropdown-list-item">
								<a
									class="dropdown-item sidebar-menus-dropdown-list-item-link d-flex align-items-center gap-3"
									href="{{route('admin.role.index')}}"
								>
									Roles
								</a>
							</li>
						@endcan
						@can('permission-list')
							<li class="mx-2 mt-3 mb-2 sidebar-menus-dropdown-list-item">
								<a
									class="dropdown-item sidebar-menus-dropdown-list-item-link d-flex align-items-center gap-3"
									href="{{route('admin.permission.index')}}"
								>
									Permission
								</a>
							</li>
						@endcan
						@can('user-list')
							<li class="mx-2 mt-3 mb-2 sidebar-menus-dropdown-list-item">
								<a
									class="dropdown-item sidebar-menus-dropdown-list-item-link d-flex align-items-center gap-3"
									href="{{route('admin.users.index')}}"
								>
									Admin User
								</a>
							</li>
						@endcan
					</ul>
					{{-- Booking Dropdown End --}}
				</div>
			</li>
			{{-- Booking Menu End --}}
			{{-- Booking Start --}}
			<li class="sidebar-menus-list-item d-flex align-items-start transition-x nav-item {{ isLinkActive('*/booking') }}">
				<span class="sidebar-menus-list-item-img">
					<img
						src="{{ Vite::asset('resources/images/booking.svg') }}"
						alt="Agent"
						class="img-fluid"
					/>
				</span>
				<div class="menu-with-icon transition-x">
					<a
						class="sidebar-menus-list-item-link nav-link transition-x py-0"
						aria-current="page"
						href="{{route('admin.booking.index')}}"
						title="Bookings"
						aria-expanded="false"
						aria-controls="Booking"
						role="button"
					>
						Bookings
					</a>
				</div>
			</li>
			{{-- Booking End --}}
			{{-- Customers Menu Start --}}
			<li class="sidebar-menus-list-item d-flex align-items-start transition-x nav-item {{ isLinkActive('*/customers') }}">
				<span class="sidebar-menus-list-item-img">
					<img
						src="{{ Vite::asset('resources/images/customers.svg') }}"
						alt="Customer"
						class="img-fluid"
					/>
				</span>
				<div class="menu-with-icon transition-x">
					<a
						href="{{route('admin.customers.index')}}"
						class="sidebar-menus-list-item-link nav-link transition-x py-0"
						title="Customers"
						aria-current="page"
					>
						Customers
					</a>
				</div>
			</li>
			{{-- Customers Menu End --}}
			{{-- Airport Start --}}
			<li class="sidebar-menus-list-item d-flex align-items-start transition-x nav-item {{ isLinkActive('*/airport') }}">
				<span class="sidebar-menus-list-item-img">
					<img
						src="{{ Vite::asset('resources/images/airport.svg') }}"
						alt="Game"
						class="img-fluid"
					/>
				</span>
				<div class="menu-with-icon transition-x">
					<a
						class="sidebar-menus-list-item-link nav-link transition-x py-0"
						aria-current="page"
						href="{{route('admin.airport.index')}}"
						title="Airport"
						aria-expanded="false"
						aria-controls="Airport"
						role="button"
					>
						Airports
					</a>
				</div>
			</li>
			{{-- Airport End --}}
			{{-- Product Start --}}
			<li class="sidebar-menus-list-item d-flex align-items-start transition-x nav-item">
				<span class="sidebar-menus-list-item-img">
					<img
						src="{{ Vite::asset('resources/images/product.svg') }}"
						alt="Game"
						class="img-fluid"
					/>
				</span>
				<div class="menu-with-icon transition-x">
					<a
						href="{{route('admin.products.index')}}"
						class="sidebar-menus-list-item-link nav-link transition-x py-0"
						title="Product"
						aria-current="page"
						aria-expanded="false"
						aria-controls="Product"
						role="button"
					>
						Products
					</a>
				</div>
			</li>
			{{-- Product End --}}
			{{-- Add-Ons Start --}}
			<li class="sidebar-menus-list-item d-flex align-items-start transition-x nav-item">
				<span class="sidebar-menus-list-item-img">
					<img
						src="{{ Vite::asset('resources/images/add-on.svg') }}"
						alt="Add_on"
						class="img-fluid"
					/>
				</span>
				<div class="menu-with-icon transition-x">
					<a
						href="{{route('admin.addons.index')}}"
						class="sidebar-menus-list-item-link nav-link transition-x py-0"
						title="Add-On"
						aria-current="page"
						aria-expanded="false"
						aria-controls="Add-On"
						role="button"
					>
						Add ons
					</a>
				</div>
			</li>
			{{-- Add-Ons End --}}
			{{-- Pricing Start --}}
			<li class="sidebar-menus-list-item d-flex align-items-start transition-x nav-item">
				<span class="sidebar-menus-list-item-img">
					<img
						src="{{ Vite::asset('resources/images/pricing.svg') }}"
						alt="pricing"
						class="img-fluid"
					/>
				</span>

				<div class="menu-with-icon transition-x">
					<a
						href="#Pricing"
						class="sidebar-menus-list-item-link nav-link dropdown-toggle transition-x py-0"
						title="Pricing"
						aria-current="page"
						data-bs-toggle="collapse"
						aria-expanded="false"
						aria-controls="Pricing"
						role="button"
					>
						Pricings
					</a>
					{{-- Pricing Dropdown Start --}}
					<ul
						class="collapse sidebar-menus-dropdown-list list-group list-unstyled"
						id="Pricing">
							<li class="mx-2 mt-3 mb-2 sidebar-menus-dropdown-list-item">
								<a
									class="dropdown-item sidebar-menus-dropdown-list-item-link d-flex align-items-center gap-3"
									href="{{route('admin.prices.index')}}"
								>
									Month Price
								</a>
							</li>

							<li class="mx-2 mt-3 mb-2 sidebar-menus-dropdown-list-item">
								<a
									class="dropdown-item sidebar-menus-dropdown-list-item-link d-flex align-items-center gap-3"
									href="{{route('admin.pricecategory.index')}}"
								>
									Price Category
								</a>
							</li>

					</ul>
					{{-- Pricing Dropdown End --}}
				</div>
			</li>
			{{-- Pricing End --}}
			{{-- Reporting Start --}}
			<li class="sidebar-menus-list-item d-flex align-items-start transition-x nav-item">
				<span class="sidebar-menus-list-item-img">
					<img
						src="{{ Vite::asset('resources/images/reporting.svg') }}"
						alt="reporting"
						class="img-fluid"
					/>
				</span>
				<div class="menu-with-icon transition-x">
					<a
						href="javascript:void(0)"
						class="sidebar-menus-list-item-link nav-link transition-x py-0"
						title="reporting"
						aria-current="page"
						data-bs-toggle="collapse"
						aria-expanded="false"
						aria-controls="reporting"
						role="button"
					>
						Reporting
					</a>
				</div>
			</li>
			{{-- Reporting End --}}
			{{-- promotions Start --}}
			<li class="sidebar-menus-list-item d-flex align-items-start transition-x nav-item">
				<span class="sidebar-menus-list-item-img">
					<img
						src="{{ Vite::asset('resources/images/promotion.svg') }}"
						alt="promotions"
						class="img-fluid"
					/>
				</span>
				<div class="menu-with-icon transition-x">
					<a
						href="{{route('admin.promotions.index')}}"
						class="sidebar-menus-list-item-link nav-link transition-x py-0"
						title="promotions"
						aria-current="page"
						aria-expanded="false"
						aria-controls="promotions"
						role="button"
					>
						Promotions
					</a>
				</div>
			</li>
			{{-- promotions End --}}
			{{-- agents Start --}}
			<li class="sidebar-menus-list-item d-flex align-items-start transition-x nav-item">
				<span class="sidebar-menus-list-item-img">
					<img
						src="{{ Vite::asset('resources/images/agent.svg') }}"
						alt="agents"
						class="img-fluid"
					/>
				</span>
				<div class="menu-with-icon transition-x">
					<a
						href="javascript:void(0)"
						class="sidebar-menus-list-item-link nav-link transition-x py-0"
						title="agents"
						aria-current="page"
						data-bs-toggle="collapse"
						aria-expanded="false"
						aria-controls="agents"
						role="button"
					>
						Agents
					</a>
				</div>
			</li>
			{{-- agents End --}}
			{{-- suppliers Start --}}
			<li class="sidebar-menus-list-item d-flex align-items-start transition-x nav-item">
				<span class="sidebar-menus-list-item-img">
					<img
						src="{{ Vite::asset('resources/images/supplier.svg') }}"
						alt="suppliers"
						class="img-fluid"
					/>
				</span>
				<div class="menu-with-icon transition-x">
					<a
						href="javascript:void(0)"
						class="sidebar-menus-list-item-link nav-link transition-x py-0"
						title="suppliers"
						aria-current="page"
						data-bs-toggle="collapse"
						aria-expanded="false"
						aria-controls="suppliers"
						role="button"
					>
						Suppliers
					</a>
				</div>
			</li>
			{{-- suppliers End --}}
			{{-- ts_cs Start --}}
			<li class="sidebar-menus-list-item d-flex align-items-start transition-x nav-item {{ isLinkActive('*/terms-and-conditions') }}">
				<span class="sidebar-menus-list-item-img">
					<img
						src="{{ Vite::asset('resources/images/ts-cs.svg') }}"
						alt="Game"
						class="img-fluid"
					/>
				</span>
				<div class="menu-with-icon transition-x">
					<a
						class="sidebar-menus-list-item-link nav-link transition-x py-0"
						aria-current="page"
						href="{{route('admin.terms-and-conditions.index')}}"
						title="Ts & Cs"
						aria-expanded="false"
						aria-controls="Ts & Cs"
						role="button"
					>
						Ts & Cs
					</a>
				</div>
			</li>
			{{-- ts_cs End --}}
			{{-- users Start --}}
			<li class="sidebar-menus-list-item d-flex align-items-start transition-x nav-item {{ isLinkActive('*/users') }}">
				<span class="sidebar-menus-list-item-img">
					<img
						src="{{ Vite::asset('resources/images/user.svg') }}"
						alt="users"
						class="img-fluid"
					/>
				</span>
				<div class="menu-with-icon transition-x">
					<a
						href="{{route('admin.users.index')}}"
						class="sidebar-menus-list-item-link nav-link transition-x py-0"
						title="users"
						aria-current="page"
					>
						Users
					</a>
				</div>
			</li>
			{{-- users End --}}
		</ul>
		{{-- SideBar Menu End --}}
		{{-- Logout Menu Start --}}
		<ul class="sidebar-menus transition-x navbar-nav position-absolute bottom-0 m-0 w-100 mh-0 p-0">
			<li
				class="sidebar-menus-list-item d-flex align-items-start transition-x nav-item border-0 p-2 px-3 bg-dark mb-0">
				<span class="sidebar-menus-list-item-img">
					<img
						src="{{ Vite::asset('resources/images/logout.svg') }}"
						alt="users"
						class="img-fluid"
					/>
				</span>
				<div class="menu-with-icon transition-x">
					<a
						class="sidebar-menus-list-item-link nav-link transition-x py-0"
						aria-current="page"
						href="{{ route('admin.logout') }}"
						title="Logout"
					>
						Logout
					</a>
				</div>
			</li>
		</ul>
		{{-- Logout Menu End --}}
	</div>
</div>
