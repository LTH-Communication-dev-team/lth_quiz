<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'LTH.LthQuiz',
            'Quiz',
            'LTH Quiz'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'LTH Quiz');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_lthquiz_domain_model_quiz', 'EXT:lth_quiz/Resources/Private/Language/locallang_csh_tx_lthquiz_domain_model_quiz.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_lthquiz_domain_model_quiz');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_lthquiz_domain_model_question', 'EXT:lth_quiz/Resources/Private/Language/locallang_csh_tx_lthquiz_domain_model_question.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_lthquiz_domain_model_question');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_lthquiz_domain_model_answer', 'EXT:lth_quiz/Resources/Private/Language/locallang_csh_tx_lthquiz_domain_model_answer.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_lthquiz_domain_model_answer');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_lthquiz_domain_model_level', 'EXT:lth_quiz/Resources/Private/Language/locallang_csh_tx_lthquiz_domain_model_level.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_lthquiz_domain_model_level');

    },
    $_EXTKEY
);
