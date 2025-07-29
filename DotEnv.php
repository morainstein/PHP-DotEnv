<?php

namespace Morainstein\DotEnv;

class DotEnv
{
    private string $envPath;
    private array $envs = [];

    public function __construct(?string $envPath = null)
    {
        if ($envPath === null) {
            $envPath = getenv('PWD') . '/.env';
        }

        if (!file_exists($envPath)) {
            throw new \Exception("The .env file does not exist at path: {$this->envPath}");
        }

        $this->envPath = $envPath;
        $this->load();
    }

    private function load(): void
    {
        $envFile = file_get_contents($this->envPath);
        $lines = explode("\n", $envFile);

        foreach ($lines as $line) {
            $line = trim($line);

            if ($line && !str_starts_with($line, '#')) {
                [$key, $value] = explode('=', $line, 2);
                $this->envs[trim($key)] = trim($value);
            }
        }
    }

    public function get(string $key): ?string
    {
        return $this->envs[$key] ?? null;
    }
}
