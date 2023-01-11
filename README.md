# PHP `set_error_handler` VS `property_exists`

Benchmark running:

```shell
vendor/bin/phpbench run --report=aggregate
```

## Results

With PHP version 8.1.14, xdebug ❌, opcache ❌:

```
+-----------+---------------------+-----+------+-----+-----------+-----------+--------+
| benchmark | subject             | set | revs | its | mem_peak  | mode      | rstdev |
+-----------+---------------------+-----+------+-----+-----------+-----------+--------+
| MainBench | benchPure           |     | 1000 | 10  | 678.168kb | 48.871μs  | ±2.23% |
| MainBench | benchErrorHandler   |     | 1000 | 10  | 678.184kb | 194.169μs | ±1.57% |
| MainBench | benchPropertyExists |     | 1000 | 10  | 678.184kb | 103.232μs | ±4.23% |
+-----------+---------------------+-----+------+-----+-----------+-----------+--------+
```

With PHP version 8.2.1, xdebug ❌, opcache ❌:

```
+-----------+---------------------+-----+------+-----+-----------+-----------+--------+
| benchmark | subject             | set | revs | its | mem_peak  | mode      | rstdev |
+-----------+---------------------+-----+------+-----+-----------+-----------+--------+
| MainBench | benchPure           |     | 1000 | 10  | 673.696kb | 48.167μs  | ±1.79% |
| MainBench | benchErrorHandler   |     | 1000 | 10  | 673.712kb | 196.957μs | ±3.57% |
| MainBench | benchPropertyExists |     | 1000 | 10  | 673.712kb | 126.633μs | ±5.15% |
+-----------+---------------------+-----+------+-----+-----------+-----------+--------+
```

## License

The package is free software. It is released under the terms of the BSD License.
Please see [`LICENSE`](./LICENSE.md) for more information.
