// src/Entity/Content.php
namespace App\Entity;

class Content 
{
    private string $text;

    public function getText(): string 
    {
        return $this->text;
    }

    public function setText(string $text): void 
    {
        $this->text = $text;
    }
}