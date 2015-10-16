## Console stream sampling tool

Uses Reservoir stream sampling algorithm (see links below)

Can work with 3 different stream types:
* STDIN input stream
* Randomly generated stream
* Stream, aquired from URL

-----

[![Build Status](https://travis-ci.org/wildex/stream-sampling.svg?branch=master)](https://travis-ci.org/wildex/stream-sampling)

### Usage

By default application runs in "random generated stream" mode

```bash
$ bin/sampling
```

To run application in other modes, you can use

```bash
$ bin/sampling run
```

And one of options below.

#### Options

| Name | Description |
| ------------ | --------------------------- |
| --streamType | Type of stream, can be one of: RND, STDIN, URLStream |
| --samplingSize | Integer sample size |
| --url | Used only for 'URL streaming' mode |

Example for url run

```bash
$ bin/sampling run --streamType URL --url https://www.random.org/integers/?num=10&min=1&max=6&col=1&base=10&format=plain&rnd=new
```

Example for STDIN run. For user interactive run you can type any amount of values
and type "exit", when you done. Or just pipe values from another app.

```bash
$ bin/sampling run --streamType STDIN
```

More info on stream sampling:
* [Stream sampling for Frequency Cap Statistics](http://arxiv.org/pdf/1502.05955v2.pdf)
* [Reservoir algorithm](https://en.wikipedia.org/wiki/Reservoir_sampling)

