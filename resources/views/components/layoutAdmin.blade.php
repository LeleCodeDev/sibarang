<x-layout>
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div
            class="drawer-content flex flex-col items-start justify-start min-h-screen bg-base-100 transition-all duration-300">
            <!-- Top Navigation Bar -->
            <div
                class="w-full flex justify-between items-center px-4 py-2 bg-base-200 border-b border-base-300 sticky top-0 z-10">
                <div class="flex items-center gap-2 md:py-2">
                    <label for="my-drawer-2" aria-label="open sidebar" class="btn btn-square btn-ghost lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block h-6 w-6 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </label>
                    <h2 class="text-2xl font-semibold text-base-content hidden sm:block">Admin Dashboard</h2>
                </div>

                <div class="flex items-center gap-3">
                    <!-- Theme Toggle -->
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle" id="theme-btn">
                            <!-- icon light theme -->
                            <svg xmlns="http://www.w3.org/2000/svg" id="theme-icon-dark" class="h-5 w-5 hidden"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                            <!-- icon dark theme -->
                            <svg xmlns="http://www.w3.org/2000/svg" id="theme-icon-light" class="h-5 w-5 hidden"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        @php
                            $daisyuiThemes = [
                                // 🌑 Dark Themes
                                ['name' => 'dracula', 'bg' => 'bg-purple-900'],
                                ['name' => 'dark', 'bg' => 'bg-gray-900'],
                                ['name' => 'black', 'bg' => 'bg-black'],
                                ['name' => 'night', 'bg' => 'bg-blue-900'],
                                ['name' => 'business', 'bg' => 'bg-neutral-800'],
                                ['name' => 'luxury', 'bg' => 'bg-amber-700'],
                                ['name' => 'coffee', 'bg' => 'bg-stone-800'],
                                ['name' => 'forest', 'bg' => 'bg-green-800'],
                                ['name' => 'dim', 'bg' => 'bg-gray-700'],
                                ['name' => 'synthwave', 'bg' => 'bg-fuchsia-700'],
                                ['name' => 'halloween', 'bg' => 'bg-orange-600'],
                                ['name' => 'aqua', 'bg' => 'bg-cyan-300'],
                                

                                // 🌕 Light Themes
                                ['name' => 'lofi', 'bg' => 'bg-gray-300'],
                                ['name' => 'nord', 'bg' => 'bg-cyan-900'],
                                ['name' => 'wireframe', 'bg' => 'bg-white'],
                                ['name' => 'cupcake', 'bg' => 'bg-pink-100'],
                                ['name' => 'lemonade', 'bg' => 'bg-yellow-200'],
                                ['name' => 'winter', 'bg' => 'bg-blue-100'],
                                ['name' => 'light', 'bg' => 'bg-gray-200'],
                                ['name' => 'valentine', 'bg' => 'bg-pink-500'],
                                ['name' => 'pastel', 'bg' => 'bg-pink-200'],
                                ['name' => 'corporate', 'bg' => 'bg-blue-100'],
                            ];

                        @endphp

                        <ul tabindex="0" id="ul-themes"
                            class="dropdown-content z-50 menu p-2 shadow-lg bg-base-200 rounded-box w-52 max-h-80 overflow-y-auto">
                            @foreach ($daisyuiThemes as $theme)
                                <li>
                                    <a id="theme-{{ $theme['name'] }}" class="theme-item">
                                        <span class="inline-block w-4 h-4 mr-2 rounded-full {{ $theme['bg'] }}"></span>
                                        {{ $theme['name'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>


                    </div>

                    <!-- User Menu -->
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                            <div class="">
                                <svg class="w-7 h-7 text-white hidden" id="theme-icon-dark-user" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <svg class="w-7 h-7 text-black hidden" id="theme-icon-light-user" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <ul tabindex="0"
                            class="menu dropdown-content z-[1] p-2 shadow-lg bg-base-200 rounded-box w-52 mt-4">
                            <li><a>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="p-4 w-full overflow-y-auto">
                {{ $slot }}
            </div>
        </div>

        <div class="drawer-side z-20">
            <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>

            <div class="menu bg-base-300 text-base-content min-h-full w-80 p-0 transition-all duration-300">
                <!-- Sidebar Header -->
                <div class="p-4 bg-primary text-primary-content flex items-center justify-between">
                    <h1 class="text-2xl font-bold">SiBarang</h1>

                </div>

                <!-- Navigation -->
                <ul class="p-4 space-y-2">
                    @php
                        $menus = [
                            [
                                'name' => 'Statistic',
                                'route' => 'Admin.Dashboard',
                                'icon' => '<svg id="menu-icon" class="w-7 h-7 transition-colors" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z"/>
                                <path d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z"/>
                            </svg>',
                                'iconNotActive' => '<svg id="menu-icon" class="w-7 h-7 text-gray-400 group-hover:text-white transition-colors" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z"/>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z"/>
                            </svg>',
                            ],
                            [
                                'name' => 'Users',
                                'route' => 'user.index',
                                'icon' => '<svg id="menu-icon" class="w-7 h-7 transition-colors" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                        </svg>',
                                'iconNotActive' => '<svg id="menu-icon" class="w-7 h-7 text-gray-400 group-hover:text-white transition-colors" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>',
                            ],
                            [
                                'name' => 'Items',
                                'route' => 'item.index',
                                'icon' => '<svg id="menu-icon" class="w-7 h-7 transition-colors" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 7h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C10.4 2.842 8.949 2 7.5 2A3.5 3.5 0 0 0 4 5.5c.003.52.123 1.033.351 1.5H4a2 2 0 0 0-2 2v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9a2 2 0 0 0-2-2Zm-9.942 0H7.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM13 14h-2v8h2v-8Zm-4 0H4v6a2 2 0 0 0 2 2h3v-8Zm6 0v8h3a2 2 0 0 0 2-2v-6h-5Z"/>
                        </svg>',
                                'iconNotActive' => '<svg id="menu-icon" class="w-7 h-7 text-gray-400 group-hover:text-white transition-colors" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21v-9m3-4H7.5a2.5 2.5 0 1 1 0-5c1.5 0 2.875 1.25 3.875 2.5M14 21v-9m-9 0h14v8a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-8ZM4 8h16a1 1 0 0 1 1 1v3H3V9a1 1 0 0 1 1-1Zm12.155-5c-3 0-5.5 5-5.5 5h5.5a2.5 2.5 0 0 0 0-5Z"/>
                        </svg>',
                            ],
                            [
                                'name' => 'Categories',
                                'route' => 'category.index',
                                'icon' => '<svg id="menu-icon" class="w-7 h-7 transition-colors" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M4.857 3A1.857 1.857 0 0 0 3 4.857v4.286C3 10.169 3.831 11 4.857 11h4.286A1.857 1.857 0 0 0 11 9.143V4.857A1.857 1.857 0 0 0 9.143 3H4.857Zm10 0A1.857 1.857 0 0 0 13 4.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 9.143V4.857A1.857 1.857 0 0 0 19.143 3h-4.286Zm-10 10A1.857 1.857 0 0 0 3 14.857v4.286C3 20.169 3.831 21 4.857 21h4.286A1.857 1.857 0 0 0 11 19.143v-4.286A1.857 1.857 0 0 0 9.143 13H4.857Zm10 0A1.857 1.857 0 0 0 13 14.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 19.143v-4.286A1.857 1.857 0 0 0 19.143 13h-4.286Z" clip-rule="evenodd"/>
                        </svg>',
                                'iconNotActive' => '<svg id="menu-icon" class="w-7 h-7 text-gray-400 group-hover:text-white transition-colors" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z"/>
                        </svg>',
                            ],
                        ];
                    @endphp

                    @foreach ($menus as $menu)
                        @php
                            $isActive = request()->routeIs($menu['route']);
                        @endphp
                        <li>
                            <a href="{{ route($menu['route']) }}"
                                class="flex items-center gap-3 px-4 py-3 rounded-lg text-base-content transition-all duration-200
                                  {{ $isActive ? 'bg-primary/10 font-semibold border-l-4 border-primary' : 'hover:bg-base-200' }}">
                                <div class="{{ $isActive ? 'text-primary' : 'text-base-content/70' }}">
                                    {!! $isActive ? $menu['icon'] : $menu['iconNotActive'] !!}
                                </div>
                                <span>{{ $menu['name'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const html = document.documentElement;
            const themeBtn = document.getElementById('theme-btn');
            const themeIconDark = document.getElementById('theme-icon-dark');
            const themeIconLight = document.getElementById('theme-icon-light');
            const themeIconDarkUser = document.getElementById('theme-icon-dark-user');
            const themeIconLightUser = document.getElementById('theme-icon-light-user');
            const ulThemes = document.getElementById('ul-themes');
            const themeItems = document.querySelectorAll('.theme-item');
            const menuIcons = document.querySelectorAll('#menu-icon');

            const savedTheme = localStorage.getItem('theme') || 'dracula';
            html.setAttribute('data-theme', savedTheme);
            updateThemeIcon(savedTheme);

            themeItems.forEach(item => {
                item.addEventListener('click', function() {
                    const newTheme = this.id.replace('theme-', '');
                    html.setAttribute('data-theme', newTheme);
                    localStorage.setItem('theme', newTheme);
                    updateThemeIcon(newTheme);
                });

                if (item.id === `theme-${savedTheme}`) {
                    item.classList.add('active');
                }
            });

            function updateThemeIcon(theme) {
                themeItems.forEach(item => item.classList.remove('active'));
                document.getElementById(`theme-${theme}`).classList.add('active');
                const darkThemes = [
                    'black',
                    'dark',
                    'dracula',
                    'night',
                    'business',
                    'luxury',
                    'coffee',
                    'forest',
                    'dim',
                    'synthwave',
                    'aqua',
                    'halloween'
                ];

                if (darkThemes.includes(theme)) {
                    themeIconDark.classList.remove('hidden');
                    themeIconLight.classList.add('hidden');
                    themeIconDarkUser.classList.remove('hidden');
                    themeIconLightUser.classList.add('hidden');
                } else {
                    themeIconDark.classList.add('hidden');
                    themeIconLight.classList.remove('hidden');
                    themeIconDarkUser.classList.add('hidden');
                    themeIconLightUser.classList.remove('hidden');

                }
            }
        });
    </script>
</x-layout>
