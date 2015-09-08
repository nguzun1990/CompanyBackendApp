<?php

namespace AppBundle\Services;
use AppBundle\Entity\Company;
use Doctrine\ORM\EntityManager;

class ImportService {
    
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    private function guessEncoding($record)
    {
        return mb_detect_encoding(implode(';', $record), [ "UTF-8", "ISO-8859-15" ], true);
    }
    
    protected function decodeData($record)
    {
        if ($record === false) {
            return false;
        }

        $enc = $this->guessEncoding($record);

        $result = [];
        foreach ($record as $field) {
            $result [] = trim(mb_convert_encoding($field, "UTF-8", $enc));
        }
        return $result;
    }
    
    public function importCompanies($path) {
        
        if (!file_exists($path)) {
            throw new FileNotFoundException($path);
        }

        if (!is_readable($path)) {
            throw new IOException("Unable read file '$path'");
        }

        $csvFile = fopen($path, "r");
        if (!$csvFile) {
            throw new IOException("Unable to open file '{$path}'");
        }
        
        $result = "";
        $i = 0;
        $j = 0;
        while (($record = $this->decodeData(fgetcsv($csvFile, null, "#"))) !== false) {
             $result .= $record[0]."\n";
             $this->parseCompany($record);
             $i++;
             if ($i > 10) {
                 $this->em->flush();
                 $i = 0;
             }
             echo ++$j."\n";
             
             
        }
        $this->em->flush();
        return $result;
    }
    
    protected function parseCompany($record) {
        $idno = $record[0];
        $title = $record[2];
        $address = $record[4];
        $director = $record[5];
        $company = new Company();
        $company->setIdno($idno);
        $company->setTitle($title);        
        $company->setAddress($address);        
        $company->setDirector($director);    
        $this->em->persist($company);
        
    }
}

?>
