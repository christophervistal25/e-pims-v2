@extends('layouts.app')
@section('title', 'Personnel 201 File')
@prepend('page-css')
<link rel="stylesheet" href="/assets/css/style.css" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css"
    integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .required:after {
        content: ' *';
        color: red;
    }

    .hoverable:hover {
        background: #F2F3F6;
        transition: 200ms all ease-in;
    }

    .cursor-pointer {
        cursor: pointer;
    }

</style>
@endprepend
@section('content')

<div class="row">
    <div class="col-lg-12 {{ Session::has('success') ?: 'd-none' }}">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="col-lg-3 card rounded-0 shadow-none border-right-0 ">
        <div class="card-header">
            <h4 class='text-uppercase'>
                Files
                <button class='float-right btn btn-primary rounded-circle shadow btn-sm mb-2' id='btnAddNewFile'>
                    <i class='la la-plus'></i>
                </button>
            </h4>
        </div>
        <div class="card-body p-0">
            <table class='table table-hover' id='tablePersonnelFile' width="100%">
            </table>
        </div>
    </div>

    <div class="col-lg-9 card rounded-0 shadow-none border-left" id="employeesTableSection">
        <div class="card-header p-0">
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class='fa fa-search'></i>
                    </span>
                </div>
                <input type="text" class="form-control" placeholder="Search employee" aria-label="Search Employee"
                    id="searchEmployee" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="card-body p-0 m-0">
            <table class='table table-bordered table-hover' id="employeesTable" width="100%">
                <thead class='table table-bordered'>
                    <th>Profile</th>
                    <th>Fullname</th>
                    <th>Actions</th>
                </thead>
            </table>
        </div>
    </div>

    <div class="col-lg-9 card rounded-0 shadow-none d-none" id="addFileSection"
        data-has-old-values="{{ count(old('attachments') ?? []) }}">
        <div class="card-header d-flex justify-content-start align-items-center align-middle">
            <button id='btnBack' class='btn btn-sm text-white btn-warning rounded-circle mr-3 shadow'>
                {{-- add right arrow icon --}}
                <i class='la la-arrow-left'></i>
            </button>
            <h4 class='text-uppercase' id='addFileSectionTitle'>
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ route('employee.personnel-file.store', 0) }}" id="formAddFile" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row" id='add-file-dynamic-content'>
                    @if(count(old('attachments') ?? []) > 0)
                    @foreach(old('attachments') as $key => $attachment)
                    <div class='border col-lg-12 row mt-3' data-parent='{{ old('names.' . $key) }}'>
                        <div class='col-lg-12 text-right float-right p-0 m-0'>
                            <button class='btn btn-danger btn-sm btn-remove-attachment shadow'
                                data-file-type="{{ old('names.' . $key) }}">
                                <i class="las la-minus"></i>
                            </button>
                        </div>
                        <div class="col-lg-4 mb-0">
                            <div class="form-group mb-0">
                                <label>Name</label>
                                <input type="text" name="names[]" class='form-control'
                                    value="{{ old('names.' . $key) }}" readonly>
                                <input type="text" name="ids[]" class='form-control'
                                    value="{{ old('ids.' . $key) }}" readonly>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-0">
                            <div class="form-group mb-0">
                                <label>Date</label>
                                <input type="date" name="dates[]" class='form-control'
                                    value="{{ date('Y-m-d')  ?? old('dates.' . $key )}}">
                            </div>
                        </div>

                        <div class="col-lg-4 mt-0">
                            <div class="form-group mt-0">
                                <label>Attachment</label>
                                <input type="file" name="attachments[]" class='form-control'>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <br>

                <div class="float-right">
                    <div class="form-group mt-3">
                        <button type="submit" class='btn btn-primary text-white'>Submit Attachments</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>



<div class="modal fade" id="modalViewFile" tabindex="-1" role="dialog" aria-labelledby="modalViewFile"
    aria-hidden="true">
     <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalViewFileTitle">View File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                    <div class="text-center" id='no-available-files'>
                        <i class="fa fa-file-pdf-o fa-5x"></i>
                        <h5 class="mt-3 text-danger">No files found</h5>
                    </div>
                <div class="row" id='files-content'>
                    <div class="col-sm-12">
                        <div class="file-cont-wrap">
                            <div class="file-cont-inner">
                                <div class="file-content col-lg-12">
                                    <div class="file-body">
                                        <div class="file-scroll">
                                            <div class="file-content-inner">
                                                <div class="row row-sm" id='dynamic-content-of-files'>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> 
    </div>




    <div class="modal fade" id="modalAddNewFile" tabindex="-1" role="dialog" aria-labelledby="modalAddNewFile"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddNewFile">Add New File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id='formAddNewFile' action="" method="POST">
                        <div class="form-group">
                            <label for="file">File name: </label>
                            <input type="text" name="file" id="file" class='form-control'>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary text-white" id='btnSubmitNewFile'>Save</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalEditFile" role="dialog" aria-labelledby="modalEditFile"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditFile">Edit File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id='formEditFile' action="" method="POST">
                        <div class="form-group">
                            <label for="file">File name: </label>
                            <input type="text" name="edit_file" id="edit_file" class='form-control text-uppercase'>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success text-white" id='btnUpdateFile'>Update</button>
                </div>
            </div>
        </div>
    </div>

    @push('page-scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    <script src="/assets/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hashids/2.2.10/hashids.min.js"
        integrity="sha512-c2uJyl0yoZaILXV5QC5s78uT8gQrd0MbmH3t1fXZ7j/2WfC+KJwglzdjVaYVJtfG9k3NTokOR016aP13vWwiiw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"
        integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('/assets/js/custom/personnel-files.js') }}"></script>
    @endpush
    @endsection
