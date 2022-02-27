<?php namespace Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Command;


class ScaleCommand extends Command
{
    
    public function configure()
    {
        $this -> setName('convert')
            -> setDescription('Konwerter jednostek temperatur')
            -> setHelp('Komenda pozwala na przeliczenie jednostek miar ([jednostka poczatkowa] [jednostka koncowa] [wartosc temperatury])')
            -> addArgument('scale_from', InputArgument::REQUIRED, 'Z jakiej jedostki temperatury...');
        $this-> addArgument('scale_to', InputArgument::REQUIRED, 'Do jakiej jednostki temperatury...');
        $this-> addArgument('value_t', InputArgument::REQUIRED, 'Wartosc temperatury');
    }

    public function execute(InputInterface $input, OutputInterface $output) :int
    {
        if($this -> calculateTemperature($input, $output))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}