<?php

declare(strict_types=1);

namespace App\Services\Utilities;

use App\Services\Utilities\Interfaces\ParserInterface;
use Illuminate\Support\Arr;
use SimpleXMLElement;

final class XmlParser implements ParserInterface
{
    /**
     * @throws \Exception
     */
    public function parse(array $data): bool|string
    {
        $xml = new SimpleXMLElement('<data/>');

        foreach (Arr::get($data, 'data') as $contents) {
            foreach ($contents as $key => $value) {
                if ($value instanceof \stdClass === true || \is_array($value) === true) {
                    \array_walk_recursive($value, [$xml, 'addChild']);

                    continue;
                }

                $xml->addChild($key, $value);
            }

        }

        return $xml->asXML();
    }
}
