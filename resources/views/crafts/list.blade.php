@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">اضافة مهنة جديدة</h6>
                <a class="btn btn-primary" href="{{ route('crafts.add') }}" role="button">Add</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr> 
                                <th scope=”col”></th>
                                <th>craft_name</th>
                                <th>image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($crafts as $craft)
                                <tr>
                                    <th scope="col"></th>
                                    <td>{{ $craft->craft_name }}</td>
                                    <td>{{ $craft->image }}</td>
                                    <td><a class="btn btn-primary" href="{{ route('crafts.edit', $craft->id) }}"
                                        role="button">Edit</a>
                                    </td>
                                
                                    <td>
                                        <a href="#" data-id="{{ $craft->id }}" class="btn btn-danger delete"
                                        data-toggle="modal" data-target="#deleteModal">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Warning Modal -->
    <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete craft</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('crafts.destroy') }}" method="post">
                        @csrf
                        <input id="id" name="id" hidden>
                        <h5 class="text-center">Are you sure you want to delete this craft?</h5>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-danger">Yes, Delete craft</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal -->
@endsection
@push('js')
    <script>
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            let id = e.target.dataset.id;
            // let inputId = document.querySelector('#id');
            $('#id').val(id);
            console.log(id)
        });
    </script>
@endpush

