@extends('admin_dashboard.layouts.master')
@section('title','manage categories')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h4 class="card-header">Categories</h4>
                        <div class="card-body">
                            <!-- form start -->
                            <form
                                action=" @if($update === true){{ route('category.update',$category->id) }} @else {{ route('category.add') }} @endif"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="category_id" value="">
                                <div class="form-group">
                                    <!-- to add id throw url  -->
                                    <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                    <input id="cc-pament" name="name" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false"
                                        value=" @if($update==true){{   $category->name  }} @endif">
                                </div>
                                <div class="form-group">
                                    <label class="labels">Upload image</label>
                                    <input type="file" class="form-control" placeholder="Image" value="" type="file"
                                        name="image">
                                </div>
                                <div class="form-group">
                                    @if ($update === false)
                                    <button type="submit" class="btn btn-lg btn-info btn-block forms-button  float-right " name="add_category">
                                        <i class="fa fa-plus"></i>&nbsp;
                                        <span id="payment-button-amount">Add to Category</span>
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
                                    <th>Category name</th>
                                    <th>Category Image</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        {{$category->id }}
                                    </td>
                                    <td>
                                        <div class="table-data__info">
                                            {{$category->name }}
                                        </div>
                                    </td>
                                    <td>
                                     <img src="{{asset($category->image) }}" width="150px" alt="">
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ route('category.edit',$category->id)}}" class="item"
                                                data-toggle="tooltip" data-placement="top" name="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a href="{{ route('category.delete',$category->id)}}" class="item"
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
