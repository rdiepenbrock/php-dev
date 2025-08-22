<?php

namespace App;

use Aws\S3\S3Client;
use Exception;

class Storage
{
    /**
     * @throws Exception
     */
    public static function resolve(): FileStorage
    {
        $storageMethod = $_ENV['FILE_STORAGE'];

        if ($storageMethod === 'local') {
            return new LocalStorage();
        } else if ($storageMethod === 's3') {
            $client = new S3Client([
                'version' => 'latest',
                'region'  => 'us-east-2',
                'credentials' => [
                    'key' => $_ENV['S3_KEY'],
                    'secret' => $_ENV['S3_SECRET'],
                ]
            ]);

            return new S3Storage($client, $_ENV['S3_BUCKET']);
        }

        throw new Exception('Invalid storage method');
    }
}