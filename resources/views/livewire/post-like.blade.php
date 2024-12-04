<div>
    <button wire:click="toggleLike">
        @if ($post->isLikedBy(auth()->user()))
            ❤️ 
        @else
            🤍
        @endif
    </button>
    <span>{{ $post->likes->count() }} {{ Str::plural('Like', $post->likes->count()) }}</span>
</div>


