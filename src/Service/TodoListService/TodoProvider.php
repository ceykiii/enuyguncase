<?php

namespace App\Service\TodoListService;

interface TodoProvider
{
    public function execute();
    public function getData();
}
