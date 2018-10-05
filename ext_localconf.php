<?php
defined('TYPO3_MODE') || die('Access denied.');

// Add AJAX support
$TYPO3_CONF_VARS['FE']['eID_include']['lth_quiz'] = 'EXT:lth_quiz/Classes/Service/Ajax.php';

call_user_func(
    function($extKey)
	{

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'LTH.LthQuiz',
            'Quiz',
            [
                'Quiz' => 'list, show, new, create, edit, update, delete',
                'Question' => 'list, show, new, create, edit, update, delete',
                'Answer' => 'list, show, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'Quiz' => 'create, update, delete',
                'Question' => 'create, update, delete',
                'Answer' => 'create, update, delete'
            ]
        );

	// wizards
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'mod {
			wizards.newContentElement.wizardItems.plugins {
				elements {
					quiz {
						icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($extKey) . 'Resources/Public/Icons/user_plugin_quiz.svg
						title = LLL:EXT:lth_quiz/Resources/Private/Language/locallang_db.xlf:tx_lth_quiz_domain_model_quiz
						description = LLL:EXT:lth_quiz/Resources/Private/Language/locallang_db.xlf:tx_lth_quiz_domain_model_quiz.description
						tt_content_defValues {
							CType = list
							list_type = lthquiz_quiz
						}
					}
				}
				show = *
			}
	   }'
	);
    },
    $_EXTKEY
);
