@extends('admin_dashboard.layouts.master')
@section('title','manage categories')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h4 class="card-header">Roles</h4>
                        <div class="card-body">
                            <!-- form start -->
                            <form
                                action=" @if($update === true){{ route('role.update',$role->id) }} @else {{ route('role.add') }} @endif"
                                method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <!-- to add id throw url  -->
                                    <label for="cc-payment" class="control-label mb-1">Role</label>
                                    <input id="cc-pament" name="role" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false"
                                        value=" @if($update==true){{   $role->role  }} @endif">
                                </div>

                                <div class="form-group">
                                    @if ($update === false)
                                    <button type="submit" class="btn btn-lg btn-info btn-block forms-button  float-right " name="add_category">
                                        <i class="fa fa-plus"></i>&nbsp;
                                        <span id="payment-button-amount">Add to Roles</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
                                    @else
                                    <button type="submit" class="btn btn-lg btn-info btn-block forms-button float-right" name="update">
                                        <span id="payment-button-amount">update</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
                                    @endif
                                </div>
                            </form>
                            <!-- form end-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <!-- USER DATA-->

                    <div class="table-responsive table-borderless table-data3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>
                                        {{$role->id }}
                                    </td>
                                    <td>
                                        <div class="table-data__info">
                                            {{$role->role }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ route('role.edit',$role->id)}}" class="item"
                                                data-toggle="tooltip" data-placement="top" name="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a href="{{ route('role.delete',$role->id)}}" class="item"
                                                data-toggle="tooltip" data-placement="top" name="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>

                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <!-- END USER DATA-->
                </div>

            </div>
        </div>
    </div>
    @endsection
