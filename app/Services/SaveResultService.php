<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

use App\User;

use App\NumbersResult;
use App\NumbersResultData;
use App\NumbersResultItem;

use App\WordsResult;
use App\WordsResultData;
use App\WordsResultItem;

use App\ImagesResult;
use App\ImagesResultData;
use App\ImagesResultItem;

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
    *   start_at: Carbon,
    *   recall_time: int,
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
   public function saveNumbersResult(User $user, array $resultData)
   {
      DB::beginTransaction();

      $result = new NumbersResult();
      $result->start_at = $resultData['start_at'];
      $result->recall_time = $resultData['recall_time'];
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
            $data->correct = $dataData['correct'];
            $data->actual = $dataData['actual'];

            $data->item()->associate($item);
            $data->save();
         }
      }

      DB::commit();
      return $result->loadMissing(['items.data']);
   }

   /**
    * @param array $resultData same as in saveNumbersResult
    */
   public function saveWordsResult(User $user, array $resultData)
   {
      DB::beginTransaction();

      $result = new WordsResult();
      $result->start_at = $resultData['start_at'];
      $result->recall_time = $resultData['recall_time'];
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
    * @param array {
    *   start_at: Carbon,
    *   recall_time: int,
    *   items_size: string,
    *   items: {
    *       time: number,
    *       data: {
    *          correct: number,
    *          actual: number,
    *       }[],
    *   }[],
    * } $resultData
    */
   public function saveImagesResult(User $user, array $resultData)
   {
      DB::beginTransaction();

      $result = new ImagesResult();
      $result->start_at = $resultData['start_at'];
      $result->recall_time = $resultData['recall_time'];
      $result->items_size = $resultData['items_size'];
      $result->grade = $this->gradeService->gradeCommonResult($resultData);

      $result->user()->associate($user);
      $result->save();

      foreach ($resultData['items'] as $itemData) {
         $item = new ImagesResultItem();
         $item->time = $itemData['time'];

         $item->result()->associate($result);
         $item->save();

         foreach ($itemData['data'] as $dataData) {
            $data = new ImagesResultData();
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
