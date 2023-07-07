<?php

namespace App\Interfaces;

interface TimestampedInterface
{
    public function getCreatedAt(): ?\DateTimeInterface;
    public function getUpdatedAt(): ?\DateTimeInterface;
    public function setCreatedAt(\DateTimeInterface $createdAt):self;
    public function setUpdatedAt(\DateTimeInterface $updatedAt):self;

}