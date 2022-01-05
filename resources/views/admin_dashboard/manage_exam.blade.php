@extends('admin_dashboard.layouts.master')
@section('title','manage exams')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h4 class="card-header">EXAMS</h4>
                        <div class="card-body">
                            <!-- form start -->
                            <form action="@if($update === true){{ route('exam.update',$exam->id) }} @else {{ route('exam.add') }} @endif" method="post">
                                @csrf
                                <!-- to add id throw url  -->
                                <input type="hidden" name="exam_id_hidden" value="">

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Exam Name</label>
                                    <input id="cc-pament" name="title" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="@if($update==true){{   $exam->title  }} @endif">
                                </div>
                                <div class="form-group">
                                    <select class="form-select w-100 mb-4  p-2" name='category_name' value="">
                                        @if ($update===true)
                                        <option class='w-100' value='{{ $exam->category->id }}' selected>{{ $exam->category->name }}</option>
                                        @else
                                        <option class='w-100' value=''>Select exam Category</option>
                                        @endif
                                        @foreach ($categories as $category)
                                        <option class='w-100' value='{{ $category->id }}'>{{ $category->name  }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    @if ($update === false)
                                    <button type="submit"
                                        class="btn btn-lg btn-info btn-block forms-button  float-right "
                                        name="add_category">
                                        <i class="fa fa-plus"></i>&nbsp;
                                        <span id="payment-button-amount">Add to Exams</span>
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
                                    <th>Exam Title</th>
                                    <th>Category Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exams as $exam)
                                <tr>
                                    <td>
                                        {{$exam->id }}
                                    </td>
                                    <td>
                                        <div class="table-data__info">
                                            {{$exam->title }}
                                        </div>
                                    </td>
                                    <td>
                                        {{$exam->category->name }}
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ route('exam.edit',$exam->id)}}" class="item"
                                                data-toggle="tooltip" data-placement="top" name="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a href="{{ route('exam.delete',$exam->id)}}" class="item"
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
