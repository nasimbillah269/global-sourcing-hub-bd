@extends(welcomeTheme().'layouts.app')
@section('title')
<title>{{websiteTitle()}}</title>
@endsection
@section('SEO')
<meta name="title" property="og:title" content="{{general()->meta_title}}" />
<meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
<meta name="keyword" property="og:keyword" content="{{general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset('welcome/images/gsh/hero-1.jpg')}}" />
<meta name="url" property="og:url" content="{{route('index')}}" />
<link rel="canonical" href="{{route('index')}}">
@endsection
@push('css')
<script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "WebPage",
    "url": "{{route('index')}}",
    "name": "{{websiteTitle()}}",
    "author": {
        "@type": "Webpage",
        "name": "{{websiteTitle()}}"
    },
    "description": "{!!general()->meta_description!!}"
    }
</script>
@endpush

@php
    $g = general();
    $img = function($name){ return asset('welcome/images/gsh/'.$name); };
    $careerPage = pageTemplate('Career');
    $stats = [
        ['fa-shirt', 3, '', 'Core product lines:<br>knit, woven &amp; sweater'],
        ['fa-people-group', 3, '', 'Categories: men, ladies,<br>kids &amp; newborn'],
        ['fa-list-check', 7, '', 'End-to-end sourcing<br>services'],
        ['fa-certificate', 8, '+', 'International standards<br>supported'],
    ];
    $pillars = [
        ['Our Vision', 'A globally trusted sourcing partner', 'To be a globally trusted sourcing partner, connecting international buyers with reliable manufacturers through quality products, ethical practices, innovative solutions, and lasting partnerships.', 'production.jpg', 'fa-eye'],
        ['Our Mission', 'Reliable, transparent &amp; cost-effective', 'To provide reliable, transparent, and cost-effective sourcing solutions for apparel, handicrafts, and home textiles by connecting global buyers with trusted manufacturers, with a commitment to quality, ethical sourcing and timely delivery.', 'design.jpg', 'fa-bullseye'],
        ['Our Values', 'Integrity &middot; quality &middot; reliability', 'We are guided by integrity, quality, reliability, and ethical sourcing. We believe in building trusted partnerships, delivering consistent value, and providing exceptional service while promoting sustainable and responsible business practices.', 'worldwide.jpg', 'fa-handshake'],
    ];
    $products = [
        ["Men's Apparel", 'Knit, woven &amp; sweater', 'product-1.jpg'],
        ["Ladies' Apparel", 'Knit, woven &amp; sweater', 'product-4.jpg'],
        ['Kids &amp; Newborn', 'Knit, woven &amp; sweater', 'product-7.jpg'],
        ['Knit', 'Tees, polos &amp; fleece', 'product-5.jpg'],
        ['Woven', 'Denim &amp; non-denim', 'product-2.jpg'],
        ['Sweater', 'Flat knit collections', 'product-3.jpg'],
    ];
    $qualitySteps = [
        ['Supplier evaluation', 'Partner factories are carefully evaluated before any order is placed.'],
        ['Product inspections', 'Products are inspected against buyer and international standards.'],
        ['Production monitoring', 'Every stage of production is followed closely by our team.'],
        ['Pre-shipment checks', 'Final checks before shipment ensure consistency and reliability.'],
    ];
    $services = [
        ['fa-magnifying-glass', 'Product Sourcing', 'Sourcing premium knit, woven and sweater products for global buyers.'],
        ['fa-user-check', 'Supplier Identification &amp; Verification', 'A reliable, verified network of manufacturers and skilled artisans.'],
        ['fa-pen-ruler', 'Product Development &amp; Sampling', 'Turning your ideas into samples ready for approval.'],
        ['fa-clipboard-check', 'Quality Inspection &amp; Assurance', 'Strict quality control throughout sourcing and production.'],
        ['fa-chart-line', 'Production Monitoring', 'Close follow-up so orders stay on quality and on schedule.'],
        ['fa-tags', 'Packaging &amp; Labeling Support', 'Packaging and labeling prepared to your brand requirements.'],
        ['fa-ship', 'Logistics &amp; Shipment Coordination', 'Coordinating logistics for on-time shipment and delivery.'],
        ['fa-copyright', 'Private Label Solutions', 'Custom manufacturing that reflects your brand identity.'],
    ];
    $whyChoose = [
        ['Verified Suppliers', 'Reliable and verified supplier network'],
        ['Competitive Pricing', 'Competitive pricing with uncompromised quality'],
        ['Ethical Sourcing', 'Strong commitment to ethical and sustainable sourcing'],
        ['Transparency', 'Transparent communication throughout the sourcing process'],
        ['On-time Delivery', 'On-time production and delivery'],
        ['Personalized Support', 'Personalized support for businesses of all sizes'],
    ];
    $certificates = [
        ['BSCI', 'Social compliance'],
        ['SEDEX', 'SMETA audit'],
        ['WRAP', 'Responsible production'],
        ['ACCORD', 'Workplace safety'],
        ['OEKO-TEX&reg;', 'Textile safety'],
        ['GOTS', 'Organic textiles'],
        ['GRS', 'Recycled content'],
        ['OCS', 'Organic content'],
    ];
    // [city, office, longitude, latitude] — map spans lon -180..180, lat 84..-60
    $offices = [
        ['Dhaka', 'Head Office, Uttara', 90.4, 23.8],
    ];
