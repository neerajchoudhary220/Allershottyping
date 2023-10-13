@extends('aller.layout.master')
@section('content')
    <div class="page-header">
        <h3 class="page-title">{{ $command }}</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('aller.commands') }}">Commands</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $command }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="custom-loader d-none" id="loader"></div>
                <div class="card-body table-responsive text-nowrap mt-3">
                    <table class="table table-striped table-hover w-100" id="dt-table">
                        <thead>
                            <tr class="text-nowrap">
                                <td>#</td>
                                <td>Name</td>
                                <td>Command</td>
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

    <div class="modal fade" id="commandModal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form id="modalForm">
                    <input type="hidden" id="commandId">
                    <div class="modal-title d-flex justify-content-left p-2">
                        <h4 id="modalTitle" class="mr-auto"></h4>
                        <div class="d-flex mr-auto d-none" id="title">
                            <span class="mr-3 d-none" id="titleName">Title:</span>
                            <input type="text" id="titleInput" name="name" class="form-control d-none">
                        </div>
                        <i class="fa fa-times text-danger role-btn" data-dismiss="modal" aria-label="Close"></i>
                    </div>
                    <div class="modal-body">
                        <hr>
                        <div class="row">
                            <div class="col-12 p-3" id="commandData">
                            </div>
                            <textarea class="form-control d-none" name="command" id="command"></textarea>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 text-right p-3">
                            <button class="btn btn-info btn-sm d-none"  id="modalUpdateBtn">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>





    @push('internal-js')
        <script>
            const uRL = `{{ route('aller.commandlist', $id) }}`;
            let updateUrl = `{{route('aller.comandlist.update','id')}}`;
        </script>
        <script src="{{ asset('assets/js/databl/commandlist-dt.js') }}"></script>
    @endpush
@endsection
