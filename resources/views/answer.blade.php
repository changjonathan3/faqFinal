@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Answer
                        <small class="text-muted">
                            Votes: {{$answer->votes}}
                        </small></div>
                    <div class="card-body">
                        {{$answer->body}}
                    </div>
                    <div class="card-footer">
                        {{ Form::open(['method'  => 'patch', 'route' => ['answers.downvote', $question, $answer->id]])}}
                        <button class="btn btn-dark float-right" value="submit" type="submit" id="submit">Downvote
                        </button>
                        {!! Form::close() !!}

                        {{ Form::open(['method'  => 'patch', 'route' => ['answers.upvote', $question, $answer->id]])}}
                        <button class="btn btn-success float-right" value="submit" type="submit" id="submit">Upvote
                        </button>
                        {!! Form::close() !!}

                        {{ Form::open(['method'  => 'DELETE', 'route' => ['answers.destroy', $question, $answer->id]])}}
                        <button class="btn btn-danger float-right mr-2" value="submit" type="submit" id="submit">Delete
                        </button>
                        {!! Form::close() !!}

                        <a class="btn btn-primary float-right" href="{{ route('answers.edit',['question_id'=> $question, 'answer_id'=> $answer->id, ])}}">
                            Edit Answer
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection