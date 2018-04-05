@extends('layouts.master')

@section('title')
    Create
@endsection

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col'>

                <!-- Input text area -->

                <form method='POST' action='create'>
                    {{ csrf_field() }}

                    <div class="form-group">
                        <br>
                        <textarea class="form-control"
                                  name='inputTextArea' id='inputTextArea'
                                  rows="16">{{ old('inputTextArea') }}</textarea>
                        <p id="passwordHelpBlock" class="form-text text-muted">
                            Paste in any text that contains letters and numbers that is under 500 words.
                        </p>
                    </div>
                    <label>
                        <input type='checkbox' name='alphabeticalCheck' value='1'>
                        Alphabetical
                    </label>
                    <div class="form-check">
                        <input class="form-check-input"
                               type="radio"
                               name="numberOfWords"
                               value="10"
                               checked>
                        <label class="form-check-label">
                            10 most important words
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="numberOfWords" value="25">
                        <label class="form-check-label">
                            25 most important words
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input"
                               type="radio"
                               name="numberOfWords"
                               value="50">
                        <label class="form-check-label">
                            50 most important words
                        </label>
                    </div>
                    <br>
                    <div class='form-group'>
                        <button type="submit" class="btn btn-primary">Go!</button>
                    </div>
                </form>

            </div>

            <!-- Output text area -->

            <div class='col'>
                <br>
                <div class="container">
                @if(isset($inputText))
                    {{ $inputText }}
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection