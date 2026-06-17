<nav class="mt-2">
     <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @foreach ($items as $item)
             <li class="nav-item menu-open"><a class="
             nav-link
             {{Route::is($item['route']) ? 'active' : ''}}
             " href="{{ route($item['route']) }}" class="nav-link">
                <i class="{{ $item['icon'] }}"></i>
                <p>{{ $item['title'] }}
                    @if(isset($item['badge']))
                        <span class="badge badge-info right">{{ $item['badge'] }}</span>
                    @endif
                </p>
            </a></li>
        @endforeach
    </ul>
</nav>

