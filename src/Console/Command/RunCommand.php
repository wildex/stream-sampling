<?php
/**
 * @class \Console\Command\Run
 */

namespace Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use \Sampler\ReservoirSampler;
use \Stream\StreamFactory;

class RunCommand extends Command
{

    const DEFAULT_STREAM_TYPE   = 'RND';

    const DEFAULT_SAMPLING_SIZE = 10;

    private $streamTypes = [
        'RND',
        'STDIN',
        'URL'
    ];

    protected function configure()
    {
        $this
            ->setName('run')
            ->setDescription('Run stream sampling. Stream type can be\n
                              set with --streamType option\n
                              (to see possible values, check option description);\n
                              sampling size is set with --samplingSize option;\n
                              for url stream one should provide proper URL with --url option.')
            ->addOption(
                'streamType',
                null,
                InputOption::VALUE_OPTIONAL,
                'Sets stream type, possible values: ' . implode(',', $this->streamTypes),
                self::DEFAULT_STREAM_TYPE
            )
            ->addOption(
                'samplingSize',
                null,
                InputOption::VALUE_OPTIONAL,
                'Provide sampling size',
                self::DEFAULT_SAMPLING_SIZE
            )
            ->addOption(
                'url',
                null,
                InputOption::VALUE_OPTIONAL,
                'For URL stream, please provide URL'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $streamType = strtoupper($input->getOption('streamType'));

        if(!in_array($streamType, $this->streamTypes)) {
            $output->writeln('Invalid stream type');
            return;
        }

        $stream = StreamFactory::getStream($streamType, $input->getOption('url'));
        $sampler = new ReservoirSampler($stream);

        $result = $sampler->sample((int)$input->getOption('samplingSize'));

        $output->writeln('Sampling result:');
        $output->writeln(str_repeat('*', 10));
        $output->writeln($result);
    }
}