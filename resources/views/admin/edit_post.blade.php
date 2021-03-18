<x-panel.admin-master>

    <form action="{{route('updatePost', $post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{$post->title}}">
        </div>

        <div class="form-group">
            <label for="p_date">Date</label>
            <input type="date" name="p_date" class="form-control" value="{{$post->p_date}}">
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"> {{$post->content}}</textarea>
        </div>

        <div class="form-group">
            <img height="100px" src="{{$post->file_path}}" alt="">
            <input type="file" name="file_path" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="p_status">Status</label>
            <input type="text" name="p_status" class="form-control" value="{{$post->p_status}}">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Update Post</button>

    </form>


</x-panel.admin-master>