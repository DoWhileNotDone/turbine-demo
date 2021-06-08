<?php declare(strict_types=1);

namespace Demo\Tests\Unit\Outcomes;

use PHPUnit\Framework\TestCase;
use Demo\Outcomes\IsModThree;

final class IsModThreeTest extends TestCase
{
    private IsModThree $subject;

    protected function setUp(): void
    {
        $this->subject = new IsModThree();
    }

    /**
     * @dataProvider number_provider
     *
     * @return void
     */
    public function testCorrectValuesReturned(int $number, string $expected): void
    {
        $this->assertEquals(
            $expected,
            call_user_func($this->subject, $number)
        );
    }

    public function number_provider(): array
    {
        return [
            '1 is not mod three' => [
                1,
                '',
            ],
            '3 is mod three' => [
                3,
                'cd',
            ],
            '5 is not mod three' => [
                5,
                '',
            ],
            '9 is mod three' => [
                9,
                'cd',
            ],
        ];
    }
}
