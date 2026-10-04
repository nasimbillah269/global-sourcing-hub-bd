@php
    $primaryMenu = menu('Primary Menu');
    $isHome = request()->routeIs('index');
    $home = $isHome ? '' : route('index');
    // One-page menu, used until a "Primary Menu" is created in admin
    $defaultMenus = [
        ['Home', $home.'#home'],
        ['About', $home.'#about'],
        ['Product', $home.'#product'],
        ['Team', $home.'#team'],
        ['Quality', $home.'#quality'],
        ['Services', $home.'#services'],
        ['Compliance', $home.'#compliance'],
        ['Profile', asset('files/company-profile.pdf'), true],
        ['Contact', $home.'#contact'],
    ];
@endphp
<!-- ============ HEADER ============ -->
<header class="gsh-header {{$isHome ? '' : 'gsh-header-solid'}}" id="gshHeader">
    <div class="container gsh-header-inner">
        <a class="gsh-logo" href="{{route('index')}}" aria-label="{{brandName()}}">
            <span class="gsh-logo-mark">G</span>
            <span class="gsh-logo-text">
                <strong>Global Sourcing Hub BD</strong>
                <small>Connecting Lifestyle Through Design</small>
            </span>
        </a>

        <div class="gsh-nav-overlay" id="gshNavOverlay"></div>

        <nav class="gsh-nav" id="gshNav" aria-label="Main">
            <a class="gsh-logo gsh-nav-brand" href="{{route('index')}}" aria-label="{{brandName()}}">
                <span class="gsh-logo-mark">G</span>
                <span class="gsh-logo-text">
                    <strong>Global Sourcing Hub BD</strong>
                    <small>Connecting Lifestyle Through Design</small>
                </span>
            </a>
            <ul>
                @if($primaryMenu && $primaryMenu->subMenus->count() > 0)
                    @foreach($primaryMenu->subMenus as $navItem)
                    <li class="{{$navItem->subMenus->count() > 0 ? 'has-sub' : ''}}">
                        <a href="{{asset($navItem->menuLink())}}" @if($navItem->target) target="_blank" @endif>{{$navItem->menuName()}}</a>
                        @if($navItem->subMenus->count() > 0)
                        <ul class="gsh-subnav">
                            @foreach($navItem->subMenus as $subItem)
                            <li><a href="{{asset($subItem->menuLink())}}" @if($subItem->target) target="_blank" @endif>{{$subItem->menuName()}}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                @else
                    @foreach($defaultMenus as $i => $item)
                    <li><a href="{{$item[1]}}" class="{{$isHome && $i == 0 ? 'active' : ''}}" @if(!empty($item[2])) target="_blank" rel="noopener" @endif>{{$item[0]}}</a></li>
                    @endforeach
                @endif
            </ul>
            <a href="{{$home}}#contact" class="gsh-btn gsh-btn-primary gsh-nav-cta d-lg-none">Get a Quote</a>
        </nav>

        <div class="gsh-header-actions">
            <a href="{{$home}}#contact" class="gsh-btn gsh-btn-primary gsh-btn-sm d-none d-lg-inline-flex">Get a Quote</a>
            <button class="gsh-nav-toggle" id="gshNavToggle" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="gshNav">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>

@push('js')
<script>
    (function () {
        var header = document.getElementById('gshHeader');
        var toggle = document.getElementById('gshNavToggle');
        var nav = document.getElementById('gshNav');
        if (!header) return;

        // Solid background once the page is scrolled
        function onScroll() {
            header.classList.toggle('is-scrolled', window.scrollY > 40);
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();

        // Mobile menu
        function closeNav() {
            header.classList.remove('nav-open');
            toggle.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        }
        toggle.addEventListener('click', function () {
            var open = header.classList.toggle('nav-open');
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            document.body.style.overflow = open ? 'hidden' : '';
        });
        nav.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', closeNav);
        });
        document.getElementById('gshNavOverlay').addEventListener('click', closeNav);
        window.addEventListener('resize', function () {
            if (window.innerWidth >= 992) closeNav();
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeNav();
        });

        // Highlight the menu item of the section in view (one-page menu)
        var links = Array.prototype.filter.call(nav.querySelectorAll('ul a[href*="#"]'), function (a) {
            var id = a.getAttribute('href').split('#')[1];
            return id && document.getElementById(id);
        });
        if (!links.length || !('IntersectionObserver' in window)) return;
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                links.forEach(function (a) {
                    a.classList.toggle('active', a.getAttribute('href').split('#')[1] === entry.target.id);
                });
            });
        }, { rootMargin: '-45% 0px -50% 0px' });
        links.forEach(function (a) {
            observer.observe(document.getElementById(a.getAttribute('href').split('#')[1]));
        });
    })();
</script>
@endpush
