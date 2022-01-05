@extends('public-site.layouts.master')
@section('title','Exams')
@section('content')
<!-----------------------------choice quis start------------------------------>

<section class="ftco-section text-white  ">

    <div class="container ">
        <hr class="mb-5 mt-0">
        {{-- title dive --}}
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8  heading-section ftco-animate">
                <h3 class="mb-2 tetx-white"><span>All</span> Exams</h3>
                {{--<p>Separated they live in. A small river named Duden flows by their place
                    and supplies it with the necessary regelialia. It is a paradisematic country</p> --}}
                <div class="page_link">
                    <a href="/">Home</a>
                    <a href="{{ route('categories.index') }}">/ Categories</a>
                    <a href="">/ Exams</a>
                </div>
            </div>

        </div>
        <div class="row">

            {{-- start aside div - top categories --}}
            <div class="col-lg-2" style="border-right: solid .5px rgb(194, 194, 194)">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div>
                            <h5 class=""><strong>Top Categories</strong></h5>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                @foreach ($categories as $category)
                                <li class="category-title">
                                    <a href="{{  route('categories.show',$category->id) }}">
                                        {{ $category->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
            {{-- End aside div --}}

            {{-- main content --}}
            <div class="col-10 d-flex justify-content-start flex-wrap gap-5 m-auto">
                @foreach ($exams as $exam)
                <div class="col-md-4 col-sm-8 mb-2  card-main" style="max-width: fit-content; overflow:hidden">
                    <div class="card" style="width: 18rem; ">
                        <div class="card-body">
                            <h3 class="card-title"> <strong>{{ $exam->title }}</strong> </h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae non tempore quod
                                voluptate repellat
                                animi laudantium minima similique culpa. </p>

                            @if(!empty(Auth::user()))
                            <a href="{{ route('questions.show',$exam->id) }}" class="btn button">Start Quiz </a>

                            @else
                            <a href="{{ route('login') }}" class="btn button">Start Quiz </a>

                            @endif


                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{-- end main content --}}
        {{-- pagination part --}}
        <div style="justify-content: center; margin-left:50%;margin-top:5%;margin-bottom:2%">
            {!! $exams->links() !!}
        </div>
        {{-- end pagination part --}}
    </div>
    </div>

</section>









@endsection
