<x-panel.admin-master>

    @if(session()->has('post_created'))
    <div class="alert alert-success"> {{session('post_created')}}</div>
    @elseif(session()->has('post_deleted'))
    <div class="alert alert-danger">{{session('post_deleted')}}</div>
    @elseif(session()->has('post_updated'))
    <div class="alert alert-success">{{session('post_updated')}}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>Title</td>
                            <td>Author First Name</td>
                            <td>Last Name</td>
                            <td>Content</td>
                            <td>Post Image</td>
                            <td>Date</td>
                            <td>Status</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td>Title</td>
                            <td>Author First Name</td>
                            <td>Last Name</td>
                            <td>Content</td>
                            <td>Post Image</td>
                            <td>Date</td>
                            <td>Status</td>
                            <td>Delete</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($posts as $post)

                        <tr>
                            <td><a href="{{route('editPost', $post->id)}}">{{$post->title}}</a></td>
                            <td>{{$post->author_first_name}}</td>
                            <td>{{$post->author_last_name}}</td>
                            <td>{{$post->content}}</td>
                            <td><img src="{{$post->file_path}}" height="60" alt=""></td>
                            <td>{{$post->p_date}}</td>
                            <td>{{$post->p_status}}</td>
                            <td>
                                <!-- Only authorized users can see the delete button 
                                'Only the owner of the post can delete it ' -->

                                <form action="{{route('destroyPost', $post->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit" name="submit">Delete</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @section('scripts')

    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>


    @endsection

</x-panel.admin-master>