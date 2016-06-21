<?php


namespace App\Services;


class CompareFileService
{
    private $document;
    private $oneDrive;
    private $differentWords = [];
    private $copiedWords = [];
    private $percentage = 0;

    public function compare($oneDriveFile,$document){
        $this->document = explode(' ', urldecode($document));
        $this->oneDrive = explode(' ', strip_tags($oneDriveFile));

        $this->percentage = $this->getSection()
            ->removeCommonWords()
            ->getCopiedWords()
            ->getPercentage();

        return json_encode([
            'words' => $this->copiedWords,
            'percentage' =>  $this->percentage
        ]);
    }

    public function getSection(){
        $oneDriveFile = implode(' ',$this->oneDrive);

        $firstSentence = implode(' ',array_slice($this->document,0,3));
        $lastSentence = implode(' ', array_slice($this->document,-3,3));

        $startPos = strpos($oneDriveFile,$firstSentence);
        $endPos = strpos($oneDriveFile,$lastSentence);


        $oneDriveFile = substr($oneDriveFile,$startPos,$endPos-$startPos + strlen($lastSentence));


        $this->oneDrive = explode(' ', $oneDriveFile);

        return $this;
    }
    public function removeCommonWords(){
        $commonWords = ['de','het','het'];

        $this->document = array_filter($this->document,function($word) use ($commonWords){
            return !in_array($word,$commonWords);
        });

        $this->oneDrive = array_filter($this->oneDrive,function($word) use ($commonWords){
            return !in_array($word,$commonWords);
        });

        return $this;
    }

    public function getCopiedWords(){
        $this->differentWords = array_diff_assoc($this->document,$this->oneDrive);

        $this->copiedWords = array_filter($this->document,function($index){
            return !in_array($index,array_keys($this->differentWords));
        },ARRAY_FILTER_USE_KEY);

        return $this;
    }

    public function getPercentage(){
        return round(100 / count($this->document) * (count($this->document) - count($this->differentWords)),2);
    }
}