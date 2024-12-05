<div>
    @forelse ( $posts as $post )
        <livewire:post-card :post="$post" />
    @empty
        <h1>You have no post</h1>
    @endforelse
</div>
