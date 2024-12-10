<div>
    @if ($posts)
        @foreach ($posts as $post)
            <livewire:post-card :post="$post" :key="$post->id" />
        @endforeach
    @endif
</div>
