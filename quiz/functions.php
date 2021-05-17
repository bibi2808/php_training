<?php
function createQuestion($fileQuestion = 'data/question.txt', $fileOption = 'data/options.txt')
{
    // GET QUESTION
    $data = file($fileQuestion) or die('Cannot read file');
    array_shift($data);

    $arrQuestion = array();
    foreach ($data as $key => $value) {
        $tmp = explode('|', $value);
        $arrQuestion[$tmp[0]] = array("id" => $tmp[0], "question" => $tmp[1], "answer" => 'option-' . trim($tmp[2]));
    }

    // GET ANSWERS FOR EACH QUESTION
    $data = file($fileOption) or die('Cannot read file');

    array_shift($data);

    foreach ($data as $key => $value) {
        $tmp = explode('|', $value);
        $arrQuestion[$tmp[0]]['option-' . $tmp[1]] = trim($tmp[2]);
    }

    // RANDOM ELEMENTS FROM ARRAY
    shuffle($arrQuestion);
    // từ vị trí 0 lấy 5 ele
    $arrQuestion = array_slice($arrQuestion, 0, 5);

    return $arrQuestion;
}

function createAnswer($idQuestion, $valueRadio, $contentAnswer)
{
    $xhtml = '<div class="radio">
                    <label><input type="radio" name="question-' . $idQuestion . '" value="' . $valueRadio . '">' . $contentAnswer . '</label>
                </div>';

    return $xhtml;
}

function redirect($filename)
{
    if (file_exists($filename)) {
        header("location: $filename");
        exit();
    }
}

function showAnswerCheck($option, $optionUser, $optionCorrect, $contentAnswer)
{

    // 01 User      - True
    // 02 User      - False
    // 03 System    - True
    // 04 System    - False

    $classLabel     = '';
    $spanContent    = '';

    if ($option == $optionUser) {
        $classLabel        = 'label label-default';
        if ($optionUser == $optionCorrect) {
            $spanContent    = '&nbsp;<span class="glyphicon glyphicon-ok"></span>';
        } else {
            $spanContent    = '&nbsp;<span class="glyphicon glyphicon-remove"></span>';
        }
    } else {
        if ($option == $optionCorrect) {
            $classLabel        = 'label label-success';
        } else {
            $classLabel        = '';
        }
    }

    $xhtml = '<div class="radio">
						<label class="' . $classLabel . '"><input type="radio" name="radio" value="option" disabled="disabled">' . $contentAnswer . '</label>
						' . $spanContent . '
					</div>';

    return $xhtml;
}
