<option value="{{ $category->id }}">{{ $prefix }} {{ $category->name }}</option>

@if ($category->children)
    @foreach ($category->children as $child)
        @include('admin.partials.category-option', [
            'category' => $child,
            'prefix' => $prefix . '--'  // Thêm dấu gạch ngang để biểu thị cấp độ
        ])
    @endforeach
@endif
