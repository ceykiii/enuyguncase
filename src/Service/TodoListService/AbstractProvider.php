<?php

namespace App\Service\TodoListService;


use App\Constants;

class AbstractProvider
{
    /**
     * @param array $data
     * @param int $devloperMaxCapacity
     * @return array
     */
    public function shareToWork(array &$data, int $devloperMaxCapacity): array
    {
        $devReqiuredEffort = $devloperMaxCapacity * $this->finishedTime;
        $devTotalWork = 0;
        $devWork = [];
        foreach ($data as $key => $value){
            if($devTotalWork <= $devReqiuredEffort){
                $devWork[] = [
                    "title" => $key,
                    "time" => $value
                ];
                $devTotalWork += $value;
                unset($data[$key]);
            }
        }

        return $devWork;
    }

    /**
     * @param array $developersWorks
     * @return array
     */
    public function divideByWeek(array $developersWorks): array
    {
        $developerProgram = [];
        foreach ($developersWorks as $key => $value){
            $workTotal = 0;
            foreach ($value as $wkey => $work){
                $workTotal += $work["time"];
                $developerProgram[$key][ceil($workTotal / Constants::$maxCapacityOfDevolopers[$key])][] = $work["title"];
            }
        }
        $developerProgram["totalTime"] = $this->finishedTime;
        return array_reverse($developerProgram);
    }
}