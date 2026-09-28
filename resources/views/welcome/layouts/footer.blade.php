@php
    $g = general();
    $home = request()->routeIs('index') ? '' : route('index');
    $privacyPage = pageTemplate('Privacy Policy');
    // Always shown; the link comes from Settings (falls back to "#" until one is set)
    $socials = [
        ['facebook_link', 'fa-facebook-f', 'Facebook'],
        ['instagram_link', 'fa-instagram', 'Instagram'],
        ['linkedin_link', 'fa-linkedin-in', 'LinkedIn'],
        ['youtube_link', 'fa-youtube', 'YouTube'],
    ];
    $quickLinks = [['About Us', '#about'], ['Our Services', '#services'], ['Our Team', '#team'], ['Quality', '#quality'], ['Compliance', '#compliance'], ['Contact', '#contact']];
    $productLinks = ["Men's Apparel", "Ladies' Apparel", 'Kids &amp; Newborn', 'Knit', 'Woven (Denim &amp; Non-Denim)', 'Sweater'];
@endphp
<!-- ============ FOOTER ============ -->
<footer class="gsh-footer">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <a class="gsh-logo" href="{{route('index')}}" aria-label="{{brandName()}}">
                    <span class="gsh-logo-mark">G</span>
                    <span class="gsh-logo-text">
                        <strong>Global Sourcing Hub BD</strong>
                        <small>Connecting Lifestyle Through Design</small>
                    </span>
                </a>
                <p class="gsh-footer-about">Your trusted partner for sourcing premium knit, woven and sweater, connecting global buyers with reliable manufacturers and skilled artisans.</p>
                <div class="gsh-footer-social">
                    @foreach($socials as $social)
                        @php $socialUrl = \Illuminate\Support\Str::startsWith($g->{$social[0]}, 'http') ? $g->{$social[0]} : null; @endphp
                        <a href="{{$socialUrl ?: '#'}}" @if($socialUrl) target="_blank" rel="noopener" @endif aria-label="{{$social[2]}}"><i class="fa-brands {{$social[1]}}"></i></a>
                    @endforeach
                </div>
            </div>
            <div class="col-6 col-lg-2">
                <h6 class="gsh-footer-title">Company</h6>
                <ul class="gsh-footer-links">
                    @foreach($quickLinks as $link)
                    <li><a href="{{$home.$link[1]}}">{{$link[0]}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-6 col-lg-2">
                <h6 class="gsh-footer-title">Products</h6>
                <ul class="gsh-footer-links">
                    @foreach($productLinks as $product)
                    <li><a href="{{$home}}#product">{!!$product!!}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-4">
                <h6 class="gsh-footer-title">Get in Touch</h6>
                <ul class="gsh-footer-contact">
                    @if($g->address_one)
                    <li><i class="fa-solid fa-location-dot"></i><span>{{$g->address_one}}</span></li>
                    @endif
                    @if($g->mobile)
                    <li><i class="fa-solid fa-phone"></i><a href="tel:{{$g->mobile}}">{{$g->mobile}}</a></li>
                    @endif
                    @if($g->email)
                    <li><i class="fa-solid fa-envelope"></i><a href="mailto:{{$g->email}}">{{$g->email}}</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="gsh-footer-bottom">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
            <span>&copy; {{date('Y')}} {{brandName()}}. All rights reserved.</span>
            <span>
                @if($privacyPage)
                <a href="{{route('pageView', $privacyPage->slug ?: 'no-title')}}">Privacy Policy</a> &middot;
                @endif
                Made with care in Dhaka, Bangladesh
            </span>
        </div>
    </div>
</footer>
