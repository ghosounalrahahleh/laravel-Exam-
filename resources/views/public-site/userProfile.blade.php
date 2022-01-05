@extends('public-site.layouts.master')
@section('title','User Profile')
@section('content')

<section class="ftco-section  ">
<div id="particles-js"> </div>
   
    <table class="table w-50 m-auto mt-5 bg-white">
        <thead>
          <tr>
            <th scope="col">Exam Name</th>
            <th scope="col">Your Result</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($results as $result)
            @foreach ($exams as $exam)
            @if ($exam->id ===  $result->exam_id)
            <tr>
                <th scope="row">
                    {{$exam->title }}

                </th>
                <td>
                    {{$result->result }}

                </td>
                <td>
                    {{$result->created_at }}
                </td>


              </tr>

             @endif
            @endforeach
            @endforeach

        </tbody>
      </table>


    {{-- <div class="container mb-2 mt-5 border" style="text-align: center;">
        <div class="row mb-2 pb-2 ">
            <div class="container ">
                <div class="row align-items-center flex-row-reverse ">
                    <div class="col-lg-8">
                        <div class="about-text go-to">
                            <h3 class="dark-color pt-4" style="text-align:start">{{ Auth::user()->name }}</h3>
                            <h6 class="theme-color lead" style="text-align:start ; font-weight: 400">Enjoy your
                                experience at Afdalcomp</h6>
                            <p style="text-align:start ; font-weight: 400">The website is the portal to what ever you
                                would like to browse from any company</p>
                            <div class="row about-list">
                                <div class="col-md-2">
                                    <div class="media">
                                        <label
                                            style="text-align:start; color:#233e62; font-weight: 600 ">E-mail:</label>

                                    </div>
                                    <div class="media">
                                        <label style="text-align:start; color:#233e62; font-weight: 600 ">Phone:</label>

                                    </div>

                                    <div class="media">
                                        <label
                                            style="text-align:start ; color:#233e62; font-weight: 600">Address:</label>

                                    </div>
                                    <div class="media">
                                        <label style="text-align:start; color:#233e62; font-weight: 600 ">Work@:</label>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="media">

                                        <label style="text-align:end">{{ Auth::user()->email }}</label>
                                    </div>

                                    <div class="media">

                                        <label>077-885-3321</label>
                                    </div>
                                    <div class="media">

                                        <label>Jordan</label>
                                    </div>
                                    <div class="media">

                                        <label>Orange</label>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="">
                            <a href="{{ route("users.edit",Auth::user()->id) }}" ><button type="button"
                                    class="btn btn-primary w-25">Edit</button></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="about-avatar">

                            <img class=" mt-5 " style="width:200px; border-radius:10%;"
                                src="{{asset( Auth::user()->image ) }}" title="" alt="User picture">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</section>
@endsection
