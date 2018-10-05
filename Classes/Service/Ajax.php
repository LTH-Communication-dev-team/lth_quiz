<?php
$content;
$action = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('action');
$settings = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('settings');
$sid = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP("sid");

switch($action) {
    case 'listQuiz':
        $content = listQuiz($settings);
        break;
}

print $content;


function listQuiz($settings)
{    
    $syslang = addslashes($settings['syslang']);
    $pageId = intval($settings['pageId']);
    $storagePid = intval($settings['storagePid']);
    if(!$storagePid) $storagePid = $pageId;
    $storagePid = addslashes($storagePid);
    $quizJSON["questions"] = array();
    $questions = array();
    $oldUid;

    $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery("q.uid,q.title AS qTitle,q.description,q.resdescription,qn.title AS qnTitle, "
            . "GROUP_CONCAT(a.title,'|',a.correct SEPARATOR '||') AS answers,GROUP_CONCAT(qn.commentcorrect,'|',qn.commentincorrect SEPARATOR '||') AS answercomments",
            "tx_lthquiz_domain_model_quiz q JOIN tx_lthquiz_domain_model_question qn ON q.uid = qn.quiz JOIN tx_lthquiz_domain_model_answer a ON qn.uid = a.question",
            "q.pid IN($storagePid)","qn.uid","qn.uid","");
    while($row = $GLOBALS["TYPO3_DB"]->sql_fetch_assoc($res)) {
        $qUid = $row['uid'];
        $qTitle = $row['gTitle'];
        $qnTitle = $row['qnTitle'];
        $description = $row['description'];
        $resdescription = $row['resdescription'];
        $answers = $row['answers'];
        $answercomments = $row['answercomments'];
        $tmpArray = array();
        $tmpArray['q'] = $qnTitle;
        $answersArray = explode('||', $answers);
        //$quizJSON["questions"] = array_merge($quizJSON["questions"],$quizJSON["questions"]["q"] = $qnTitle);
        foreach ($answersArray as $key => $answer) {
            $answerArray = explode('|',$answer);
            $tmpArray['a'][] = array('option' => $answerArray[0],'correct' => convertBoolean($answerArray[1]));
        }
        $answercommentsArray = array_shift(explode('||', $answercomments));
        $answercommentsArray = explode('|', $answercommentsArray);
        $tmpArray['correct'] = $answercommentsArray[0];
        $tmpArray['incorrect'] = $answercommentsArray[1];
        $quizJSON["questions"][] = $tmpArray;
    }
    $quizJSON['info']['name'] = $qTitle;
    $quizJSON['info']['main'] = $description;
    $quizJSON['info']['results'] = $resdescription;
    $i = 0;
    $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery("title","tx_lthquiz_domain_model_level","quiz=$qUid","","sorting,uid","");
    while ($row = $GLOBALS["TYPO3_DB"]->sql_fetch_assoc($res)) {
        $i++;
        $lTitle = $row['title'];
        $quizJSON["info"]["level$i"] = $lTitle;
    }
       
    $GLOBALS['TYPO3_DB']->sql_free_result($res);
    //tx_lthquiz_domain_model_quiz, tx_lthquiz_domain_model_question, tx_lthquiz_domain_model_answer
    return json_encode($quizJSON);
}

function convertBoolean($input)
{
    if($input=="0") {
        return false;
    } else {
        return true;
    }
}

