<li>
    <a href="{{ route('product.category', ['slug' => $category->slug]) }}" title="">{{ $category->name }}</a>
    @if ($category->children->isNotEmpty())
        <ul class="sub-menu">
            @foreach ($category->children as $child)
                @include('partials.category-menu', ['category' => $child])
            @endforeach
        </ul>
    @endif
</li>
