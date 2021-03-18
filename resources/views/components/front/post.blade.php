@props(['title', 'content', 'filePath', 'postId', 'pDate','authorFirstName', 'authorLastName'])

<div class="card mb-4">
    <img class="card-img-top" src="{{$filePath}}" alt="Card image cap">
    <div class="card-body">
        <h2 class="card-title">{{$title}}</h2>
        <p class="card-text">{{$content}}</p>
        <a href="{{route('showPost', $postId)}}" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
        {{$pDate}} by
        <a href="">{{$authorFirstName." ".$authorLastName}}</a>
    </div>
</div>