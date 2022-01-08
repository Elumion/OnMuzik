<?php


namespace core;

/**
 *Basic class for controllers
 */
class Controller
{
    public function render($viewName, $localParams = null, $globalParams = null){
        $tmp = new Template();
        if (is_array($localParams))
            $tmp->setParams($localParams);
        if (!is_array($globalParams))
            $globalParams = [];
        $moduleName = strtolower((new \ReflectionClass($this))->getShortName());
        $globalParams['PageContent'] = $tmp->render("views/{$moduleName}/{$viewName}.php");
        return $globalParams;
    }
}