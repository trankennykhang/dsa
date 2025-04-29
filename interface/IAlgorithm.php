<?php

namespace dsa\interface;
interface IAlgorithm
{
    public function register() : void;
    public function execute() : void;
    public function description() : void;
    public function name() : string;

}