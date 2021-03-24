@extends('layouts.app')
@section('title', 'Create Personal Data Sheet')
@section('content')
    <div>
    <label class="switch">
    <input type="checkbox" checked>
    <span class="slider round"></span>
</label>
    </div>
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Employee ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>2</td>
                    <td>2</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>3</td>
                    <td>3</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
            <div class="col-3 mr-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>3</td>
                        </tr>
                    </tbody>
                </table>
            </div> 
                <div class="col-8 jumbotron">
                    
                </div>
    </div>
@push('page-scripts')
@endpush
@endsection
