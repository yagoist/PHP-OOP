<?php

namespace secretObject;

abstract class SecretObject
{
    abstract protected function agentLevelHasAccess(int $agentAccessLevel): bool;

    abstract protected function getSecretInformation(): string;

    abstract public function getSecretInformationForAgent(int $agentAccessLevel): string;
}

abstract class Agent
{
    abstract function getAccessLevel(): int;

    abstract function getSecretInformation(SecretObject $secretObject): string;
}

class Library extends SecretObject
{
    public function __construct(private string $secretInformation = '...')
    {
    }

    protected function agentLevelHasAccess(int $agentAccessLevel): bool
    {
        if ($agentAccessLevel >= 1) {
            return true;
        }
        return false;
    }

    protected function getSecretInformation(): string
    {
        return $this->secretInformation;
    }

    public function getSecretInformationForAgent(int $agentAccessLevel): string
    {
        if ($this->agentLevelHasAccess($agentAccessLevel)) {
            return $this->getSecretInformation();
        }
        return 'Доступ запрещен';
    }
}

class Area51 extends SecretObject
{
    public function __construct(private string $secretInformation = '...')
    {
    }
    protected function agentLevelHasAccess(int $agentAccessLevel): bool
    {
        if ($agentAccessLevel >= 6) {
            return true;
        }
        return false;
    }

    protected function getSecretInformation(): string
    {
        return $this->secretInformation;
    }

    public function getSecretInformationForAgent(int $agentAccessLevel): string
    {
        if ($this->agentLevelHasAccess($agentAccessLevel)) {
            return $this->getSecretInformation();
        }
        return 'Доступ запрещен';
    }
}

class Student extends Agent
{

    function getAccessLevel(): int
    {
        return 1;
    }

    function getSecretInformation(SecretObject $secretObject): string
    {
        return $secretObject->getSecretInformationForAgent($this->getAccessLevel());
    }
}

class SecretAgent extends Agent
{

    function getAccessLevel(): int
    {
        return 5;
    }

    function getSecretInformation(SecretObject $secretObject): string
    {
        return $secretObject->getSecretInformationForAgent($this->getAccessLevel());
    }
}

class UnluckySpy extends Agent
{

    function getAccessLevel(): int
    {
        return rand(0, 6);
    }

    function getSecretInformation(SecretObject $secretObject): string
    {
        return $secretObject->getSecretInformationForAgent($this->getAccessLevel());
    }
}

print_r((new Student())->getSecretInformation(new Library('Инопланетяне есть')) . PHP_EOL);
print_r((new Student())->getSecretInformation(new Area51('Инопланетян нет')) . PHP_EOL);
print_r((new SecretAgent())->getSecretInformation(new Library('Инопланетяне есть')) . PHP_EOL);
print_r((new SecretAgent())->getSecretInformation(new Area51('Инопланетян нет')) . PHP_EOL);
print_r((new UnluckySpy())->getSecretInformation(new Library('Инопланетяне есть')) . PHP_EOL);
for ($i = 0; $i < 10; $i++) {
    print_r((new UnluckySpy())->getSecretInformation(new Area51('Инопланетян нет')) . PHP_EOL);
}
