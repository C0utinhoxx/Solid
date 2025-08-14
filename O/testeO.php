<?php

namespace App\Reports;
    interface ReportInterface
    {}
    class PDF implements ReportInterface{ 
        public function(array $data)
        {
            return "PDF gerado com os dados: " . json_encode($data);
            
        }
     }


     class Execel implements ReportInterface{
        public function(array $data)
        {
          return "Excel gerado com os dados: " . json_encode($data);
 
        }
     }
  
     class CSV implements ReportInterface{

     
        public function(array $data)
        {
          return "CSV gerado com os dados: " . json_encode($data);   
        }

        }

