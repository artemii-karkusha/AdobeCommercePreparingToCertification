<?php

/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Console\Command;

use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Api\EmailNotifierInterface;
use Magento\Framework\App\Area;
use Magento\Framework\Console\Cli;
use Magento\Framework\Exception\LocalizedException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\Exception\MailException;
use Magento\Framework\App\State;

class SendEmail extends Command
{
    /**
     * Console command options
     */
    private const TEMPLATE_IDENTIFIER_OPTION = 'template_identifier';
    private const SEND_TO_EMAIL_OPTION = 'send_to_email';
    private const STORE_CODE_OPTION = 'store_code';

    /**
     * @param EmailNotifierInterface $emailNotifier
     * @param State $state
     * @param array $options
     * @param string|null $name
     */
    public function __construct(
        private EmailNotifierInterface $emailNotifier,
        private State $state,
        private array $options = [],
        string $name = null
    ) {
        parent::__construct($name);
    }

    /**
     * Initialization of the command.
     */
    protected function configure(): void
    {
        $this->initializeOptions();
        $this->setName('preparingToCertification:email:send');
        $this->setDescription('Console command to send email');
        parent::configure();
    }

    /**
     * CLI command description.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     * @noinspection PhpMissingParentCallCommonInspection
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $this->state->setAreaCode(Area::AREA_FRONTEND);
            $this->checkRequireOptions($input);
            $this->emailNotifier->sendEmailTemplate(
                (string)$input->getOption(self::TEMPLATE_IDENTIFIER_OPTION),
                (string)$input->getOption(self::SEND_TO_EMAIL_OPTION),
                (string)$input->getOption(self::STORE_CODE_OPTION)
            );
        } catch (MailException|LocalizedException $exception) {
            $output->writeln(
                sprintf(
                    '<error>%s</error>',
                    $exception->getMessage() .
                    PHP_EOL .
                    $exception->getTraceAsString()
                )
            );
            return Cli::RETURN_FAILURE;
        }

        return Cli::RETURN_SUCCESS;
    }

    /**
     * Checks required option
     *
     * @param InputInterface $input
     * @return void
     *
     * @throws LocalizedException
     */
    private function checkRequireOptions(InputInterface $input): void
    {
        foreach ($this->getRequiredOptionsNames() as $optionName) {
            if ($input->getOption($optionName)) {
                continue;
            }

            throw new LocalizedException(
                __(sprintf('The option %s is required.', $optionName))
            );
        }
    }

    /**
     * Initialize options from DI
     *
     * @return void
     */
    private function initializeOptions(): void
    {
        foreach ($this->options as $option) {
            if (!$option['optionName'] || !$option['mode'] || !$option['optionDescription']) {
                continue;
            }

            $this->addOption(
                $option['optionName'],
                null,
                $option['mode'],
                $option['optionDescription']
            );
        }
    }

    /**
     * Get names of required options
     *
     * @return string[]
     */
    private function getRequiredOptionsNames(): array
    {
        $namesOfRequriedOptions = [];
        foreach ($this->options as $option) {
            if (!$option['optionName'] || !$option['mode'] || !$option['optionDescription']) {
                continue;
            }

            $namesOfRequriedOptions[] = $option['optionName'];
        }

        return $namesOfRequriedOptions;
    }

}
