<?php

namespace App\Command;
use App\Constants;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\Service\TodoListService\TodoListService;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\TodoPlan;

class ToDoPlanningCommand extends Command
{
    private $todoPlan;
    private $em;
    public function __construct(TodoListService $todoListService, EntityManagerInterface $em)
    {
        $this->todoPlan = $todoListService;
        $this->em = $em;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setName('create-todo')
             ->setDescription('Creates a new todo plan.')
             ->setHelp('This command allows you to todo plan');
        $this->addArgument('provider', InputArgument::REQUIRED, 'The name of provider.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if(in_array($input->getArgument('provider'),Constants::$providerList)){
            try {
                $todoPlan = $this->todoPlan->setProvider("TrProvider");
                $todoPlanEntity = new TodoPlan();
                $todoPlanEntity->setJson($todoPlan);
                $this->em->persist($todoPlanEntity);
                $this->em->flush();
                $output->writeln("Todo plan complated");
            } catch (\Exception $e) {
                $output->writeln($e->getMessage());
            }
        }else{
            $output->writeln("Available parameter: ".implode(", ", Constants::$providerList));
        }

    }


}