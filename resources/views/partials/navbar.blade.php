<nav class="bg-[#679CEB] py-3 shadow-md">
    <div class="container mx-auto flex justify-between items-center px-6">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="text-white font-bold text-2xl flex items-center">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="h-8 mr-2"> 
            Telkom Internship
        </a>

        <!-- Menu Navbar -->
        <ul class="flex items-center gap-4">
            <li>
                <a href="{{ route('internships.index') }}" 
                   class="text-white hover:text-gray-200 px-4 py-2 rounded-md transition-all duration-300 {{ request()->is('internships*') ? 'bg-blue-700 text-white' : '' }}">
                   Program Magang
                </a>
            </li>

            @auth
                @if(Auth::user()->role == 'admin')
                    <li>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="text-white hover:text-gray-200 px-4 py-2 rounded-md transition-all duration-300 {{ request()->is('admin/dashboard') ? 'bg-blue-700 text-white' : '' }}">
                           Dashboard Admin
                        </a>
                    </li>
                @elseif(Auth::user()->role == 'pembimbing')
                    <li>
                        <a href="{{ route('pembimbing.dashboard') }}" 
                           class="text-white hover:text-gray-200 px-4 py-2 rounded-md transition-all duration-300 {{ request()->is('pembimbing/dashboard') ? 'bg-blue-700 text-white' : '' }}">
                           Dashboard Pembimbing
                        </a>
                    </li>
                @elseif(Auth::user()->role == 'user')
                    <li>
                        <a href="{{ route('user.dashboard') }}" 
                           class="text-white hover:text-gray-200 px-4 py-2 rounded-md transition-all duration-300 {{ request()->is('user/dashboard') ? 'bg-blue-700 text-white' : '' }}">
                           Dashboard User
                        </a>
                    </li>
                @endif

                <!-- Button Logout -->
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-all duration-300">
                            Logout
                        </button>
                    </form>
                </li>
            @else
                <!-- Button Login/Register jika belum login -->
                <li>
                    <a href="{{ route('login') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 transition-all duration-300">
                        Log in/Register
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
