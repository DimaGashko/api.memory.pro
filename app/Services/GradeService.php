<?php

namespace App\Services;

use App\User;
use App\WordsResult;
use App\WordsResultData;
use App\WordsResultItem;
use Illuminate\Support\Facades\DB;

class GradeService
{

   /**
    * Update user info
    *
    * @param array $resultData (as in SaveResultService::saveWordsResult)
    * @return int
    */
   public function gradeWordsResult(array $resultData)
   {
      
      
      foreach ($resultData['items'] as $itemData) {
         
         
         foreach ($itemData['data'] as $dataData) {
            
         }
      }

      return 6;
   }

   
}
