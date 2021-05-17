<?php
function createQuestion($questionFile = 'data/question.txt', $answerFile = 'data/options.txt'){

    // GET QUESTIONS
    $data = file($questionFile) or die("cannot read file");
    array_shift($data);

    $arrayQuestion = array();
    foreach($data as $key => $value){
        $tmp = explode("|", $value);
        $id = $tmp[0];
        $question = $tmp[1];
        $answer = $tmp[2];
        $arrayQuestion[$id] = array('id' => $id,'question' => $question, 'answer' => 'option-' . trim($answer));
        
    }

    // GET ANSWERS FOR EACH QUESTION
    $data = file($answerFile) or die("cannot read file");
    array_shift($data);

    foreach($data as $key => $value){
        $tmp = explode("|", $value);
        $arrayQuestion[$tmp[0]]['option-' . $tmp[1]] = trim($tmp[2]);
    }

    shuffle($arrayQuestion);
    $arrayQuestion = array_slice($arrayQuestion, 0, 5);

    return $arrayQuestion;
}

function createAnswer($nameRadio, $valueRadio, $contentRadio){
    $xhtml = '<div class="radio">
                <label><input type="radio" name="'.$nameRadio.'" value="'.$valueRadio.'" >'.$contentRadio.'</label>
            </div>';
    return $xhtml;
}

