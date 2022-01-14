@extends('public-site.layouts.master')
@section('title','Catrgories')
@section('content')

<!-- Result Pages -->

<div id="particles-js"> </div>
<section class="resultContainer w-50">


    <h2 class="text-white my-5">
        @if ((($mark) >= $exam_score/2) )
        Wow! You are brilliant {{ auth()->user()->name }}!
        @else
        OOP! Good Luck {{ auth()->user()->name }}!
        @endif
    </h2>
    <h3 class=" text-white my-5">{{ $mark }} / {{ $exam_score}} </h3>

    <table class="table bg-white rounded ">
        <thead>
            <tr>
                <th scope="col">Question </th>
                <th scope="col">Your Answer</th>
                <th scope="col">Coreect Answer</th>
            </tr>
        </thead>
        <tbody class="">
            @for ($i = 0 ; $i < count($questions) ;$i++) <tr>
                <td class=" p-3">
                    <h5> {{ $questions[$i]->text }}</h5>
                </td>
                @foreach ($questions[$i]->answers as $answer)
                @if ($answer->correct === 1)
                @if ($uanswers[$i]->user_answer == $answer->answer)
                <td class="text-success p-3">
                    <h5><strong>{{ $uanswers[$i]->user_answer }}
                </td></strong></h5>
                </td>
                @else
                <td class="p-3 text-danger">
                    <h5><strong>{{ $uanswers[$i]->user_answer }}
                        </strong></h5>
                </td>
                @endif
                <td class=" p-3">
                    <h5>{{ $answer->answer }}</h5>
                </td>
                @endif
                @endforeach
                </tr>
                @endfor
        </tbody>
    </table>
    <div class="finshBtnsContainer">
        <a class="btn BackToCourseBtn p-2 mt-3" href="{{ route('categories.index') }}"><strong>Back to categories</strong>

    </div>
    {{-- model --}}
</section>
@endsection
