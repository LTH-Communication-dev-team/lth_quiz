
plugin.tx_lthquiz_quiz {
  view {
    templateRootPaths.0 = EXT:lth_quiz/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_lthquiz_quiz.view.templateRootPath}
    partialRootPaths.0 = EXT:lth_quiz/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_lthquiz_quiz.view.partialRootPath}
    layoutRootPaths.0 = EXT:lth_quiz/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_lthquiz_quiz.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_lthquiz_quiz.persistence.storagePid}
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

plugin.tx_lthquiz._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-lth-quiz table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-lth-quiz table th {
        font-weight:bold;
    }

    .tx-lth-quiz table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)
page {
    includeCSS {
        #lth_quiz_reset = EXT:lth_quiz/Resources/Public/Css/reset.css
        lth_quiz_slickQuiz = EXT:lth_quiz/Resources/Public/Css/slickQuiz.css
        lth_quiz_master = EXT:lth_quiz/Resources/Public/Css/master.css
    }
    includeJSFooter {
        lth_quiz_slickQuiz = EXT:lth_quiz/Resources/Public/JavaScript/slickQuiz.js
        lth_quiz_master = EXT:lth_quiz/Resources/Public/JavaScript/master.js
    }
}