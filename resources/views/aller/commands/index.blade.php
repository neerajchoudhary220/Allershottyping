@extends('aller.layout.master')
@section('content')
    <div class="page-header">
        <h3 class="page-title">Commands </h3>
    </div>

    <div class="row">
        <div class="col-xl">
            <div class="card p-2">
                <div class="custom-loader d-none" id="loader"></div>

                <div class="card-title d-flex justify-content-end">
                    <button class="btn btn-md btn-info round-10" id="AddNewBtn">Add New
                        +</button>
                </div>
                <div class="card-body table-responsive text-nowrap mt-3">
                    <table class="table table-striped table-hover w-100" id="dt-table">
                        <thead>
                            <tr class="text-nowrap">
                                <td>#</td>
                                <td>Name</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="techniqueModal" data-keyboard="false" data-backdrop="static">
        <input type="hidden" id="updateurl">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center p-2">
                    <h4 id="modalTitle" class="mr-auto">Create</h4>
                    <i class="fa fa-times text-danger role-btn" data-dismiss="modal" aria-label="Close"></i>
                </div>

                <div class="modal-body">

                    <form id="modalForm">
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="technique">Name:</label>
                                <input type="text" name="name" id="technique" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="command">Description:</label>
                                <textarea class="form-control" cols="10" rows="10" name="description" id="command"></textarea>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-right p-3">
                                <button class="btn btn-info btn-sm" id="modalSaveBtn">Save</button>
                                <button class="btn btn-warning btn-sm" id="modalUpdateBtn">Update</button>

                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    @push('internal-js')
        <script>
            const uRL = `{{ route('aller.technique.list') }}`;
            const techniqueCreate = `{{route('aller.create')}}`;
        </script>
        <script src="{{ asset('assets/js/databl/commands-dt.js') }}"></script>
    @endpush
@endsection
