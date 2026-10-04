@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle(($category->parent ? $category->parent->name.' - ' : '').$category->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle($category->name)}}" />
        <meta name="description" property="og:description" content="{!!$category->seo_description?:general()->meta_description!!}" />
        <meta name="keywords" content="{{$category->seo_keyword?:general()->meta_keyword}}" />
        <meta name="image" property="og:image" content="{{asset($category->image())}}" />
        <meta name="url" property="og:url" content="{{route('serviceCategory',$category->slug?:'no-title')}}" />
        <link rel="canonical" href="{{route('serviceCategory',$category->slug?:'no-title')}}">
@endsection 
@push('css')
<style>

</style>
@endpush 

@section('contents')

<div class="breadcrumb-area"
    @if($category->bannerFile)
    style="background-image:url({{asset($category->banner())}});background-repeat: no-repeat;
        background-size: cover;padding: 50px 0;"
    @endif
    >
    <div class="container">
        <div class="title">
            <h1>@if($category->parent){{$category->parent->name}} &ndash; @endif{{$category->name}}</h1>
            <ul>
                <li><a href="{{route('index')}}">Home</a></li>
                @if($category->parent)
                <li><a href="{{route('serviceCategory',$category->parent->slug?:'no-title')}}">{{$category->parent->name}}</a></li>
                @endif
                <li>{{$category->name}}</li>
            </ul>
        </div>
    </div>
</div>

@if($subCategories->count() > 0)
<section class="gsh-section gsh-bg-cream">
    <div class="container">
        @if($category->description)
        <div class="gsh-section-head pageContent">{!!$category->description!!}</div>
        @endif
        <div class="gsh-subctg-grid">
            @foreach($subCategories as $subCategory)
            <a href="{{route('serviceCategory', $subCategory->slug ?: 'no-title')}}" class="gsh-product">
                <img src="{{asset($subCategory->image())}}" alt="{{$subCategory->name}}" loading="lazy">
                <div class="gsh-product-caption">
                    <span>{{$category->name}}</span>
                    <h3>{{$subCategory->name}}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($productImages->count() > 0 || $services->count() > 0)
<section class="gsh-section">
    <div class="container">
        <div class="gsh-gallery-grid">
            @foreach($services as $service)
            <figure class="gsh-gallery-item">
                <img src="{{asset($service->image())}}" alt="{{$service->name}}" loading="lazy">
            </figure>
            @endforeach
            @foreach($productImages as $productImage)
            <figure class="gsh-gallery-item">
                <img src="{{asset($productImage->file_url)}}" alt="{{$productImage->alt_text ?: $category->name}}" loading="lazy">
            </figure>
            @endforeach
        </div>
        <div class="mt-4">{{$services->links('pagination')}}</div>
    </div>
</section>
@endif

@endsection 

@push('js') @endpush