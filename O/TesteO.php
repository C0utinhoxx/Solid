<?php

namespace App;

class ReportGenerator
{
    public function generate($reportType, $data)
    {
        if ($reportType === 'pdf') {
            // Geração de PDF
            return "PDF gerado com os dados: " . json_encode($data);
        } elseif ($reportType === 'excel') {
            // Geração de Excel
            return "Excel gerado com os dados: " . json_encode($data);
        } elseif ($reportType === 'csv') {
            // Geração de CSV
            return "CSV gerado com os dados: " . json_encode($data);
        }
        // Se precisar de outro tipo de relatório, você teria que alterar essa classe
    }
}
