<?php

$a = App\Models\Option::whereIn('option_id', [1,5,9,13,17,21,25,29,33,37,41,45,49,53,57])->get();

$scores = ['frontend'=>0,'backend'=>0,'uiux'=>0,'data'=>0,'ai'=>0,'cyber'=>0];

foreach ($a as $opt) {
    foreach ($opt->scores as $track => $val) {
        $scores[$track] += $val;
    }
}

arsort($scores);

dd($scores);