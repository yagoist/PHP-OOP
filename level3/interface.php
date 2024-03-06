<?php

namespace interface;

interface ReaderInterface
{
    public function read(): array;
}

interface WriterInterface
{
    public function write(array $date): void;
}

interface ConverterInterface
{
    public function convert(string $item): string;
}

class Import
{
        private ReaderInterface $reader;
        private WriterInterface $writer;
        private array $converters = [];

    public function from(ReaderInterface $reader): Import
    {
        $this->reader = &$reader;
        return $this;
    }

    public function to(WriterInterface $writer): Import
    {
        $this->writer = &$writer;
        return $this;
    }

    public function with(ConverterInterface $converter): Import
    {
        $this->converters[] = &$converter;
        return $this;
    }

    public function execute(): void
    {
        $item = $this->reader->read();
        $position = rand(0, count($item)-1);
        foreach ($this->converters as $converter) {
            $item[$position] = $converter->convert($item[$position]);
        }
        $this->writer->write($item);
    }
}

class ArrayReader implements ReaderInterface
{
    public function __construct(private readonly array $array)
    {
    }

    public function read(): array
    {
        return $this->array;
    }
}

class ArrayWriter implements WriterInterface
{
    private array $array;

    public function write(array $date): void
    {
        $this->array = $date;
    }
}

class StringConverterToStar implements ConverterInterface
{
    public function convert(string $item): string
    {
       return str_replace('a', '*', $item);
    }
}

class StringConverterToDot implements ConverterInterface
{
    public function convert(string $item): string
    {
       return str_replace('i', '.', $item);
    }
}

$exampleArr = ['abaibaibabiaba', 'bfgiraibdfa', 'mnbafisjhi'];

$import = (new Import())
    ->from(new ArrayReader($exampleArr))
    ->to(new ArrayWriter())
    ->with(new StringConverterToStar())
    ->with(new StringConverterToDot());
$import->execute();
print_r($import);