@endphp

@section('contents')

<!--Slider Part Include Start-->
@include(welcomeTheme().'layouts.slider')

<!-- ============ WHO WE ARE ============ -->
<section class="gsh-section gsh-bg-white" id="about">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-reveal>
                <div class="gsh-about-media">
                    <img class="gsh-about-main" src="{{$img('about-1.jpg')}}" alt="Garment worker sewing in a Bangladesh factory" loading="lazy">
                    <img class="gsh-about-sub" src="{{$img('about-2.jpg')}}" alt="Designer sketching a new clothing collection" loading="lazy">
                    <div class="gsh-about-badge">
                        <strong>3</strong>
                        <span>Knit, woven<br>&amp; sweater</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-reveal>
                <span class="gsh-eyebrow">Company introduction</span>
                <h2 class="gsh-heading">Your trusted partner for <em>premium sourcing</em></h2>
                <p class="gsh-lead">Welcome to Global Sourcing Hub, your trusted partner for sourcing premium knit, woven and sweater products.</p>
                <p>We connect global buyers with reliable manufacturers and skilled artisans, ensuring <strong>high-quality products, competitive pricing, and on-time delivery.</strong> With a strong supplier network and industry expertise, we provide end-to-end sourcing solutions.</p>
                <ul class="gsh-checklist">
                    <li><i class="fa-solid fa-check"></i>Supplier selection and product development</li>
                    <li><i class="fa-solid fa-check"></i>Quality control and production monitoring</li>
                    <li><i class="fa-solid fa-check"></i>Logistics coordination through to delivery</li>
                </ul>
                <p>We are committed to building long-term partnerships through trust, transparency, and customized sourcing solutions that help our clients grow.</p>
                <a href="#services" class="gsh-btn gsh-btn-dark">Explore Our Services <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- ============ STATS ============ -->
<section class="gsh-stats" style="--bg:url('{{$img('stats-bg.jpg')}}');">
    <div class="container">
        <div class="row g-0">
            @foreach($stats as $stat)
            <div class="col-6 col-lg-3 gsh-stat" data-reveal>
                <i class="fa-solid {{$stat[0]}} gsh-stat-icon"></i>
                <div class="gsh-stat-num"><span data-count="{{$stat[1]}}">{{$stat[1]}}</span>{{$stat[2]}}</div>
                <div class="gsh-stat-label">{!!$stat[3]!!}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ VISION / MISSION / VALUES ============ -->
<section class="gsh-section gsh-bg-navy gsh-photo-bg" id="vision" style="--bg:url('{{$img('threads-bg.jpg')}}');">
    <div class="container">
        <div class="gsh-section-head text-center" data-reveal>
            <span class="gsh-eyebrow gsh-eyebrow-light gsh-eyebrow-center">Vision, mission, values</span>
            <h2 class="gsh-heading gsh-heading-light">Connecting buyers and makers through <em>lasting partnerships</em></h2>
        </div>
        <div class="row g-4">
            @foreach($pillars as $i => $item)
            <div class="col-md-6 col-lg-4" data-reveal style="--delay:{{$i * 0.12}}s;">
                <article class="gsh-card">
                    <div class="gsh-card-media">
                        <img src="{{$img($item[3])}}" alt="{{$item[0]}}" loading="lazy">
                        <span class="gsh-card-icon"><i class="fa-solid {{$item[4]}}"></i></span>
                    </div>
                    <div class="gsh-card-body">
                        <span class="gsh-card-num">0{{$i + 1}}</span>
                        <h3>{{$item[0]}}</h3>
                        <h6>{!!$item[1]!!}</h6>
                        <p>{{$item[2]}}</p>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ PRODUCT CATEGORY ============ -->
