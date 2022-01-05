@extends('admin_dashboard.layouts.master')
@section('title','manage questions')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h4 class="card-header">Questions</h4>
                        <div class="card-body">
                            <!-- form start -->
                            <form
                                action="@if($update === true){{ route('question.update',$question->id) }} @else {{ route('question.add') }} @endif"
                                method="post">
                                @csrf
                                <!-- to add id throw url  -->
                                <input type="hidden" name="q_id_hidden" value="">
                                <!--  -->
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Question Text</label>
                                    <input id="cc-pament" name="text" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false"
                                        value="@if($update === true){{$question->text}} @endif">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Question Points</label>
                                    <input id="cc-pament" name="points" type="number" class="form-control"
                                        aria-required="true" aria-invalid="false" min="0"
                                        value="@if( $update === true) {{   $question->points  }} @endif">
                                </div>

                                <div class="form-group">
                                    <select class="form-select w-100 mb-4  p-2" name='exam_title' value="">
                                        @if ($update===true)
                                        <option class='w-100' value='{{ $question->exam->id }}' selected>{{
                                            $question->exam->title }}</option>
                                        @else
                                        <option class='w-100' value=''>Select Exam </option>
                                        @endif
                                        @foreach ($exams as $exam)
                                        <option class='w-100' value='{{ $exam->id }}'>{{ $exam->title }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    @if ($update === false)
                                    <button type="submit"
                                        class="btn btn-lg btn-info btn-block forms-button  float-right "
                                        name="add_category">
                                        <i class="fa fa-plus"></i>&nbsp;
                                        <span id="payment-button-amount">Add to Questions</span>
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
                                    <th>Question Content</th>
                                    <th>Question Points</th>
                                    <th>Exam Title</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)
                                <tr>
                                    <td>
                                        {{$question->id }}
                                    </td>
                                    <td>
                                        <div class="table-data__info">
                                            {{$question->text }}
                                        </div>
                                    </td>
                                    <td>
                                        {{$question->points }}
                                    </td>
                                    <td>
                                        {{$question->exam->title }}
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ route('question.edit',$question->id)}}" class="item"
                                                data-toggle="tooltip" data-placement="top" name="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a href="{{ route('question.delete',$question->id)}}" class="item"
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
