<?php

/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Console\Command\DeliveryService;

use Exception;
use Magento\Framework\Console\Cli;
use Magento\Framework\Exception\LocalizedException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

class Create extends Command
{
    private const EXAMPLE_REQUIRED_OPTION = 'example_required_option';

    private const EXAMPLE_OPTIONAL_OPTION = 'example_optional_option';

    private const EXAMPLE_NONE_OPTION = 'example_none_option';

    private const EXAMPLE_ARGUMENT = 'example_argument';

    /**
     * @var InputInterface
     */
    private InputInterface $input;

    /**
     * @var OutputInterface
     */
    private OutputInterface $output;

    /**
     * Initialization of the command.
     */
    protected function configure(): void
    {
        $this->addOption(
            self::EXAMPLE_REQUIRED_OPTION,
            null,
            InputOption::VALUE_REQUIRED,
            self::EXAMPLE_REQUIRED_OPTION
        );
        $this->addOption(
            self::EXAMPLE_OPTIONAL_OPTION,
            null,
            InputOption::VALUE_OPTIONAL,
            self::EXAMPLE_OPTIONAL_OPTION
        );
        $this->addOption(
            self::EXAMPLE_NONE_OPTION,
            null,
            InputOption::VALUE_NONE,
            self::EXAMPLE_NONE_OPTION
        );
        $this->addArgument(
            self::EXAMPLE_ARGUMENT,
            InputArgument::OPTIONAL,
            'Name of the module'
        );
        $this->setName('preparingToCertification:deliveryService:create');
        $this->setDescription('Example console command');
        parent::configure();
    }

    /**
     * @inheritDoc
     * @noinspection PhpMissingParentCallCommonInspection
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->initializeProperties($input, $output);

        try {
            $this->checkRequireOptionAndArguments();
            $this->outputOptionInfo((string)$input->getOption(self::EXAMPLE_REQUIRED_OPTION));
            $this->outputOptionInfo((string)$input->getOption(self::EXAMPLE_OPTIONAL_OPTION));
            $this->doSomethingIfOptionNoneExist();
            $output->writeln('<info>Success message.</info>');
            $output->writeln('<comment>Some comment.</comment>');
            return Cli::RETURN_SUCCESS;
        } catch (Exception $exception) {
            $output->writeln(
                sprintf(
                    '<error>%s</error>',
                    $exception->getMessage()
                )
            );
            return Cli::RETURN_FAILURE;
        }
    }

    /**
     * @return void
     *
     * @throws LocalizedException
     */
    private function checkRequireOptionAndArguments(): void
    {
        if (!$this->input->getOption(self::EXAMPLE_REQUIRED_OPTION)) {
            throw new LocalizedException(
                __(sprintf('The option %s is required.', self::EXAMPLE_REQUIRED_OPTION))
            );
        }
    }

    /**
     * @param string $optionValue
     * @return void
     */
    private function outputOptionInfo(string $optionValue): void
    {
        $this->output->writeln('<info>Provided optional option name is `' . $optionValue . '`</info>');
    }

    /**
     * @return void
     */
    private function doSomethingIfOptionNoneExist(): void
    {
        if (!$this->input->getOption(self::EXAMPLE_NONE_OPTION)) {
            return;
        }
        $this->output->writeln('<info>None option has been called</info>');
    }

    /**
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    private function initializeProperties(InputInterface $input, OutputInterface $output): void
    {
        $this->input = $input;
        $this->output = $output;
    }
}