<section class="gsh-section gsh-bg-cream" id="product">
    <div class="container">
        <div class="row align-items-end g-4 gsh-section-head" data-reveal>
            <div class="col-lg-6">
                <span class="gsh-eyebrow">Product category</span>
                <h2 class="gsh-heading mb-0">Quality, craftsmanship &amp; <em>functionality</em></h2>
            </div>
            <div class="col-lg-6">
                <p>We offer a carefully selected range of high-quality products sourced from trusted manufacturers and skilled artisans, produced with attention to detail and in accordance with <strong>international quality standards.</strong></p>
                <p class="mb-0">We also support <strong>custom manufacturing and private label solutions</strong>, helping businesses create products that reflect their brand identity.</p>
            </div>
        </div>
    </div>
    <div class="gsh-products" data-reveal>
        <div class="gsh-products-track" id="gshProducts">
            @foreach($products as $product)
            <figure class="gsh-product">
                <img src="{{$img($product[2])}}" alt="{!!strip_tags($product[0])!!}" loading="lazy">
                <figcaption>
                    <span>{!!$product[1]!!}</span>
                    <h3>{!!$product[0]!!}</h3>
                </figcaption>
            </figure>
            @endforeach
        </div>
        <div class="container d-flex justify-content-between align-items-center mt-4">
            <div class="gsh-products-progress"><span id="gshProductsBar"></span></div>
            <div class="gsh-round-arrows">
                <button type="button" class="gsh-products-prev" aria-label="Previous products"><i class="fa-solid fa-arrow-left"></i></button>
                <button type="button" class="gsh-products-next" aria-label="Next products"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
</section>

<!-- ============ OUR TEAM ============ -->
<section class="gsh-section gsh-bg-navy gsh-photo-bg gsh-parallax" id="team" style="--bg:url('{{$img('team-bg.jpg')}}');">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5" data-reveal>
                <span class="gsh-eyebrow gsh-eyebrow-light">Our team</span>
                <h2 class="gsh-heading gsh-heading-light">A team of <em>professionals</em> behind every order</h2>
                <div class="gsh-team-stats">
                    <div><strong>4</strong><span>Specialist teams</span></div>
                    <div><strong>360&deg;</strong><span>End-to-end support</span></div>
                </div>
            </div>
            <div class="col-lg-7" data-reveal>
                <div class="gsh-glass">
                    <h6>Our team</h6>
                    <p>Our team consists of experienced sourcing professionals, product specialists, quality inspectors, and supply chain coordinators. We work closely with buyers, manufacturers, and artisans to ensure every project is managed with <strong>professionalism, transparency, and attention to detail.</strong></p>
                    <h6>Our approach</h6>
                    <p>Our collaborative approach lets us understand each client's unique requirements and provide tailored sourcing solutions that meet quality, budget, and delivery expectations. Strong relationships, effective communication, and industry expertise are the foundation of successful partnerships.</p>
                    <div class="gsh-chips">
                        <span>Sourcing Professionals</span><span>Product Specialists</span><span>Quality Inspectors</span><span>Supply Chain Coordinators</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ QUALITY ============ -->
<section class="gsh-section gsh-bg-white" id="quality">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-reveal>
                <div class="gsh-media-frame">
                    <img src="{{$img('quality.jpg')}}" alt="Industrial sewing machine close-up" loading="lazy">
                    <div class="gsh-float-card">
                        <i class="fa-solid fa-shield-halved"></i>
                        <div><strong>Strict Quality Control</strong><span>From sourcing to shipment</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" data-reveal>
                <span class="gsh-eyebrow">Quality</span>
                <h2 class="gsh-heading">Quality is at the core of <em>everything we do</em></h2>
                <p>We implement <strong>strict quality control measures throughout the sourcing and production process</strong> to ensure every product meets our clients' expectations and international standards. By working closely with trusted manufacturers, we ensure consistency, reliability, and customer satisfaction.</p>
                <ol class="gsh-steps">
                    @foreach($qualitySteps as $i => $step)
                    <li>
                        <span class="gsh-step-num">{{$i + 1}}</span>
                        <div><h6>{{$step[0]}}</h6><p>{{$step[1]}}</p></div>
                    </li>
                    @endforeach
                </ol>
                <div class="gsh-partners"><span>Our promise</span> Craftsmanship &middot; Durability &middot; Performance</div>
            </div>
        </div>
    </div>
