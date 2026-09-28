@php
    $homeSlider = slider('Home Page Slider');
    $slides = [];
    if($homeSlider && $homeSlider->subSliders->count() > 0){
        foreach($homeSlider->subSliders as $item){
            $slides[] = [
                'eyebrow' => 'Connecting Lifestyle Through Design',
                'title' => $item->name ?: 'Your trusted <em>sourcing partner</em>',
                'text' => $item->description,
                'image' => asset($item->image()),
                'btnText' => $item->seo_title,
                'btnLink' => $item->seo_description,
            ];
        }
    }else{
        // Default slides, used until a "Home Page Slider" is created in admin
        $slides = [
            [
                'eyebrow' => 'Connecting Lifestyle Through Design',
                'title' => 'Your trusted <em>sourcing partner</em>',
                'text' => 'Premium knit, woven and sweater sourcing. We connect global buyers with reliable manufacturers and skilled artisans.',
                'image' => asset('welcome/images/gsh/hero-1.jpg'),
                'btnText' => null, 'btnLink' => null,
            ],
            [
                'eyebrow' => 'Quality &middot; Pricing &middot; Delivery',
                'title' => 'Quality at <em>every step</em>',
                'text' => 'High-quality products, competitive pricing and on-time delivery, from supplier evaluation to final pre-shipment checks.',
                'image' => asset('welcome/images/gsh/hero-2.jpg'),
                'btnText' => null, 'btnLink' => null,
            ],
            [
                'eyebrow' => 'Knit &middot; Woven &middot; Sweater',
                'title' => 'Built on <em>trust &amp; transparency</em>',
                'text' => 'Long-term partnerships and customized sourcing solutions that help our clients grow.',
                'image' => asset('welcome/images/gsh/hero-3.jpg'),
                'btnText' => null, 'btnLink' => null,
            ],
        ];
    }
    $slideCount = count($slides);
@endphp
<!-- ============ HERO SLIDER ============ -->
<section class="gsh-hero" id="home">
    <div id="gshHeroSlider" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="7000" data-bs-pause="false">
        <div class="carousel-inner">
            @foreach($slides as $i => $slide)
            <div class="carousel-item {{$i == 0 ? 'active' : ''}}">
                <div class="gsh-hero-slide">
                    <div class="gsh-hero-bg" style="background-image:url('{{$slide['image']}}');"></div>
                    <div class="container">
                        <div class="gsh-hero-caption">
                            <span class="gsh-eyebrow gsh-eyebrow-light">{!!$slide['eyebrow']!!}</span>
                            <{{$i == 0 ? 'h1' : 'h2'}} class="gsh-hero-title">{!!$slide['title']!!}</{{$i == 0 ? 'h1' : 'h2'}}>
                            @if($slide['text'])
                            <p class="gsh-hero-text">{!!$slide['text']!!}</p>
                            @endif
                            <div class="gsh-hero-actions">
                                @if($slide['btnText'] && $slide['btnLink'])
                                <a href="{{$slide['btnLink']}}" class="gsh-btn gsh-btn-primary">{!!$slide['btnText']!!} <i class="fa-solid fa-arrow-right"></i></a>
                                @else
                                <a href="#product" class="gsh-btn gsh-btn-primary">Explore Products <i class="fa-solid fa-arrow-right"></i></a>
                                @endif
                                <a href="#contact" class="gsh-btn gsh-btn-ghost">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="gsh-hero-footer">
            <div class="container d-flex align-items-end justify-content-between">
                <div class="gsh-hero-indicators">
                    @foreach($slides as $i => $slide)
                    <button type="button" data-bs-target="#gshHeroSlider" data-bs-slide-to="{{$i}}" class="{{$i == 0 ? 'active' : ''}}" @if($i == 0) aria-current="true" @endif aria-label="Slide {{$i + 1}}">
                        <span class="num">{{str_pad($i + 1, 2, '0', STR_PAD_LEFT)}}</span>
                        <span class="bar"><span></span></span>
                    </button>
                    @endforeach
                </div>
                @if($slideCount > 1)
                <div class="gsh-hero-arrows">
                    <button type="button" data-bs-target="#gshHeroSlider" data-bs-slide="prev" aria-label="Previous slide"><i class="fa-solid fa-arrow-left"></i></button>
                    <button type="button" data-bs-target="#gshHeroSlider" data-bs-slide="next" aria-label="Next slide"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
                @endif
            </div>
        </div>
    </div>

    <a href="#about" class="gsh-scroll-down" aria-label="Scroll down"><span></span></a>
</section>
