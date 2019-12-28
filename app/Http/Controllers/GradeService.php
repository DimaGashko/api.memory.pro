<?php

namespace App\Controllers;

use App\Word;

class GradeService
{
    private $MAX_WORDS_ERROR = 0.1;
    private $MAX_NUMBERS_ERROR = 0.1;
    private $MAX_IMAGES_ERROR = 0.1;

    private $MAX_GRADE = 1000000;

    /**
     * @param array $resultData (as in SaveResultService::save*Result)
     * @return int
     */
    public function gradeNumbersResult(array $resultData)
    {
        $total = 0;
        $correct = 0;
        $time = 0;

        foreach ($resultData['items'] as $itemData) {
            $total += count($itemData['data']);
            $time += $itemData['time'];

            foreach ($itemData['data'] as $dataData) {
                if ($dataData['correct'] === +$dataData['actual']) {
                    $correct++;
                }
            }
        }

        if ($correct / $total < 1 - $this->MAX_NUMBERS_ERROR) {
            $grade = 0;
        } else {
            $grade =  $this->calcGradeCommonly($total, $correct, $time);
        }

        return [
            "grade" => $grade,
            "total" => $total,
            "correct" => $correct,
            "time" => $time,
        ];
    }

    /**
     * @param array $resultData (as in SaveResultService::save*Result)
     * @return int
     */
    public function gradeWordsResult(array $resultData)
    {
        $total = 0;
        $correct = 0;
        $time = 0;

        foreach ($resultData['items'] as $itemData) {
            $total += count($itemData['data']);
            $time += $itemData['time'];

            foreach ($itemData['data'] as $dataData) {
                $correctValue = Word::find($dataData['correct'])->value;

                if (strcasecmp($correctValue, $dataData['actual']) == 0) {
                    $correct++;
                }
            }
        }

        $grade = 1;
        if ($correct / $total < 1 - $this->MAX_WORDS_ERROR) {
            $grade = 0;
        } else {
            $grade = $this->calcGradeCommonly($total, $correct, $time);
        }

        return [
            "grade" => $grade,
            "total" => $total,
            "correct" => $correct,
            "time" => $time,
        ];
    }

    /**
     * @param array $resultData (as in SaveResultService::save*Result)
     * @return int
     */
    public function gradeImagesResult(array $resultData)
    {
        $total = 0;
        $correct = 0;
        $time = 0;

        foreach ($resultData['items'] as $itemData) {
            $total += count($itemData['data']);
            $time += $itemData['time'];

            foreach ($itemData['data'] as $dataData) {
                if ($dataData['correct'] === $dataData['actual']) {
                    $correct++;
                }
            }
        }

        if ($correct / $total < 1 - $this->MAX_IMAGES_ERROR) {
            $grade = 0;
        } else {
            $grade =  $this->calcGradeCommonly($total, $correct, $time);
        }

        return [
            "grade" => $grade,
            "total" => $total,
            "correct" => $correct,
            "time" => $time,
        ];
    }

    /**
     * Calculate grade using common algorithm.
     * Uses in trainings witch doesn't requite separate grade algorithm
     */
    private function calcGradeCommonly(int $total, int $correct, int $time)
    {
        $grade = ($correct + ($total - $time / 3000)) / 5;;
        return $this->prepareGrade($grade);
    }

    private function prepareGrade($grade)
    {
        return round(min(max($grade, 0), $this->MAX_GRADE));
    }
}
