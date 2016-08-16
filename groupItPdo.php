<?php
    /**
     * groupIt
     *
     * AUTHOR
     *  DimenSi, но на самом деле ilyautkin разжевал.
     *  sergant, спасибо за советы.
     *
     * DESCRIPTION
     *
     * groupIt делит результат вывода pdoResources на группы блоков.
     *
     * PROPERTIES:
     *
     * &groupN на какое число делить, по-умолчанию 3.
     * &tplWrapper шаблон для обертки, по-умолчанию @INLINE <div>[[+wrapper]]</div>.
     *
     * [[groupIt? &groupN=`3` &tplWrapper=`@INLINE <div>[[+wrapper]]</div>` ]]
     */

    $tplWrapper = $modx->getOption('tplWrapper', $scriptProperties, '@INLINE <div>[[+wrapper]]</div>');
    $groupN     = $modx->getOption('groupN', $scriptProperties, 3);
    if (!isset($scriptProperties['outputSeparator'])) {
        $scriptProperties['outputSeparator'] = '||';
    }

    $rows     = $modx->runSnippet('pdoResources', $scriptProperties);
    $rows     = explode($scriptProperties['outputSeparator'], $rows);
    $groupped = array_chunk($rows, $groupN);

    $output   = array();
    $pdo = $modx->getService('pdoTools');
    foreach ($groupped as $group) {
        $wrapper  = implode(PHP_EOL, $group);
        $output[] = $pdo->getChunk($tplWrapper, array('wrapper' => $wrapper));
    }

    return implode(PHP_EOL, $output);
