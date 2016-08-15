<?php
    /**
     * groupIt
     *
     * AUTHOR
     * 
     * dimensi
     * 
     * DESCRIPTION
     *
     * GroupIt предназначен для обворачивания результатов pdoResources
     *
     * PROPERTIES:
     *
     * &wrapperOn вкл/выкл обертку, по-умолчанию 0
     * &wrapperTag тег обертки, по-умолчанию div
     * &wrapperClass класс обертки
     * &wrapperId id обертки
     * &groupN на какое число делить, по-умолчанию 3
     * &groupTag тег группы, по-умолчанию div
     * &groupClass класс группы
     * &snippet сниппет, по-умолчанию pdoResources
     *
     * USAGE:
     *
     * [[groupIt? &wrapper=`1` &wrapperClass=`Class` &wrapperId=`id` &wrapperTag=`div`
     * &groupN=`3` &groupTag=`div` &groupClass=`ClassGroup` &snippet=`pdoResources`]]
     */

    $wrapperOn       = $modx->getOption('wrapperOn', $scriptProperties, 0);
    $wrapperTag      = $modx->getOption('wrapperTag', $scriptProperties, 'div');
    $wrapper         = $wrapperTag;
    $wrapperClass    = $modx->getOption('wrapperClass', $scriptProperties);
    $wrapperId       = $modx->getOption('wrapperId', $scriptProperties);
    $groupN          = $modx->getOption('groupN', $scriptProperties, 3);
    $groupTag        = $modx->getOption('groupTag', $scriptProperties, 'div');
    $groupClass      = $modx->getOption('groupClass', $scriptProperties);
    $group           = $groupTag;
    $snippet         = $modx->getOption('snippet', $scriptProperties, 'pdoResources');
    $result          = '';

    if (!isset($scriptProperties['outputSeparator'])) {
        $scriptProperties['outputSeparator'] = '||';
    }
    $rows = $modx->runSnippet($snippet, $scriptProperties);
    $rows = explode($scriptProperties['outputSeparator'], $rows);

    if (isset($groupClass)) {
        $group = "{$groupTag} class='{$groupClass}'";
    }
    foreach ($rows as $i => $row) {
        $result .= $row;
        if (($i + 1) % $groupN == 0 && ($i + 1) !== count($rows)) {
            $result .= "</{$groupTag}>" . PHP_EOL . "<{$group}>";
        }
    }
    $result = "<{$group}>\n{$result}\n</{$groupTag}>";
    if ($wrapperOn == 1) {
        if (isset($wrapperTag)) {
            $wrapper = $wrapperTag;
        }
        if (isset($wrapperClass)) {
            $wrapper .= " class='{$wrapperClass}' ";
        }
        if (isset($wrapperId)) {
            $wrapper .= " id='{$wrapperId}' ";
        }
        $result = "<{$wrapper}>\n {$result} \n</{$wrapperTag}>";
    }
    return $result;
