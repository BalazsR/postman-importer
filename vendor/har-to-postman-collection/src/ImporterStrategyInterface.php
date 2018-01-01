<?php

namespace HarToPostmanCollection;

/**
 *
 * @author gustavo-rodriguez
 */
interface ImporterStrategyInterface {
    public function import(SourceFile $sourceFile);
}
