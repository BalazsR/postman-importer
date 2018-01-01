<?php

namespace HarToPostmanCollection;

interface ImporterStrategyInterface {
    public function import(SourceFile $sourceFile);
}
