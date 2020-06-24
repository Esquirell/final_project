<?php


namespace App\Service;


interface PDFServiceInterface
{
    public function makePDF($id);
    public function getData($id);
    public function renderHTML($id);
}
