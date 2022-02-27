<?php namespace Console;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console;

class Command extends SymfonyCommand
{
    
    public function __construct()
    {
        parent::__construct();
    }
    protected function calculateTemperature(InputInterface $input, OutputInterface $output)
    {
        $output -> writeln([
            'Konwerter jednostek temperatury',
            '-------------------------------',
        ]);
        
        $scale_from = $input -> getArgument('scale_from');
        $scale_from_class_name = 'Console\\'.$input -> getArgument('scale_from');
        $scale_to = $input -> getArgument('scale_to');
        $scale_to_class_name = 'Console\\'.$scale_to;
        $value_t = $input -> getArgument('value_t');
        $res = 0.0;
        $msg = '';

        if(class_exists($scale_from_class_name))
        {
            if(class_exists($scale_to_class_name))
            {
                $scale = new $scale_from_class_name($scale_from, $scale_to, $value_t);
                if($scale->calculate())
                {
                    $res = $scale->getResult();
                    $msg = $scale->getValue().' stopni '.$scale_from.'\'a to '.$res.' stopni '.$scale_to.'\'a';
                }
                else
                {
                    $msg = $scale->getErrorMsg();
                }
            }
            else
            {
                $msg = 'Skala docelowa "'.$scale_to.'" nie jest obslugiwana';
            }
        }
        else
        {
            $msg = 'Skala "'.$scale_from.'" nie jest obslugiwana';
        }
        
        $output -> write($msg);
    }
}