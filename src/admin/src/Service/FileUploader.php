<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    public function upload(UploadedFile $file, string $path)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move(sprintf('%s/%s', $this->getTargetDirectory(), $path), $fileName);

        return $fileName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}