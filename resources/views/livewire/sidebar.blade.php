<div class="md:flex flex-col md:flex-row md:min-h-screen ">
    <div @click.away="open = false"
        class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0"
        x-data="{ open: false }">
        <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
            <span
                class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
                @can('admin')
                    Admin panel
                @elsecan('approval')
                    Approval panel
                @else
                    Customer panel

                @endcan
            </span>
            <button class="rounded-lg md:hidden rounded-lg focus:outline-none focus:shadow-outline"
                @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'block': open, 'hidden': !open}" class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
            <x-sidebar.nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-sidebar.nav-link>

            <x-sidebar.nav-link href="{{ route('sewa.index') }}" :active="request()->routeIs('sewa.*')">
                {{ __('Data sewa') }}
            </x-sidebar.nav-link>

            @can('approval')
                <x-sidebar.nav-link href="{{ route('pembayaran.index') }}" :active="request()->routeIs('pembayaran.*')">
                    {{ __('Data pembayaran') }}
                </x-sidebar.nav-link>
            @endcan

            @can('customer')

                <x-sidebar.nav-link href="{{ route('kapal.index') }}" :active="request()->routeIs('kapal.*')">
                    {{ __('Data kapal') }}
                </x-sidebar.nav-link>

            @endcan
        </nav>
    </div>
</div>