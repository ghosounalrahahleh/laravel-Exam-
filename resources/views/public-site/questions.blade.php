@extends('public-site.layouts.master')
@section('title','{{ $question->exam->title }}')
@section('content')


<div class="quiz_box">

    <header>
        <h2 class="mt-4 ">
            <strong>{{ $questions[0]->exam->title }}</strong>
        </h2>
    </header>
    <section class="questions-section">
        <form action="{{ route('results.store') }}" method="post">
            @csrf
            <div class="container question">
                @for ($i = 0; $i < count($questions); $i++) <div class="row pb-5 px-5">
                    {{ $i +1 }}) {{ $questions[$i]->text }}<br>
                    @foreach ($questions[$i]->answers as $answer)
                    <div class="form-check fontSize">
                        <input class="form-check-input" type="radio" name="{{ $answer->question->id}}"
                            id="answer-{{ $answer->id }}" value="{{ $answer->answer }}" required>
                        <label for="answer-{{ $answer->id }}">
                            {{ $answer->answer }}
                        </label>
                    </div>
                    @endforeach
            </div>
            @endfor
</div>
<div class="divNext">
    <div>Total Question {{ $total_q }}</div>
    <input class=" next-btn fontSize float-right" type="submit" value="Submit">
</div>
</form>
</section>
</div>


@endsection