</section>

<!-- ============ OUR SERVICES ============ -->
<section class="gsh-section gsh-bg-navy gsh-photo-bg" id="services" style="--bg:url('{{$img('innovation-bg.jpg')}}');">
    <div class="container">
        <div class="row g-5 align-items-end gsh-section-head" data-reveal>
            <div class="col-lg-6">
                <span class="gsh-eyebrow gsh-eyebrow-light">Our services</span>
                <h2 class="gsh-heading gsh-heading-light mb-0">End-to-end <em>sourcing solutions</em></h2>
            </div>
            <div class="col-lg-6">
                <p class="mb-0">What we source: <strong>apparel &amp; fashion garments</strong> in knit, woven (denim &amp; non-denim) and sweater. What we do: everything from finding the right supplier to getting your order shipped on time.</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach($services as $i => $item)
            <div class="col-sm-6 col-lg-3" data-reveal style="--delay:{{($i % 4) * 0.1}}s;">
                <div class="gsh-feature">
                    <span class="gsh-feature-icon"><i class="fa-solid {{$item[0]}}"></i></span>
                    <h3>{!!$item[1]!!}</h3>
                    <p>{{$item[2]}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ COMPLIANCE ============ -->
<section class="gsh-section gsh-bg-cream" id="compliance">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 order-2 order-lg-1" data-reveal>
                <span class="gsh-eyebrow">Compliance &amp; responsible sourcing</span>
                <h2 class="gsh-heading">Compliant factories, <em>responsible production</em></h2>
                <p>Our production network is built around <strong>compliance, transparency, and responsible sourcing.</strong> We carefully evaluate partner factories and continuously monitor worker welfare, workplace safety, quality, and environmental standards.</p>
                <p>Our factories can support internationally recognized standards and certifications according to buyer and product requirements.</p>
                <div class="gsh-certs">
                    @foreach($certificates as $cert)
                    <div class="gsh-cert">
                        <strong>{!!$cert[0]!!}</strong>
                        <span>{!!$cert[1]!!}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2" data-reveal>
                <div class="gsh-media-frame gsh-media-frame-right">
                    <img src="{{$img('compliance.jpg')}}" alt="Garment worker in a compliant factory" loading="lazy">
                    <div class="gsh-float-card">
                        <i class="fa-solid fa-hand-holding-heart"></i>
                        <div><strong>Our Commitment</strong><span>Reliable delivery for global buyers</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ CAREER ============ -->
<section class="gsh-career" id="career" style="--bg:url('{{$img('career-bg.jpg')}}');">
    <div class="container">
        <div class="row align-items-center g-4" data-reveal>
            <div class="col-lg-8">
                <span class="gsh-eyebrow gsh-eyebrow-light">Career</span>
                <h2 class="gsh-heading gsh-heading-light mb-2">Want to grow with us? <em>Join our team.</em></h2>
                <p class="mb-0">We are always looking for sourcing professionals, product specialists, quality inspectors and supply chain coordinators who share our passion for great product.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{$careerPage ? route('pageView', $careerPage->slug ?: 'no-title') : '#contact'}}" class="gsh-btn gsh-btn-light">View Job Vacancies <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- ============ WHY CHOOSE US / MAP ============ -->
<section class="gsh-section gsh-map" id="why-us">
    <div class="container">
        <div class="gsh-section-head text-center" data-reveal>
            <span class="gsh-eyebrow gsh-eyebrow-light gsh-eyebrow-center">Why choose Global Sourcing Hub</span>
            <h2 class="gsh-heading gsh-heading-light">Rooted in Dhaka, <em>serving global buyers</em></h2>
        </div>
        <div class="gsh-map-canvas" style="--map:url('{{$img('world-map.svg')}}');" data-reveal>
            @foreach($offices as $i => $office)
            <button type="button" class="gsh-map-pin {{$i == 0 ? 'is-main' : ''}}" style="left:{{round(($office[2] + 180) / 360 * 100, 2)}}%;top:{{round((84 - $office[3]) / 144 * 100, 2)}}%;" aria-label="{{$office[0]}}, {{$office[1]}}">
                <span class="gsh-map-label">{{$office[0]}}<small>{{$office[1]}}</small></span>
            </button>
            @endforeach
        </div>
        <div class="gsh-offices" data-reveal>
            @foreach($whyChoose as $item)
            <div><strong>{{$item[0]}}</strong><span>{{$item[1]}}</span></div>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ CONTACT ============ -->
