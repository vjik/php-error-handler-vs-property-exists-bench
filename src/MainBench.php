<?php

declare(strict_types=1);

namespace Vjik\PhpErrorHandlerVsPropertyExistsBench;

/**
 * @Iterations(10)
 * @Revs(1000)
 */
final class MainBench
{
    private array $cars = [];
    private array $collector = [];

    public function setData(): void
    {
        $this->cars = [];
        for ($i = 1; $i < 1000; $i++) {
            $this->cars[] = new Car($i);
        }
    }

    /**
     * @BeforeMethods("setData")
     */
    public function benchPure(): void
    {
        $this->collector = [];
        $key = 'id';
        foreach ($this->cars as $car) {
            $this->collector[] = $car->$key;
        }
    }

    /**
     * @BeforeMethods("setData")
     */
    public function benchErrorHandler(): void
    {
        $this->collector = [];
        $key = 'id';
        foreach ($this->cars as $car) {
            set_error_handler(
                static function (int $errorNumber, string $errorString): bool {
                    return false;
                }
            );
            $this->collector[] = $car->$key;
            restore_error_handler();
        }
    }

    /**
     * @BeforeMethods("setData")
     */
    public function benchPropertyExists(): void
    {
        $this->collector = [];
        $key = 'id';
        foreach ($this->cars as $car) {
            if (property_exists($car, $key)) {
                $this->collector[] = $car->$key;
            }
        }
    }
}
