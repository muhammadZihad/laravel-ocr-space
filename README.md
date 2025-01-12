![laravel-ocr-space-social-card](https://github.com/user-attachments/assets/4333e2bc-1f5c-401f-9646-76bb57314057)

# Laravel OCR Space

Laravel OCR Space is a package that allows you to use the [OCR.Space](https://ocr.space/ocrapi) API in your Laravel application for Optical Character Recognition (OCR).

## Installation

You can install the package via composer:

```bash
composer require cdsmiths/laravel-ocr-space
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Codesmiths\LaravelOcrSpace\LaravelOcrSpaceServiceProvider" --tag="config"
```

## Usage

### Get a free Ocr.Space api key

You can get a free api key from [ocr.space](https://ocr.space/ocrapi/freekey). This key is required to use the package.

### Parsing an Image file

```php
use Codesmiths\LaravelOcrSpace\OcrSpaceOptions;
use Codesmiths\LaravelOcrSpace\OcrSpace;

$filePath = 'path/to/image.jpg';
$service = new OcrSpace;

$result = $service->parseImageFile(
    $filePath,
    OcrSpaceOptions::make(),
);

dd($result);
```

### Parsing an Image URL

```php
use Codesmiths\LaravelOcrSpace\OcrSpaceOptions;
use Codesmiths\LaravelOcrSpace\OcrSpace;

$imageUrl = 'https://example.com/image.jpg';

$options = new \Codesmiths\LaravelOcrSpace\OcrSpaceOptions();
$service = new OcrSpace;

$result = $service->parseImageUrl(
    $imageUrl,
    OcrSpaceOptions::make(),
);

dd($result);
```

### Parsing an base64 encoded image

```php
use Codesmiths\LaravelOcrSpace\OcrSpaceOptions;
use Codesmiths\LaravelOcrSpace\OcrSpace;

$base64Image = 'base64-encoded-image';
$service = new OcrSpace;

$result = $service->parseBase64Image(
    base64Image: $base64Image,
    options: OcrSpaceOptions::make(),
);

dd($result);
```

### Parsing an binary image

```php

use Codesmiths\LaravelOcrSpace\OcrSpaceOptions;
use Codesmiths\LaravelOcrSpace\OcrSpace;

$binaryImage = file_get_contents('path/to/image.jpg');
$service = new OcrSpace;

// File type is required for binary images
$options = OcrSpaceOptions::make()
    ->fileType('image/jpg');

$result = $service->parseBinaryImage(
    $binaryImage,
    $options,
);

dd($result);
```

### Parsing with parseImage method

```php
use Codesmiths\LaravelOcrSpace\OcrSpaceOptions;
use Codesmiths\LaravelOcrSpace\OcrSpace;
use Codesmiths\LaravelOcrSpace\Enums\InputType;

$filePath = 'path/to/image.jpg';
$service = new OcrSpace;

$result = $service->parseImage(
    InputType::File
    $filePath,
    OcrSpaceOptions::make(),
);

dd($result);
```

### Options

You can pass options to the `parseImageFile`, `parseImageUrl`, `parseBase64Image`, `parseBinaryImage` and `parseImage` methods.

```php
use Codesmiths\LaravelOcrSpace\OcrSpaceOptions;
use Codesmiths\LaravelOcrSpace\Enums\Language;
use Codesmiths\LaravelOcrSpace\Enums\OcrSpaceEngine;

// All possible options
$options = OcrSpaceOptions::make()
        ->language(Language::English)
        ->overlayRequired(true)
        ->fileType('image/png')
        ->detectOrientation(true)
        ->isCreateSearchablePdf(true)
        ->isSearchablePdfHideTextLayer(true)
        ->scale(true)
        ->isTable(true)
        ->OCREngine(OcrSpaceEngine::Engine1);

```

# License / Credits

This package our Codesmiths is not affiliated with [OCR.Space](https://ocr.space/ocrapi) and is not an official package. It is a wrapper around the OCR.Space API.

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
