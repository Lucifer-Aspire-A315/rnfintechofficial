<nav x-data="{ open: false }"
     class="z-50 bg-white/90 border-b-4 border-emerald-400 rounded-2xl shadow-xl mb-8 mt-4 mx-2 backdrop-blur">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Left: Logo & Links -->
            <div class="flex items-center space-x-2">
                <!-- Logo & Brand -->
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
                    <x-application-mark class="block h-12 w-auto" />
                </a>
                <!-- Navigation Links -->
                <div class="hidden sm:flex items-center space-x-6 ml-2">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="text-indigo-700 font-semibold hover:text-indigo-900 transition">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                <!-- Dropdown Menus -->
                <div class="hidden sm:flex items-center space-x-6">
                    <x-nav-dropdown title="Menu" align="right" width="48">
                        @can('view-any', App\Models\LoanApplications::class)
                            <x-dropdown-link href="{{ route('all-loan-applications.index') }}">
                                All Loan Applications
                            </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Bank::class)
                            <x-dropdown-link href="{{ route('banks.index') }}">
                                Banks
                            </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\LoanType::class)
                            <x-dropdown-link href="{{ route('loan-types.index') }}">
                                Loan Types
                            </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\User::class)
                            <x-dropdown-link href="{{ route('users.index') }}">
                                Users
                            </x-dropdown-link>
                        @endcan
                    </x-nav-dropdown>
                    @auth
                        @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) || 
                            Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                            <x-nav-dropdown title="Access Management" align="right" width="48">
                                @can('view-any', Spatie\Permission\Models\Role::class)
                                    <x-dropdown-link href="{{ route('roles.index') }}">Roles</x-dropdown-link>
                                @endcan
                                @can('view-any', Spatie\Permission\Models\Permission::class)
                                    <x-dropdown-link href="{{ route('permissions.index') }}">Permissions</x-dropdown-link>
                                @endcan
                            </x-nav-dropdown>
                        @endif
                    @endauth
                </div>
            </div>
            <!-- Right: Docs, Teams, Profile/Login, Hamburger -->
            <div class="flex items-center space-x-4">
                <!-- Documentation Link (desktop only) -->
                <a href="{{ route('documentation') }}"
                   class="hidden lg:inline text-gray-500 hover:text-indigo-700 font-medium transition px-2">
                    Documentation
                </a>
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-2 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-white hover:bg-indigo-50 hover:text-indigo-900 focus:outline-none transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>
                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan
                                    <div class="border-t border-gray-100"></div>
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>
                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif
                <!-- Settings/Profile Dropdown or Login -->
                <div class="ml-2 relative">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-indigo-200 rounded-full focus:outline-none focus:border-indigo-400 transition duration-150 ease-in-out shadow">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-900 bg-white hover:text-indigo-700 focus:outline-none transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>
                            <x-slot name="content">
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>
                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif
                                <div class="border-t border-gray-100"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}" class="bg-gradient-to-r from-indigo-500 to-violet-500 text-white px-4 py-2 rounded-lg font-semibold shadow hover:from-indigo-600 hover:to-violet-600 transition text-center">Login</a>
                    @endguest
                </div>
                <!-- Hamburger (mobile only, right side) -->
                <div class="flex sm:hidden ml-2">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-indigo-600 hover:text-indigo-800 hover:bg-indigo-100 focus:outline-none transition duration-150 ease-in-out">
                        <svg class="h-7 w-7" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden px-4 pb-4">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="text-indigo-700 font-semibold hover:underline transition">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @can('view-any', App\Models\LoanApplications::class)
                <x-responsive-nav-link href="{{ route('all-loan-applications.index') }}">
                All Loan Applications
                </x-responsive-nav-link>
            @endcan
            @can('view-any', App\Models\Bank::class)
                <x-responsive-nav-link href="{{ route('banks.index') }}">
                Banks
                </x-responsive-nav-link>
            @endcan
            @can('view-any', App\Models\LoanType::class)
                <x-responsive-nav-link href="{{ route('loan-types.index') }}">
                Loan Types
                </x-responsive-nav-link>
            @endcan
            @can('view-any', App\Models\User::class)
                <x-responsive-nav-link href="{{ route('users.index') }}">
                Users
                </x-responsive-nav-link>
            @endcan

            @auth
                @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) || 
                    Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                    @can('view-any', Spatie\Permission\Models\Role::class)
                        <x-responsive-nav-link href="{{ route('roles.index') }}">Roles</x-responsive-nav-link>
                    @endcan
                    @can('view-any', Spatie\Permission\Models\Permission::class)
                        <x-responsive-nav-link href="{{ route('permissions.index') }}">Permissions</x-responsive-nav-link>
                    @endcan
                @endif
            @endauth
        </div>

        <!-- Responsive Settings Options (shows username/profile) -->
        @auth
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif
                <div>
                    <div class="font-medium text-base text-indigo-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>
                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan
                    <div class="border-t border-gray-200"></div>
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>
                    @foreach (Auth::user()->allTeams() as $team)
                        <x-switchable-team :team="$team" component="responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
        @endauth
        @guest
        <div class="pt-4 pb-1 border-t border-gray-200">
            <a href="{{ route('login') }}" class="block px-4 py-2 text-indigo-600 font-semibold hover:bg-indigo-50 rounded-lg">Login</a>
        </div>
        @endguest
    </div>
</nav>