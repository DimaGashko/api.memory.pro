<?php

namespace App\Services;

use App\User;

use App\NumbersResult;
use App\NumbersResultData;
use App\NumbersResultItem;
use Illuminate\Support\Facades\DB;

use App\WordsResult;
use App\WordsResultData;
use App\WordsResultItem;

class SaveResultService
{

   /** @var GradeService */
   private $gradeService;

   public function __construct(GradeService $gradeService)
   {
      $this->gradeService = $gradeService;
   }

   /**
    * @param array {
    *   startAt: Carbon,
    *   rememberTime: int,
    *   template: string,
    *   items: {
    *       time: number,
    *       data: {
    *          correct: number,
    *          actual: number,
    *       }[],
    *   }[],
    * } $resultData
    */
   public function saveWordsResult(User $user, array $resultData)
   {
      DB::beginTransaction();

      $result = new WordsResult();
      $result->start_at = $resultData['startAt'];
      $result->remember_time = $resultData['rememberTime'];
      $result->template = $resultData['template'];
      $result->grade = $this->gradeService->gradeCommonResult($resultData);

      $result->user()->associate($user);
      $result->save();

      foreach ($resultData['items'] as $itemData) {
         $item = new WordsResultItem();
         $item->time = $itemData['time'];

         $item->result()->associate($result);
         $item->save();

         foreach ($itemData['data'] as $dataData) {
            $data = new WordsResultData();
            $data->correct_id = $dataData['correct'];
            $data->actual_id = $dataData['actual'];

            $data->item()->associate($item);
            $data->save();
         }
      }

      DB::commit();
      return $result->loadMissing(['items.data.correct', 'items.data.actual']);
   }

   /**
    * @param array $resultData same as in saveWordsResult
    */
   public function saveImagesResult(User $user, array $resultData)
   {
      DB::beginTransaction();

      $result = new NumbersResult();
      $result->start_at = $resultData['startAt'];
      $result->remember_time = $resultData['rememberTime'];
      $result->template = $resultData['template'];
      $result->grade = $this->gradeService->gradeCommonResult($resultData);

      $result->user()->associate($user);
      $result->save();

      foreach ($resultData['items'] as $itemData) {
         $item = new NumbersResultItem();
         $item->time = $itemData['time'];

         $item->result()->associate($result);
         $item->save();

         foreach ($itemData['data'] as $dataData) {
            $data = new NumbersResultData();
            $data->correct_id = $dataData['correct'];
            $data->actual_id = $dataData['actual'];

            $data->item()->associate($item);
            $data->save();
         }
      }

      DB::commit();
      return $result->loadMissing(['items.data.correct', 'items.data.actual']);
   }
}
