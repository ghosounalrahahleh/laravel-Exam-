@extends('admin_dashboard.layouts.master')
@section('title','manage answers')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h4 class="card-header">Answers</h4>
                        <div class="card-body card-block">
                            <!-- form start -->
                            <form
                                action="@if($update === true){{ route('answer.update',$answer->id) }} @else {{ route('answer.add') }} @endif"
                                method="post" class="">
                                @csrf
                                <!--  -->
                                <div class="form-group mb-4">

                                    <label for="cc-payment" class="control-label ">Answer Text</label>
                                    <input id="cc-pament" name="answer" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false"
                                        value="@if($update==true){{   $answer->answer }} @endif">
                                </div>

                                <div class="form-group">
                                    <div class="input-group">

                                            <select class="form-select w-100 mb-4  p-2" name='correct' value="">
                                                @if ($update===true)
                                                <option class='w-100' value='{{ $answer->correct}}' selected>
                                                {{$answer->correct }}</option>
                                                @else
                                                <option class='w-100' value=''>Set the correct answer </option>
                                                <option class='w-100' value='0'>0</option>
                                                <option class='w-100' value='1'>1</option>
                                                @endif


                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <select class="form-select w-100 mb-4  p-2" name='q_title' value="">
                                            @if ($update===true)
                                            <option class='w-100' value='{{ $answer->question->id }}' selected>{{
                                                $answer->question->text }}</option>
                                            @else
                                            <option class='w-100' value=''>Select Question </option>
                                            @endif
                                            @foreach ($questions as $question)
                                            <option class='w-100' value='{{ $question->id }}'>{{ $question->text }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    @if ($update === false)
                                    <button type="submit"
                                        class="btn btn-lg btn-info btn-block forms-button  float-right "
                                        name="add_category">
                                        <i class="fa fa-plus"></i>&nbsp;
                                        <span id="payment-button-amount">Add to Answer</span>
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
                    <div class="table-responsive table-borderless table-data3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Answer Text</th>
                                    <th>Is Correct</th>
                                    <th>Question Text</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($answers as $answer)
                                <tr>
                                    <td>
                                        {{$answer->id }}
                                    </td>
                                    <td>
                                        {{$answer->answer }}
                                    </td>
                                    <td>
                                        <div class="table-data__info">
                                            {{$answer->correct }}
                                        </div>
                                    </td>

                                    <td>
                                        {{$answer->question->text }}
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ route('answer.edit',$answer->id)}}" class="item"
                                                data-toggle="tooltip" data-placement="top" name="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a href="{{ route('answer.delete',$answer->id)}}" class="item"
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
