@csrf
<div class="form-group">
    <label for="question-title">Title</label>
    <input type="text" name="title" id="question-title" 
        value="{{old('title', $question->title)}}"
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
        class="form-control {{$errors->getBag('default')->has('body') ? 'is-invalid' : ''}}">{{old('body', $question->body)}}</textarea>
    @if ($errors->getBag('default')->has('body'))
    <div class="invalid-feedback">
        <p>{{$errors->getBag('default')->first('body')}}</p>
    </div>
    @endif
</div>
<div class="form-group">
    <button type="submit" class="btn btn-outline-primary btn-lg">{{$buttonText}}</button>
</div>