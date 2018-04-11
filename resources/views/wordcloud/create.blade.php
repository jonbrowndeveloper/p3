@extends('layouts.master')

@section('title')
    Create
@endsection

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col'>

                <!-- Input text area -->

                <form method='POST' action='\wordcloud\create'>
                    {{ csrf_field() }}

                    <div class="form-group">
                        <br>
                        <textarea class="form-control"
                                  name='inputTextArea'
                                  id='inputTextArea'
                                  rows="16"
                                  placeholder='Paste or Type your text here...'>@if (isset($inputText)){{ $inputText }}@endif</textarea>
                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <label>
                        <input type='checkbox' name='alphabeticalCheck' value='1' {{ $alphabeticalChecked or '' }}>
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
                        <input class="form-check-input"
                               type="radio"
                               name="numberOfWords"
                               value="25"
                            {{ $numberOfWords25 or '' }}>
                        <label class="form-check-label">
                            25 most important words
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input"
                               type="radio"
                               name="numberOfWords"
                               value="50"
                            {{ $numberOfWords50 or '' }}>
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
                    @if (isset($uniqueArrayFinal))
                        <br>
                        <div class="container">
                            @foreach ($uniqueArrayFinal as $wordsFinals => $wordFinal)
                                <span style='color:black;font-size:{{ $uniqueArrayFinal[$wordsFinals]['fontSize'] }}px'>
                        {{ $uniqueArrayFinal[$wordsFinals]['word'] }}
                                    @if (is_int($wordsFinals/$breakMultiple))
                                        <br>
                                @endif
                            @endforeach
                        </div>
                </div>
                @elseif (!isset($uniqueArrayFinal))
                    <br>
                    <div class="container">
                        Your text will appear here...
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection