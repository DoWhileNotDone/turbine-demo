<?php declare(strict_types=1);

namespace Demo\Tests\Unit\Outcomes;

use PHPUnit\Framework\TestCase;
use Demo\Validate\ValidateIdPresent;

final class ValidateIdPresentTest extends TestCase
{
    private ValidateIdPresent $subject;

    protected function setUp(): void
    {
        $this->subject = new ValidateIdPresent();
    }

    /**
     * @dataProvider param_provider
     *
     * @return void
     */
    public function testParamsThrowExceptionIfIdIsMissing(bool $throws, array $params): void
    {
        if ($throws === true) {
            $this->expectException(\InvalidArgumentException::class);
            $this->expectExceptionMessage('id not present in get request');
        }

        $this->assertNull(
            call_user_func($this->subject, $params)
        );
    }

    public function param_provider(): array
    {
        return [
            'empty param array' => [
                true,
                [],
            ],
            'has id' => [
                false,
                [
                    'id' => 1
                ],
            ],            
        ];
    }
}
