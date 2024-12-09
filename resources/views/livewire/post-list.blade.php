<div>
    @if ($posts)
        @foreach ($posts as $post)

            <livewire:post-card :post="$post"/>

        @endforeach
    @endif
</div>
