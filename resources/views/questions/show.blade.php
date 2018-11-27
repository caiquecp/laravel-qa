@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h1>{{$question->title}}</h2>
                        <div class="ml-auto">
                            <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">
                                Back to all questions
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p>{!! $question->body_html !!}</p>
                    <h3>Answers</h3>
                    @foreach ($question->answers as $answer)
                    <hr/>
                    <div>
                        <p>{!! $answer->body_html !!}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
