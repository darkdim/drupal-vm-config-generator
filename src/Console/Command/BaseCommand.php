<?php

namespace DrupalVmConfigGenerator\Console\Command;

use DrupalVmConfigGenerator\Console\Style\DrupalVmStyle;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;

abstract class BaseCommand extends Command
{
    /**
     * @var InputInterface
     */
    protected $input;

    /**
     * @var OutputInterface
     */
    protected $output;

    /**
     * @var Filesystem
     */
    protected $fs;

    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * @var string
     */
    protected $projectDir;

    /**
     * @var DrupalVmStyle
     */
    protected $io;

    /**
     * {@inheritdoc}
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->projectDir = getcwd();

        $this->input = $input;
        $this->output = $output;

        $this->fs = new Filesystem();

        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../../resources/Templates');
        $this->twig = new \Twig_Environment($loader);

        $this->io = new DrupalVmStyle($input, $output);
    }
}
