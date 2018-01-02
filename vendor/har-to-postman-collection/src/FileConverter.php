<?php

namespace HarToPostmanCollection;

use HarToPostmanCollection\Collection\Collection;
use Exception;
use HarToPostmanCollection\JsonConverter;

class FileConverter
{

    const SOURCE_DIRECTORY = '/src/';
    const DESTINATION_DIRECTORY = '/dist/';
    const HAR_EXTENSION = "har";

    /**
     *
     * @var string
     */
    protected $baseUrl;

    /**
     * @var JsonConverter
     */
    protected $jsonConverter;

    /**
     *
     * @param string $baseUrl
     * @param JsonConverter $jsonConverter
     */
    public function __construct($baseUrl, JsonConverter $jsonConverter)
    {
        $this->baseUrl = $baseUrl;
        $this->jsonConverter = $jsonConverter;
    }

    /**
     * Import file based in base url
     */
    public function run()
    {
        $result = [];
        $srcDir = $this->baseUrl . self::SOURCE_DIRECTORY;
        $distDir = $this->baseUrl . self::DESTINATION_DIRECTORY;

        //Control directory
        if (is_dir($srcDir)) {

            //Read files
            $files = scandir($srcDir);

            //Control scandir resturn
            if (is_array($files) && count($files)) {
                foreach ($files as $file) {

                    //Create sosurceFile
                    $sourceFile = new SourceFile($srcDir, $file);

                    if ($sourceFile->getExtension() != self::HAR_EXTENSION) {
                        continue;
                    }

                    $collection = $this->jsonConverter->convert($sourceFile->getContent());

                    //Set false as default
                    $result[$file] = false;

                    //Check result
                    if ($collection instanceof Collection) {
                        //Write to disk
                        $result[$file] = $this->writeCollectionToDisk($collection, $distDir, $sourceFile);
                    }
                }
            }
        }
        return $result;
    }

    /**
     *
     * @param SourceFile $sourceFile
     * @return array
     */
    private function writeCollectionToDisk(Collection $collection, $baseUrl, SourceFile $sourceFile)
    {
        $result = false;

        try {
            $fileName = $sourceFile->getName();

            //Parse base name
            $baseName = sprintf('%s.%s', $fileName, Collection::EXTENSION);

            //Get collection array
            $array = $collection->toArray();

            //File put content
            $result = (file_put_contents($baseUrl . $baseName, json_encode($array, JSON_UNESCAPED_SLASHES)) > 0);
        } catch (Exception $exc) {
            //Do nothing
        }

        return $result;
    }

}
