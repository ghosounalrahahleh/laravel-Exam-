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
            <tr>
                <th scope="row">
                    {{$result->exam->title }}

                </th>
                <td>
                    {{$result->result }}

                </td>
                <td>
                    {{$result->created_at }}
                </td>
              </tr>
            @endforeach

        </tbody>
      </table>


      <div class="d-flex justify-content-center mt-4">
        {!! $results->links() !!}
      </div>
</section>
@endsection
