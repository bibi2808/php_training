<?php
    $filename = 'data/question.txt';
    $data = file($filename) or die("cannot read file");

    array_shift($data);
    $arrQuestion = array();
    foreach($data as $key => $value){
        $tmp = explode('|',$value);
        $id = $tmp[0];
        $question = $tmp[1];
        $answer = $tmp[2];

        $arrQuestion[$id] = array('question' => $question, 'answer' => 'option-' . $answer);
        
    }

    $filename = 'data/options.txt';
    $data = file($filename) or die("cannot read file");

    array_shift($data);

    
    foreach($data as $key => $value){
        $tmp = explode('|',$value);
        $arrQuestion[$tmp[0]]['option-' . $tmp[1]] = trim($tmp[2]);
        // echo '<pre>';
        // print_r($tmp);
        // echo '</pre>';
        
    }
    echo '<pre>';
    print_r($arrQuestion);
    echo '</pre>';
?>