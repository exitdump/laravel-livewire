<div>
    @if ($posts)
        @foreach ($posts as $post)
            <x-barta.post-card name="{{ $post->user->name }}" username='user_{{$post->user_id}}' content="{{ $post->content }}" time_ago="{{ $post->time_ago }}" />
               
        @endforeach
    @endif
</div>
