<?php


namespace App\Services;


class FileService
{
    public function content($content){

        $temp = tempnam(home() .'storage/cache/','onedriveFile');

        file_put_contents($temp,$content);

        $wordZip = zip_open($temp);

        $content = $this->getDocumentFromZip($wordZip);

        zip_close($wordZip);

        unlink($temp);

        return $content;
    }

    public function getDocumentFromZip($file){
        while($entry = zip_read($file)) {
            if (zip_entry_name($entry) == "word/document.xml") {
                return zip_entry_read($entry,zip_entry_filesize($entry));
            }
        }
        return false;
    }
}