<x-panel.admin-master>

    @include("../tinymce")

    <form action="{{route('storePost')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="p_date">Date</label>
            <input type="date" name="p_date" class="form-control">
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <input type="file" name="file_path" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="p_status">Status</label>
            <input type="text" name="p_status" class="form-control">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Create Post</button>

    </form>


</x-panel.admin-master>