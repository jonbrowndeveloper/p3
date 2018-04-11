<?php

namespace App\Http\Controllers;

use App\Classes\TextBody;

use Illuminate\Http\Request;
use Log;

class WordCloudController extends Controller
{

    public function create()
    {
        return view('wordcloud.create');
    }

    public function createWordCloud(Request $request)
    {
        # Extract data from the request
        $inputText = $request->input('inputTextArea');

        $this->validate($request,
        [
            'inputTextArea' => 'required',
        ]);

        // for display use
        // the in-line blade syntax does not seem to be working in the display file.
        // therefore I put the logic for the radial buttons and check box here

        $numberOfWords = $request->input('numberOfWords');

        // three variables for the different number of words options

        $numberOfWords10 = '';
        $numberOfWords25 = '';
        $numberOfWords50 = '';

        // for adding in a html break to make the word cloud more cloud like

        $breakMultiple = 0;

        if ($numberOfWords == '10') {
            $breakMultiple = 4;
            $numberOfWords10 = 'checked';
        } else if ($numberOfWords == '25') {
            $breakMultiple = 5;
            $numberOfWords25 = 'checked';
        } else if ($numberOfWords == '50') {
            $breakMultiple = 7;
            $numberOfWords50 = 'checked';
        }

        $alphabetical = $request->input('alphabeticalCheck');

        $alphabeticalChecked = '';

        if ($alphabetical == '1')
        {
            $alphabeticalChecked = 'checked';
        }

        // Strip punctuation

        $inputText = preg_replace('/[[:punct:]]/', '', $inputText);

        # Text Body logic

        $textBody = new TextBody($inputText, $alphabetical);

        $importanceArray = [];

        // going through each unique word and counting how many times it occurs in the main word set

        foreach ($textBody->uniqueWords as $words => $uniqueWord) {
            foreach ($textBody->textArray as $inputWords => $inputWord) {
                if ($inputWord == $uniqueWord) {
                    if (!isset($importanceArray[0])) {
                        $importanceArray[0] = [];
                    }

                    if (!isset($importanceArray[$words]['word'])) {
                        $importanceArray[$words]['word'] = $uniqueWord;
                    }

                    if (!isset($importanceArray[$words]['number'])) {
                        $importanceArray[$words]['number'] = 1;
                    } else {
                        $importanceArray[$words]['number']++;
                    }
                }
            }
        }

        usort($importanceArray, ["App\Http\Controllers\Controller", "numberCompare"]);

        // set number of important words to user defined number

        if (count($importanceArray) > $numberOfWords) {
            $importanceArray = array_slice($importanceArray, 0, $numberOfWords);
        }

        // create final array based off of the number of words chosen by the user and the importance of each word

        $uniqueArrayFinal = [];

        $fontModifier = 1;

        if (count($textBody->textArray) < 50) {
            $fontModifier = 4;
        } else if (count($textBody->textArray) < 200) {
            $fontModifier = 3;
        } else if (count($textBody->textArray) < 500) {
            $fontModifier = 2;
        }

        foreach ($textBody->uniqueWords as $uniqueWordsFE => $uniqueWordFE) {
            foreach ($importanceArray as $importantWordsFE => $importantWordFE) {
                if ($uniqueWordFE == $importanceArray[$importantWordsFE]['word']) {
                    if (!isset($uniqueArrayFinal[$importantWordsFE]['word'])) {
                        $uniqueArrayFinal[$importantWordsFE]['word'] = $importanceArray[$importantWordsFE]['word'];
                    }
                    if (!isset($uniqueArrayFinal[$importantWordsFE]['number'])) {
                        $uniqueArrayFinal[$importantWordsFE]['fontSize'] = (($importanceArray[$importantWordsFE]['number'] * $fontModifier) + 12);
                    }
                }
            }
        }
        // sort alphabetically if needed

        if ($alphabetical) {
            usort($uniqueArrayFinal, ["App\Http\Controllers\Controller", "stringCompare"]);
        }

        // Log::info('Add the text ' . $inputText);

        return view('wordcloud.create')->with([
            'inputText' => $inputText,
            'numberOfWords' => $numberOfWords,
            'alphabetical' => $alphabetical,
            'numberOfWords10' => $numberOfWords10,
            'numberOfWords25' => $numberOfWords25,
            'numberOfWords50' => $numberOfWords50,
            'alphabeticalChecked' => $alphabeticalChecked,
            'uniqueArrayFinal' => $uniqueArrayFinal,
            'breakMultiple' => $breakMultiple,
        ]);
    }
}
