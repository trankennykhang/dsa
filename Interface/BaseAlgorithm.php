<?php
namespace Dsa\Interface;

/**
 * @author Kenny Tran
 */
abstract class BaseAlgorithm implements IAlgorithm
{
    public abstract function execute($logger = null): void;

    public function register() : void
    {
        // TODO: Implement register() method.
    }

    public function description() : void
    {
        // TODO: Implement description() method.
    }

    public function name(): string
    {
        // TODO: Implement name() method.
        return __CLASS__;
    }
    public function debug($value, $type, $logger) : void{
        if ($logger == null){
            print '   *** ' . $type . ': ' .$value. "\n";
        } else {
            $logger($value, $type);
        }
    }

}
