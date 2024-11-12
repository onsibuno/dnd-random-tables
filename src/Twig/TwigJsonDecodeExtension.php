<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

// class TwigJsonDecodeExtension extends AbstractExtension {

//         public function getFilters()
//         {
//             return [new TwigFilter('json_decode', "json_decode()")];
//         }

//         public function json_decode($str) {
//             return json_decode($str);
//         }
// }

/**
 * Class for Json to array.
 */
class TwigJsonDecodeExtension extends AbstractExtension {

    /**
     * Get Filters function.
     */
    public function getFilters(): array {
      return [
        new TwigFilter('decode_json', [$this, 'jsonDecode']),
      ];
    }
  
    /**
     * The actual implementation of the filter.
     */
    // public function jsonDecode($context): array {
    //   // $trimmed = trim($context, "\"");
    //   // return json_decode($context, TRUE);
    //   return json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $context), true );

    // }
    public function jsonDecode($context): mixed {
      // $trimmed = trim($context, "\"");
      return json_decode($context);

    }
  }
  