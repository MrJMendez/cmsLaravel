<x-panel.admin-master>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Email</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>

                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Email</td>
                            <td>Delete</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($users as $user)

                        <tr>

                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <form action="" method="post">
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