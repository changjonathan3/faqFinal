@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Question
                        <small class="text-muted">
                            Votes: {{$question->votes}}
                        </small>
                    </div>
                    <div class="card">

                    </div>

                    <div class="card-body">

                        {{$question->body}}
                    </div>
                    <div class="card-footer">
                        {{ Form::open(['method'  => 'patch', 'route' => ['questions.downvote', $question->id]])}}
                        <button class="btn btn-dark float-right" value="submit" type="submit" id="submit">Downvote
                        </button>
                        {!! Form::close() !!}

                        {{ Form::open(['method'  => 'patch', 'route' => ['questions.upvote', $question->id]])}}
                        <button class="btn btn-success float-right" value="submit" type="submit" id="submit">Upvote
                        </button>
                        {!! Form::close() !!}

                        <a class="btn btn-primary float-right"
                           href="{{ route('questions.edit',['id'=> $question->id])}}">
                            Edit Question
                        </a>

                        {{ Form::open(['method'  => 'DELETE', 'route' => ['questions.destroy', $question->id]])}}
                        <button class="btn btn-danger float-right mr-2" value="submit" type="submit" id="submit">Delete
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><a class="btn btn-primary float-left"
                                                href="{{ route('answers.create', ['question_id'=> $question->id])}}">
                            Answer Question
                        </a>


                    </div>

                    <div class="card-body">
                        @forelse($question->answers->sortByDesc('votes') as $answer)
                            <div class="card">
                                <div class="card">
                                    <small class="text-muted">
                                        Votes: {{$answer->votes}}
                                    </small>
                                </div>
                                <div class="card-body">{{$answer->body}}</div>
                                <div class="card-footer">

                                    <a class="btn btn-primary float-right"
                                       href="{{ route('answers.show', ['question_id'=> $question->id,'answer_id' => $answer->id]) }}">
                                        View
                                    </a>

                                </div>
                            </div>
                        @empty
                            <div class="card">

                                <div class="card-body"> No Answers</div>
                            </div>
                        @endforelse

                    </div>
                    </div>
                </div>
            </div>
        </div>
@endsection