<?php

namespace Tdwesten\OcrSpace\Enums;

enum ParsingType: string
{
    case Binary = 'binary';
    case Base64 = 'base64';
    case File = 'file';
    case Url = 'url';
}
