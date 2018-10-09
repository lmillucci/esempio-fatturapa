<?php
declare(strict_types=1);

class FileSdIBaseType
{
    /**
     * @var string
     */
    private $NomeFile;

    /**
     * @var string -- base64 (?)
     */
    private $File;

    /**
     * @var string
     */
    public $IdentificativoSdI;

    /**
     * @var \DateTime
     */
    public $dataOraRicezione;

    /**
     * @var string (?)
     */
    public $errore;

    public $NomeFileMetadati;

    public $Metadati;

    public function __construct(string $nomeFile, string $content)
    {
        $this->File = $content;
        $this->NomeFile = $nomeFile;
    }
}