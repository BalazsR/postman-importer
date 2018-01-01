<?php

namespace HarToPostmanCollection;

use HarToPostmanCollection\Importers\HarImporterStrategy;
use HarToPostmanCollection\SourceFile;

class ImporterStrategyFactory {
    
    /**
     * Factory for importer stragies 
     * 
     * @param SourceFile $sourceFile
     * @return ImporterStrategyInterface
     */
    public static function create(SourceFile $sourceFile){
        $importerStrategy = null;
        
        //Switch extension
        switch ($sourceFile->getExtension()) {
            case 'har':
                $importerStrategy = new HarImporterStrategy();
                break;
        }
        
        return $importerStrategy;
    }

}
