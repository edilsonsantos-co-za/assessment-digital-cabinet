<?php

function mercureTransport(string $url, string $defaultPath): string
{
    if (str_starts_with($url, 'local://')) {
        return 'transport local';
    }

    if ($url !== '' && !preg_match('~^bolt://([^?#]+)(?:\?([^#]*))?$~', $url, $matches)) {
        throw new InvalidArgumentException('Unsupported MERCURE_TRANSPORT_URL');
    }

    $options = [];
    parse_str($matches[2] ?? '', $options);
    $path = $matches[1] ?? $defaultPath;
    if ($url !== '' && $path[0] !== '/' && str_contains($path, '/')) {
        $path = substr($path, strpos($path, '/'));
    }
    $config = ['path' => rawurldecode($path)];
    foreach (['bucket_name', 'size', 'cleanup_frequency'] as $name) {
        if (isset($options[$name])) {
            if (!is_string($options[$name])) {
                throw new InvalidArgumentException('Invalid Mercure transport option');
            }
            $config[$name] = $options[$name];
        }
    }

    $directives = [];
    foreach ($config as $name => $value) {
        $directives[] = $name.' '.json_encode($value, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES);
    }

    return "transport bolt {\n".implode("\n", $directives)."\n}";
}

if (realpath($_SERVER['SCRIPT_FILENAME']) === __FILE__) {
    try {
        echo mercureTransport(getenv('MERCURE_TRANSPORT_URL') ?: '', getenv('MERCURE_TRANSPORT_PATH') ?: '/data/mercure.db');
    } catch (InvalidArgumentException $exception) {
        fwrite(STDERR, $exception->getMessage()."\n");
        exit(1);
    }
}
