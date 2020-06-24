<?php


namespace App\Service;


use App\Models\Record;
use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\App;

class PDFService implements PDFServiceInterface
{
    private $pdf;

    public function makePDF($id)
    {
        $dompdf = new Dompdf();
        $html = $this->renderHTML($id);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }

    public function getData($id)
    {
        return Record::findOrFail($id);
    }

    public function renderHTML($id)
    {
        $record= $this->getData($id);
        $html="         <ul>
                        <li>Доктор:</li>
                        <li>{{$record->doctor()->first()->user()->first()->name}} {{$record->doctor()->first()->user()->first()->surname}}</li>
                        <li>Пациент:</li>
                        <li>{{$record->user()->first()->name}} {{$record->user()->first()->surname}}</li>
                        <li>Время приема:</li>
                        <li>{{$record->reception}}</li>
                        </ul>";
        return $html;
    }

}
