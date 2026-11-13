<?php

require __DIR__.'/../frankenphp/mercure-transport.php';

assert(str_contains(mercureTransport('', '/data/mercure.db'), 'path "/data/mercure.db"'));
assert(str_contains(mercureTransport('bolt://relative.db', '/ignored'), 'path "relative.db"'));
assert(str_contains(mercureTransport('bolt://host/data/db', '/ignored'), 'path "/data/db"'));
assert(str_contains(mercureTransport('bolt:///data/custom.db?size=42&bucket_name=history&cleanup_frequency=0.5', '/ignored'), "path \"/data/custom.db\"\nbucket_name \"history\"\nsize \"42\"\ncleanup_frequency \"0.5\""));
assert(mercureTransport('local://localhost', '/ignored') === 'transport local');
try {
    mercureTransport('unsupported://example', '/ignored');
    throw new RuntimeException('Unsupported transport was accepted');
} catch (InvalidArgumentException) {
}
