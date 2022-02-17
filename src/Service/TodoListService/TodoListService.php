<?php

namespace App\Service\TodoListService;
use App\Constants;

/**
 * TodoListService
 * @author Cem AÇAR
 *
 */
class TodoListService
{
    /**
     * Adjust Provider
     * @param string $provider
     * @return json
     * @throws \Exception
     */
    public function setProvider($provider)
    {
        if(in_array($provider, Constants::$providerList)){
            $providerClass = "App\\Service\\TodoListService\\$provider";
            $getProvideClass = new $providerClass();
            return $getProvideClass->execute();
        }else {
            throw new \Exception('Provider Not Found');
        }
    }
}