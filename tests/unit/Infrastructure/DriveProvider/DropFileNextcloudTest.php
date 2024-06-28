<?php

namespace DriveManager\Tests\Infrastructure\DriveProvider;

use DriveManager\Infrastructure\DriveProvider\DropFileNextcloud;
use DriveManager\Application\Service\DropFile\Exceptions\FailUploadingFileException;
use DriveManager\Domain\Model\File\File;
use DriveManager\Domain\Model\File\FileContent;
use DriveManager\Domain\Model\File\FileName;
use DriveManager\Domain\Model\File\Path;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class DropFileNextcloudTest extends TestCase
{
    private const UPLOAD_FILE_PATH = 'way/to/upload/files/on/nexcloud';
    private const BASE_URI = 'https://url/to/tests';
    private DropFileNextcloud $nextcloudClient;
    /**
     * @var array<int, array{method: string, url: string, options: array<string, mixed>}>
     */
    private array $capturedRequests = [];

    protected function setUp(): void
    {
        $this->nextcloudClient = new DropFileNextcloud(
            self::BASE_URI,
        );
    }

    public function testDropFileFail(): void
    {
        $this->expectException(FailUploadingFileException::class);
        $this->expectExceptionMessageMatches('/Download failed : error \d{3}/');

        $client = new MockHttpClient(new MockResponse('', ['http_code' => 400]));
        $this->nextcloudClient = new DropFileNextcloud(
            self::BASE_URI,
            $client,
        );
        $file = new File(new FileName('testfile.txt'), new Path('Bad/link/testfile.txt'));

        $this->nextcloudClient->dropFile($file);
    }

    public function testDropFileSuccess(): void
    {
        $path = new Path(self::UPLOAD_FILE_PATH . "hello.txt");
        $file = new File(new FileName('hello.txt'), $path, new FileContent("Hello"));
        $responses = [
            new MockResponse('', ['http_code' => 200]),  // Response for the PUT request
            new MockResponse('', ['http_code' => 200]),  // Response for the HEAD request
        ];
        $client = new MockHttpClient($responses);
        $this->nextcloudClient = new DropFileNextcloud(
            self::BASE_URI,
            $client,
        );

        $this->nextcloudClient->dropFile($file);

        $this->assertTrue($this->nextcloudClient->isFileExists($file));
    }

    public function testDropBody(): void
    {
        $file = new File(new FileName('hello.txt'));
        $client = new MockHttpClient(function ($method, $url, $options) {
            $this->capturedRequests[] = ['method' => $method, 'url' => $url, 'options' => $options];
            return new MockResponse('', ['http_code' => 200]);
        });
        $this->nextcloudClient = new DropFileNextcloud(
            self::BASE_URI,
            $client,
        );

        $this->nextcloudClient->dropFile($file);
        $lastRequest = end($this->capturedRequests);

        if (
            $lastRequest !== false &&
            is_array($lastRequest['options']) &&
            array_key_exists('body', $lastRequest['options'])
        ) {
            $this->assertEquals($file->getContent(), $lastRequest['options']['body']);
        } else {
            $this->fail('No valid request captured or missing "options" or "body" key.');
        }
    }

    public function testIsFileExistsTrue(): void
    {
        $client = new MockHttpClient(new MockResponse('', ['http_code' => 200]));
        $this->nextcloudClient = new DropFileNextcloud(
            self::BASE_URI,
            $client,
        );

        $file = new File(new FileName('testfile.txt'));

        $existingFile = $this->nextcloudClient->isFileExists($file);

        $this->assertTrue($existingFile);
    }

    public function testIsFileExistsFalse(): void
    {
        $client = new MockHttpClient(new MockResponse('', ['http_code' => 400]));
        $this->nextcloudClient = new DropFileNextcloud(
            self::BASE_URI,
            $client,
        );

        $file = new File(new FileName('noneExistingFile.txt'), new Path('noneExistingDir/'));

        $existingFile = $this->nextcloudClient->isFileExists($file);

        $this->assertFalse($existingFile);
    }

    public function testReadAFile(): void
    {
        $file = new File(new FileName('hello.txt'), new Path(), new FileContent("Hello"));
        $mockResponse = new MockResponse($file->getContent());
        $client = new MockHttpClient($mockResponse);
        $this->nextcloudClient = new DropFileNextcloud(
            self::BASE_URI,
            $client,
        );

        $fileContent = $this->nextcloudClient->readFile($file);

        $this->assertEquals('Hello', $fileContent);
    }

    public function testConstructorWithClientNotNull(): void
    {
        $mockClient = $this->createMock(HttpClientInterface::class);
        $_ENV["NEXTCLOUD_CREDENTIALS"] = "test@example.com password";
        $dropFileNextcloud = new DropFileNextcloud(self::BASE_URI, $mockClient);

        $this->assertInstanceOf(DropFileNextcloud::class, $dropFileNextcloud);
    }
}
