<?php
namespace dsa\interface;

/**
 * @author Kenny Tran
 */
abstract class BaseAlgorithm implements IAlgorithm
{
    public abstract function execute(): void;

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
}
