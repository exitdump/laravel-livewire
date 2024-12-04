<div>
    @if ($posts)
        @foreach ($posts as $post)
            {{-- <x-barta.post-card post="{{$post}}" />           --}}
            <livewire:post-card :post="$post" name="Jahid Hasan" />

        @endforeach
    @endif
</div>
