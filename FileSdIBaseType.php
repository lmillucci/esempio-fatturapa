<?php
declare(strict_types=1);

class FileSdIBaseType
{
    /**
     * @var string
     */
    private $NomeFile;

    /**
     * @var string
     */
    private $File;

    public function __construct(string $nomeFile, string $content)
    {
        $this->File = $content;
        $this->NomeFile = $nomeFile;
    }
}