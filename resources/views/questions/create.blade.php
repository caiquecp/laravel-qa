@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>New question</h2>
                        <div class="ml-auto">
                            <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">
                                Back to all questions
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('questions.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="question-title">Title</label>
                            <input type="text" name="title" id="question-title" value="{{old('title')}}"
                                class="form-control {{$errors->getBag('default')->has('title') ? 'is-invalid' : ''}}" />
                            @if ($errors->getBag('default')->has('title'))
                            <div class="invalid-feedback">
                                <p>{{$errors->getBag('default')->first('title')}}</p>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="question-body">Body</label>
                            <textarea name="body" id="question-body"
                                class="form-control {{$errors->getBag('default')->has('body') ? 'is-invalid' : ''}}">{{old('body')}}</textarea>
                            @if ($errors->getBag('default')->has('body'))
                            <div class="invalid-feedback">
                                <p>{{$errors->getBag('default')->first('body')}}</p>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg">Post your question</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
