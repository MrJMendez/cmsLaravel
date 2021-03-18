<x-front.home-master>

    @foreach($posts as $post)
    <x-front.post>
        <x-slot name="postId">
            {{$post->id}}
        </x-slot>
        <x-slot name="title">
            {{$post->title}}
        </x-slot>
        <x-slot name="content">
            {{$post->content}}
        </x-slot>
        <x-slot name="filePath">
            {{$post->file_path}}
        </x-slot>
        <x-slot name="authorFirstName">
            {{$post->author_first_name}}
        </x-slot>
        <x-slot name="authorLastName">
            {{$post->author_last_name}}
        </x-slot>
        <x-slot name="pDate">
            {{$post->p_date}}
        </x-slot>

    </x-front.post>
    @endforeach

</x-front.home-master>