<section class="gsh-section gsh-bg-white" id="contact">
    <div class="container">
        <div class="gsh-contact" data-reveal>
            <div class="row g-0">
                <div class="col-lg-5">
                    <div class="gsh-contact-info" style="--bg:url('{{$img('contact.jpg')}}');">
                        <span class="gsh-eyebrow gsh-eyebrow-light">Get in touch</span>
                        <h2 class="gsh-heading gsh-heading-light">We'd love to <em>hear from you</em></h2>
                        <p>Whether you're looking for a reliable sourcing partner, requesting a quotation, or seeking more information about our products and services, our team is here to assist you.</p>
                        <ul>
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
                <div class="col-lg-7">
                    <div class="gsh-contact-form">
                        <h3>Request a quotation</h3>
                        @include(welcomeTheme().'alerts')
                        <form action="{{route('contactMail')}}" method="post" class="gsh-form">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="gshName">Your name</label>
                                    <input type="text" id="gshName" name="name" value="{{old('name')}}" placeholder="John Smith" maxlength="100" required>
                                    @error('name')<span class="gsh-form-error">{{$message}}</span>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="gshEmail">Email address</label>
                                    <input type="email" id="gshEmail" name="email" value="{{old('email')}}" placeholder="you@company.com" maxlength="100" required>
                                    @error('email')<span class="gsh-form-error">{{$message}}</span>@enderror
                                </div>
                                <div class="col-12">
                                    <label for="gshSubject">Subject</label>
                                    <input type="text" id="gshSubject" name="subject" value="{{old('subject')}}" placeholder="e.g. Quotation for knit polos" maxlength="100" required>
                                    @error('subject')<span class="gsh-form-error">{{$message}}</span>@enderror
                                </div>
                                <div class="col-12">
                                    <label for="gshMessage">Message</label>
                                    <textarea id="gshMessage" name="message" rows="5" placeholder="Product, fabric, quantity, target price and delivery date..." maxlength="500">{{old('message')}}</textarea>
                                    @error('message')<span class="gsh-form-error">{{$message}}</span>@enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="gsh-btn gsh-btn-primary">Send Message <i class="fa-solid fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('js')
<script>
    (function () {
        // Product carousel: horizontal scroll with arrows and a progress bar
        var track = document.getElementById('gshProducts');
        var bar = document.getElementById('gshProductsBar');
        if (track) {
            var step = function () { return track.querySelector('.gsh-product').offsetWidth + 24; };
            var update = function () {
                var max = track.scrollWidth - track.clientWidth;
                var visible = track.clientWidth / track.scrollWidth;
                bar.style.width = (visible * 100) + '%';
                bar.style.left = (max > 0 ? (track.scrollLeft / max) * (100 - visible * 100) : 0) + '%';
            };
            document.querySelector('.gsh-products-prev').addEventListener('click', function () {
                track.scrollBy({ left: -step(), behavior: 'smooth' });
            });
            document.querySelector('.gsh-products-next').addEventListener('click', function () {
                var atEnd = track.scrollLeft + track.clientWidth >= track.scrollWidth - 5;
                track.scrollTo({ left: atEnd ? 0 : track.scrollLeft + step(), behavior: 'smooth' });
            });
            track.addEventListener('scroll', update, { passive: true });
            window.addEventListener('resize', update);
            update();
        }

        // Count-up numbers in the stats band
        var counters = document.querySelectorAll('[data-count]');
        var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (!counters.length || reduce || !('IntersectionObserver' in window)) return;
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                var el = entry.target, target = +el.getAttribute('data-count'), start = null;
                io.unobserve(el);
                function tick(t) {
                    if (!start) start = t;
                    var p = Math.min((t - start) / 1400, 1);
                    el.textContent = Math.round(target * (1 - Math.pow(1 - p, 3)));
                    if (p < 1) requestAnimationFrame(tick);
                }
                el.textContent = '0';
                requestAnimationFrame(tick);
            });
        }, { threshold: 0.6 });
        counters.forEach(function (c) { io.observe(c); });
    })();
</script>
@endpush
