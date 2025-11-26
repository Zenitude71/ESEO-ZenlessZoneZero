<?php

namespace Models;

/**
 * Représente un personnage avec ses propriétés principales :
 * ID, nom, élément, classe, rareté, origine, URL d'image et couleur de l'élément.
 * Utilise l'hydratation pour initialiser ses propriétés depuis un tableau associatif.
 *
 * @package Models
 */
class Personnage
{
    private ?string $id;
    private string $name;
    private string $element;
    private string $unitclass;
    private int $rarity;
    private ?string $origin;
    private string $urlImg;
    private string $elementColor;

    public function __construct(array $data = [])
    {
        $this->hydrate($data);
    }

    private function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace('_', '', ucwords($key, '_'));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId(): ?string { return $this->id; }
    public function setId(?string $id): void { $this->id = $id; }

    public function getName(): string { return $this->name; }
    public function setName(string $name): void { $this->name = $name; }

    public function getElement(): string { return $this->element; }
    public function setElement(string $element): void { $this->element = $element; }

    public function getUnitclass(): string { return $this->unitclass; }
    public function setUnitclass(string $unitclass): void { $this->unitclass = $unitclass; }

    public function getRarity(): int { return $this->rarity; }
    public function setRarity(int $rarity): void { $this->rarity = $rarity; }

    public function getOrigin(): ?string { return $this->origin; }
    public function setOrigin(?string $origin): void { $this->origin = $origin; }

    public function getUrlImg(): string { return $this->urlImg; }
    public function setUrlImg(string $urlImg): void { $this->urlImg = $urlImg; }

    public function getElementColor(): string { return $this->elementColor; }
    public function setElementColor(string $color): void { $this->elementColor = $color; }
}
