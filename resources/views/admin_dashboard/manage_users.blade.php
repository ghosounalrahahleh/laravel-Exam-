@extends('admin_dashboard.layouts.master')
@section('title','manage categories')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h4 class="card-header">Users</h4>
                        <div class="card-body card-block">
                            <!-- form start -->
                            <form
                                action=" @if($update === true){{ route('user.update',$user->id) }} @else {{ route('user.add') }} @endif"
                                method="post" class="">
                                @csrf
                                <div class="form-group">
                                    <!-- to add id throw url  -->
                                    <label for="cc-name" class="control-label mb-1">User Name</label>
                                    <input id="cc-name" name="name" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false"
                                        value=" @if($update==true){{   $user->name  }} @endif">
                                </div>

                                <div class="form-group">
                                    <!-- to add id throw url  -->
                                    <label for="cc-email" class="control-label mb-1">Email</label>
                                    <input id="cc-email" name="email" type="email" class="form-control"
                                        aria-required="true" aria-invalid="false"
                                        value=" @if($update==true){{   $user->email  }} @endif">
                                </div>

                                <div class="form-group">
                                    <!-- to add id throw url  -->
                                    <label for="cc-password" class="control-label mb-1">Password</label>
                                    <input id="cc-password" name="password" type="password" class="form-control"
                                        value="@if($update==true){{   $user->password }} @endif">
                                </div>

                                <div class="form-group">
                                    <select class="form-select w-100 mb-4  p-2" name='user_role' value="">
                                        @if ($update===true)
                                        <option class='w-100' value='{{ $user->role->id }}' selected>{{
                                            $user->role->role }}</option>
                                        @else
                                        <option class='w-100' value=''>Select Role </option>
                                        @endif
                                        @foreach ($roles as $role)
                                        <option class='w-100' value='{{ $role->id }}'>{{ $role->role }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">

                                    @if ($update === false)
                                    <button type="submit"
                                        class="btn btn-lg btn-info btn-block forms-button  float-right "
                                        name="add_category">
                                        <i class="fa fa-plus"></i>&nbsp;
                                        <span id="payment-button-amount">Add to Users</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
                                    @else
                                    <button type="submit" class="btn btn-lg btn-info btn-block forms-button float-right"
                                        name="update">
                                        <span id="payment-button-amount">update</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
                                    @endif

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-t-30">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th></th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{$user->id }}
                                    </td>
                                    <td>
                                        {{$user->name }}
                                    </td>
                                    <td>
                                        {{$user->email }}
                                    </td>
                                    <td>
                                        <div class="table-data__info">
                                            {{$user->password}}
                                        </div>
                                    </td>
                                    <td>
                                        {{$user->role->role}}
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ route('user.edit',$user->id)}}" class="item"
                                                data-toggle="tooltip" data-placement="top" name="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a href="{{ route('user.delete',$user->id)}}" class="item"
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
                    <!-- END DATA TABLE-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
