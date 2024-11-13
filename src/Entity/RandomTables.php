<?php
namespace App\Entity;
use App\Repository\RandomTablesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity(repositoryClass: RandomTablesRepository::class)]
class RandomTables
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 255)]
    private ?string $TableName = null;
    #[ORM\Column(length: 10)]
    private ?string $Dice = null;
    #[ORM\Column(length: 255)]
    private ?string $TableType = null;
    #[ORM\Column(length: 50)]
    private ?string $Theme = null;
    #[ORM\Column(type: Types::TEXT)]
    private ?string $Content = null;
    #[ORM\ManyToOne(inversedBy: 'randomTables')]
    private ?User $DungeonMaster = null;
    public $table_type = "";

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getTableName(): ?string
    {
        return $this->TableName;
    }
    public function setTableName(string $TableName): static
    {
        $this->TableName = $TableName;
        return $this;
    }
    public function getTableType(): ?string
    {
        return $this->TableType;
    }
    public function setTableType(string $TableType): static
    {
        $this->TableType = $TableType;
        $this->table_type = $TableType;
        return $this;
    }
    public function getDice(): ?string
    {
        return $this->Dice;
    }
    
    public function setDice(string $Dice): static
    {   
        $this->Dice = $Dice;
        $value = 0;
        if($this->Dice == 'd10') {
            $value = 10;
        } else if($this->Dice == '2d10/4') {
            $value = 25;
        } else if($this->Dice == '2d10/2') {
            $value = 50;
        } else if($this->Dice == '2d10') {
            $value = 100;
        } else if($this->Dice == 'd20') {
            $value = 20;
        } else if($this->Dice == 'd12') {
            $value = 12;
        } else if($this->Dice == 'd8') {
            $value = 8;
        } else if($this->Dice == 'd6') {
            $value = 6;
        } else if($this->Dice == 'd4') {
            $value = 4;
        }
        $this->updateContentInput($value);
        return $this;
    }
    
    public function getTheme(): ?string
    {
        return $this->Theme;
    }
    public function setTheme(string $Theme): static
    {
        $this->Theme = $Theme;
        return $this;
    }
    public function getContent(): string
    {     
        return $this->Content;
    }
    public function setContent(string $Content): static
    {
        $this->Content = $Content;
        return $this;
    }
    public function getDungeonMaster(): ?User
    {
        return $this->DungeonMaster;
    }
    public function setDungeonMaster(?User $DungeonMaster): static
    {
        $this->DungeonMaster = $DungeonMaster;
        return $this;
    }

    public function updateContentInput(string $value) {
        $contentIput = '{ "table" : [';
        for ($i = 1; $i <= $value; $i++) {
            $contentIput = $contentIput . ($i != 1 ? ", " : "");
            $data = '{"case":'.  $i .',"categorie": "plaintext","choix": "lorem ipsum dolor si amet","nombre": '.$i.'}';
            // json_encode($data);
            $contentIput = $contentIput . $data;
        }
        $contentIput = $contentIput . "] }";

        $this->Content = $contentIput;
    }
}