<?php declare(strict_types=1);

namespace JustSteveKing\Laravel\Envoyer\SDK\Resources;

class Server extends EnvoyerResource
{
    protected string $path = 'servers';

        public function refresh(int $identifier): ?object
    {
        $this->uri()->addPath(
            "{$this->uri()->path()}/{$identifier}/refresh"
        );

        try {
            $response = $this->http()->post(
                $this->uri()->toString(),
                [],
                $this->strategy()->getHeader($this->authHeader)
            );
            // @codeCoverageIgnoreStart
        } catch (\Exception $e) {
            throw $e;
        }
        // @codeCoverageIgnoreEnd

        return \json_decode(
            $response->getBody()->getContents(),
            false
        );
    }
}
