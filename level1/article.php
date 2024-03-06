<?php

namespace article;

class Article
{
    public function __construct(
        private string $title,
        private string $content,
        private ?int $age = null,
        private bool $gotImage = false
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function isGotImage(): bool
    {
        return $this->gotImage;
    }
}

class CensorService
{
    public function __construct(private readonly array $censoredWords)
    {
    }

    public function censor(string $text): string
    {
        return str_ireplace($this->censoredWords, 'CENSORED', $text);
    }
}

class Publisher
{
    public function __construct(private readonly CensorService $censor)
    {
    }

    public function send(string $title, string $content, string $channel): void
    {
        print_r("Статья: {$title} была опубликована в канал {$channel}. {$content}" . PHP_EOL);
    }

    public function publish(Article $article): void
    {
        if ($article->getAge() < 18 || $article->getAge() === null) {
            $this->send($article->getTitle(), $this->censor->censor($article->getContent()), 'интернет блог');
        } else {
            $this->send($article->getTitle(), $article->getContent(), 'интернет блог');
        }
        if ($article->isGotImage()) {
            $this->send($article->getTitle(), $article->getContent(), 'instagram');
        }
    }
}

$censoredWords = ["сигаретами", "водкой", 'ЛГБТ', 'самоубийств', "наркотики"];
$text = 'В одном далеком далеком межгаллакическом мире, жители очень любили наркотики, при этом они упивались водкой, добивали себя сигаретами и баловались ЛГБТ, не удивительно что в их мире был очень большой процент самоубийств.';

$article1 = new Article('Люди в мире с инстой', $text, null, true);
$article2 = new Article('Люди в мире до 15 лет', $text, 15, false);
$article3 = new Article('Люди в мире', $text, 25, false);

$publish = new Publisher(new CensorService($censoredWords));

print_r($publish->publish($article1));
print_r($publish->publish($article2));
print_r($publish->publish($article3));
