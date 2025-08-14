<?php

namespace App\Reports;

    interface ReportInterface
    {
        public function(array $data)
    }
class ReportGenerator
{
    public function generate($reportType, $data)
    {
        if ($reportType === 'pdf') {

            return "PDF gerado com os dados: " . json_encode($data);
        } elseif ($reportType === 'excel') {

            return "Excel gerado com os dados: " . json_encode($data);
        } elseif ($reportType === 'csv') {

            return "CSV gerado com os dados: " . json_encode($data);
        }
    }

 class PDF {
    public function pdf ($reportType)
    return "Excel gerado com os dados: " . json
 }
}
