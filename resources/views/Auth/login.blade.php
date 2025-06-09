<x-layout>
  <div class="min-h-screen flex flex-col justify-center items-center bg-base-200">
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

    <div class="absolute top-4 right-4">
      <div class="dropdown dropdown-end">
        <label tabindex="0" class="btn btn-sm m-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-palette"
            viewBox="0 0 16 16">
            <path
              d="M8 5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm4 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM5.5 7a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm.5 6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
            <path
              d="M16 8c0 3.15-1.866 2.585-3.567 2.07C11.42 9.763 10.465 9.473 10 10c-.603.683-.475 1.819-.351 2.92C9.826 14.495 9.996 16 8 16a8 8 0 1 1 8-8zm-8 7c.611 0 .654-.171.655-.176.078-.146.124-.464.07-1.119-.014-.168-.037-.37-.061-.591-.052-.464-.112-1.005-.118-1.462-.01-.707.083-1.61.704-2.314.369-.417.845-.578 1.272-.618.404-.038.812.026 1.16.104.343.077.702.186 1.025.284l.028.008c.346.105.658.199.953.266.653.148.904.083.991.024C14.717 9.38 15 9.161 15 8a7 7 0 1 0-7 7z" />
          </svg>
          Theme
        </label>
        <ul tabindex="0"
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
    </div>

    <div class="card w-full max-w-lg bg-base-100 shadow-xl">
      <div class="card-body">
        <h1 class="text-3xl text-center font-bold mb-6">Login</h1>
        <form action="" method="POST" class="space-y-4">
          @csrf
          <div class="form-control">
            <label for="email" class="label">
              <span class="label-text">Email</span>
            </label>
            <input type="text" id="email" name="email" value="{{ old('email') }}"
              class="input input-bordered w-full @error('email') input-error @enderror" placeholder="Enter your email">
            @error('email')
              <label class="label">
                <span class="label-text-alt text-error">{{ $message }}</span>
              </label>
            @enderror
          </div>
          <div class="form-control">
            <label for="password" class="label">
              <span class="label-text">Password</span>
            </label>
            <input type="password" id="password" name="password"
              class="input input-bordered w-full @error('password') input-error @enderror"
              placeholder="Enter your password">
            @error('password')
              <label class="label">
                <span class="label-text-alt text-error">{{ $message }}</span>
              </label>
            @enderror
          </div>
          <div class="form-control mt-4 w-full text-center">
            @error('failed')
              <label class="label">
                <span class="label-text-alt text-error">{{ $message }}</span>
              </label>
            @enderror
            <button type="submit" class="btn btn-primary w-full">
              Login
            </button>
          </div>
        </form>

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
      }
    });
  </script>
</x-layout>
