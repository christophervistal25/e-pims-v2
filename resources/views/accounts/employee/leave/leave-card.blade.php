@extends('accounts.employee.layouts.app')
@section('title', 'Your Leave Card')
@prepend('meta-data')
@endprepend
@prepend('page-css')
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
@endprepend
@section('content')
<div class="p-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="welcome-box">
                <div class="welcome-img e-avatar">
                    <img alt="" src="/storage/employee_images/0001_Pimentel.jpg">
                </div>
                <div class="welcome-det">
                    <h3>{{ $employee->fullname }}</h3>
                    <p>{{ $employee->information->office->office_name }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="email-header">
                        <div class="row">
                            <div class="col-auto top-action-right">
                                <div class="text-right">
                                    <button type="button" title="" data-toggle="tooltip"
                                        class="btn btn-white d-none d-md-inline-block" data-original-title="Refresh"><i
                                            class="fa fa-refresh"></i></button>
                                    <div class="btn-group">
                                        <a class="btn btn-white"><i class="fa fa-angle-left"></i></a>
                                        <a class="btn btn-white"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="email-content">
                        <div class="table-responsive">
                            <hr>
                            <table class="table table-inbox table-hover">
                                <tbody>
                                    <tr class="unread clickable-row" data-href="mail-view.html">
                                        <td>
                                            <input type="checkbox" class="checkmail">
                                        </td>
                                        <td><span class="mail-important"><i class="fa fa-star starred"></i></span></td>
                                        <td class="name">John Doe</td>
                                        <td class="subject">Lorem ipsum dolor sit amet, consectetuer adipiscing elit
                                        </td>
                                        <td><i class="fa fa-paperclip"></i></td>
                                        <td class="mail-date">13:14</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
