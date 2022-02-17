<?php

namespace App\Service\TodoListService;
use App\Constants;

class EnProvider extends AbstractProvider implements TodoProvider
{
    /**
     * @var string
     */
    public $trProviderUrl = "http://www.mocky.io/v2/5d47f235330000623fa3ebf7";

    /**
     * @var int
     */
    public $finishedTime;

    /**
     * TrProvider Construct Method
     */
    public function execute()
    {
        $getJsonData = $this->getData();
        $developersWorks = $this->prepareData($getJsonData);
        return $this->divideByWeek($developersWorks);
    }

    /**
     * Get Json Data From Url
     * @return array
     */
    public function getData()
    {
        $json = file_get_contents($this->trProviderUrl);
        return json_decode($json,true);
    }

    /**
     * @param array $data
     * @return array
     */
    public function prepareData(array $data): array
    {
        $totalCost = 0;
        $devWorkTime = [];
        foreach ($data as $value){
            $devWorkTime[key($value)] = $value[key($value)]["level"] * $value[key($value)]["estimated_duration"];
            $totalCost += $value[key($value)]["level"] * $value[key($value)]["estimated_duration"];
        }

        asort($devWorkTime); // sort array
        $devWorkTime = array_reverse($devWorkTime); // new order
        $this->finishedTime = $totalCost / Constants::$totalWorkforce;
        $developersWorkShare = [];

        foreach (Constants::$maxCapacityOfDevolopers as $key => $value){
            $developersWorkShare[$key] =  $this->shareToWork($devWorkTime, $value);
        }
        return $developersWorkShare;

    }

}


