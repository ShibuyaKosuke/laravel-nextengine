<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities;

interface EntityDownloadable
{
    /**
     * @return mixed
     */
    public function primaryKeyName(): ?string;
}