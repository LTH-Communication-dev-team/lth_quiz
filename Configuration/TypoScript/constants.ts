
plugin.tx_lthquiz_quiz {
  view {
    # cat=plugin.tx_lthquiz_quiz/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:lth_quiz/Resources/Private/Templates/
    # cat=plugin.tx_lthquiz_quiz/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:lth_quiz/Resources/Private/Partials/
    # cat=plugin.tx_lthquiz_quiz/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:lth_quiz/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_lthquiz_quiz//a; type=string; label=Default storage PID
    storagePid =
  }
}
