@extends('docweaver::layout')

@section('docweaver-content')
<div id="docweaver-product-showcase" class="products product-showcase">
    <h1 class="docweaver-h1">{{ $title }}</h1>
    @if(!empty($viewTemplateInfo['docs_intro']))
    <p class="docweaver-intro">{{ $viewTemplateInfo['docs_intro'] }}</p>
    @endif
    @if(count($products))
    <div class="product-list">
        @foreach($products as $productKey => $product)
        <div id="product-{{ $productKey }}" class="product" data-name="{{ $product->getName() }}">
            <a href="{!! route($routeConfig['names']['product_index'], $productKey) !!}">
                <h4 class="product-title">{{ $product->getName() }}</h4>
                @if (!empty($product->getImageUrl()))
                <div class="product-image">
                    <img src="{!! $product->getImageUrl() !!}" alt="{{ $product->getName() }}">
                </div>
                @endif
                <div class="product-info">
                    <ul class="info-list">
                        @if (!empty($product->getDescription()))
                        <li class="description">
                            <span class="label">Description:</span> 
                            <span>{{ $product->getDescription() }}</span>
                        </li>
                        @endif
                        <li>
                            <span class="label">Version:</span> 
                            <span>{{ $product->getDefaultVersion() }}</span>
                        </li>
                        <li>
                            <span class="label">Last updated:</span>
                            <span>{{ $product->getLastModified()->diffForHumans() }}</span>
                        </li>
                    </ul>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    @else
    <div class="empty no-docs">
        <p>No documentation available. Please come back later.</p>
    </div>
    @endif
</div>
@endsection