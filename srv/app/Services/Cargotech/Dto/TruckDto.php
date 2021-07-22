<?php
declare(strict_types=1);

namespace App\Services\Cargotech\Dto;

use Illuminate\Contracts\Support\Arrayable;

class TruckDto implements \JsonSerializable, Arrayable
{
    protected int         $quantity;
    protected int         $beltCount;
    protected int         $placeCount;
    protected int         $palletCount;
    protected bool        $tir;
    protected string|null $tempFrom;
    protected string|null $tempTo;
    protected string|null $temperatureFrom;
    protected string|null $temperatureTo;
    protected int         $adr;
    protected int         $height;
    protected int         $length;
    protected int         $width;


    public function quantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity($quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function beltCount(): ?int
    {
        return $this->beltCount;
    }

    public function setBeltCount($beltCount): self
    {
        $this->beltCount = $beltCount;

        return $this;
    }

    public function placeCount(): ?int
    {
        return $this->placeCount;
    }

    public function setPlaceCount($placeCount): self
    {
        $this->placeCount = $placeCount;

        return $this;
    }

    public function palletCount(): int
    {
        return $this->palletCount;
    }

    public function setPalletCount(int $palletCount): self
    {
        $this->palletCount = $palletCount;

        return $this;
    }

    public function tir(): ?bool
    {
        return $this->tir;
    }

    public function setTir(bool $tir): self
    {
        $this->tir = $tir;

        return $this;
    }

    public function tempFrom(): ?string
    {
        return $this->tempFrom;
    }

    public function setTempFrom(?string $tempFrom): self
    {
        $this->tempFrom = $tempFrom;

        return $this;
    }

    public function tempTo(): ?string
    {
        return $this->tempTo;
    }

    public function setTempTo(?string $tempTo): self
    {
        $this->tempTo = $tempTo;

        return $this;
    }

    public function temperatureFrom(): ?string
    {
        return $this->temperatureFrom;
    }

    public function setTemperatureFrom(?string $temperatureFrom): self
    {
        $this->temperatureFrom = $temperatureFrom;

        return $this;
    }

    public function temperatureTo(): ?string
    {
        return $this->temperatureTo;
    }

    public function setTemperatureTo(?string $temperatureTo): self
    {
        $this->temperatureTo = $temperatureTo;

        return $this;
    }

    public function adr(): int
    {
        return $this->adr;
    }

    public function setAdr(int $adr): self
    {
        $this->adr = $adr;

        return $this;
    }

    public function height(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function length(): int
    {
        return $this->length;
    }

    public function setLength(int $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function width(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function toArray()
    {
        return [
            'quantity'         => $this->quantity(),
            'belt_count'       => $this->beltCount(),
            'place_count'      => $this->placeCount(),
            'pallet_count'     => $this->palletCount(),
            'tir'              => $this->tir(),
            'temp_from'        => $this->tempFrom(),
            'temp_to'          => $this->tempTo(),
            'temperature_from' => $this->temperatureFrom(),
            'temperature_to'   => $this->temperatureTo(),
            'adr'              => $this->adr(),
            'height'           => $this->height(),
            'length'           => $this->length(),
            'width'            => $this->width(),
        ];
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function dbSerialize(): bool|string
    {
        $json = $this->jsonSerialize();

        return json_encode($json, JSON_UNESCAPED_UNICODE);
    }

    public static function fromArray($data): self
    {
        return (new static())
            ->setQuantity($data['quantity'])
            ->setBeltCount($data['belt_count'])
            ->setPlaceCount($data['place_count'])
            ->setPalletCount($data['pallet_count'])
            ->setTir($data['tir'])
            ->setTempFrom($data['temp_from'] ?? null)
            ->setTempTo($data['temp_to'] ?? null)
            ->setTemperatureFrom($data['temperature_from'] ?? null)
            ->setTemperatureTo($data['temperature_to'] ?? null)
            ->setAdr($data['adr'])
            ->setHeight($data['height'])
            ->setLength($data['length'])
            ->setWidth($data['width']);
    }
}
