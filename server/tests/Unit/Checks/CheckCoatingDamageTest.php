<?php declare(strict_types=1);

namespace Demo\Tests\Unit\Checks;

use PHPUnit\Framework\TestCase;
use Demo\Checks\CheckCoatingDamage;

final class CheckCoatingDamageTest extends TestCase
{
    private CheckCoatingDamage $subject;

    protected function setUp(): void
    {
        $this->subject = new CheckCoatingDamage();
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
