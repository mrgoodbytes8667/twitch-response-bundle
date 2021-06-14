<?php

namespace Bytes\TwitchResponseBundle\Tests\Request;

use Bytes\TwitchResponseBundle\Request\AbstractSignature;
use Bytes\TwitchResponseBundle\Request\EventSubSignature;
use Bytes\TwitchResponseBundle\Request\WebhookSignature;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Component\HttpFoundation\HeaderBag;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class WebhookSignatureTest
 * @package Bytes\TwitchResponseBundle\Tests\Request
 */
class WebhookSignatureTest extends TestCase
{

    /**
     *
     */
    const TWITCH_HUB_SECRET = 'abc123';

    /**
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function testValidateHubSignature()
    {
        $content = 'this is a test';

        $headers = $this->buildHeaders($content);

        $signature = new WebhookSignature(self::TWITCH_HUB_SECRET);
        $this->assertTrue($signature->validateHubSignature($headers, $content, false));
        $this->assertFalse($signature->validateHubSignature($headers, 'non-matching-content', false));
        $this->assertTrue($signature->validateHubSignature($headers, $content, true));

        $this->expectException(AccessDeniedHttpException::class);
        $signature->validateHubSignature($headers, 'non-matching-content', true);
    }

    /**
     * @param string $content
     * @return HeaderBag
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    protected function buildHeaders(string $content): HeaderBag
    {
        $hash = hash_hmac('sha256', $content, self::TWITCH_HUB_SECRET);

        $response = new MockResponse($content, [
            'response_headers' => [
                WebhookSignature::SIGNATURE_FIELD => 'sha256=' . $hash
            ]
        ]);
        return new HeaderBag($response->getHeaders());
    }

    /**
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function testNoSignatureHeader()
    {
        $content = 'this is a test';

        $headers = $this->buildHeaders($content);
        $headers->remove(WebhookSignature::SIGNATURE_FIELD);

        $signature = new WebhookSignature(self::TWITCH_HUB_SECRET);

        $this->assertFalse($signature->validateHubSignature($headers, $content, false));
        $this->expectException(AccessDeniedHttpException::class);
        $signature->validateHubSignature($headers, $content, true);
    }

    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
        if (!(extension_loaded('hash'))) {
            $this->markTestSkipped('The hash extension is not available.');
        }
    }
}