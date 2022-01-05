@extends('public-site.layouts.master')
@section('title','Catrgories')
@section('content')

<!-- Result Pages -->

<div id="particles-js"> </div>
<section class="resultContainer">
  

    <h2 class="text-white my-5">
        @if ((($mark) >= $exam_score/2) )
        Wow! You are brilliant {{ auth()->user()->name }}!
        @else
        OOP! Good Luck {{ auth()->user()->name }}!
        @endif
    </h2>
    <h3 class=" text-white my-5">{{ $mark }} / {{ $exam_score}} </h3>

    <table class="table bg-white rounded  ">
        <thead>
            <tr>
                <th scope="col">Question </th>
                <th scope="col">Your Answer</th>
                <th scope="col">Coreect Answer</th>
            </tr>
        </thead>
        <tbody class="">
            @for ($i = 0 ; $i < count($questions) ;$i++) <tr>
                {{-- //@dd( $questions[$i]->text) --}}
                <td class=" p-3"> <h5><strong> {{ $questions[$i]->text }}</strong></h5></td>
                @if ($uanswers[$i]->user_answer === $answers[$i]->answer)
                <td class="text-success p-3">
                    <h5><strong>{{ $uanswers[$i]->user_answer }}
                    </td></strong></h5>
                </td>
                @else

                <td class="text-danger p-3">
                    <h5><strong>{{ $uanswers[$i]->user_answer }}
                    </strong></h5>
                </td>
                @endif
                <td class=" p-3">
                    @foreach ($answers as $answer)
                    @if ($answer->question_id === $questions[$i]->id)
                    @if ($answer->correct === 1)
                   <h5>{{ $answer->answer }}</h5>
                    @endif
                    @endif
                    @endforeach
                </td>
                </tr>
                @endfor

        </tbody>
    </table>

    <div class="finshBtnsContainer">
        <a class="btn BackToCourseBtn p-2 mt-3" href="{{ route('categories.index') }}"><strong>Back to Exams</strong> </a>

    </div>


    {{-- model --}}

</section>

@endsection
