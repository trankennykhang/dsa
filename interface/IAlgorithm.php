<?php

namespace dsa\interface;
interface IAlgorithm
{
    public function register();
    public function execute();
    public function description();
    public function name();

}