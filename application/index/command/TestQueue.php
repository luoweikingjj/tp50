<?php

namespace app\index\command;

use app\common\constant\QueueConst;
use app\common\model\User;
use think\console\Command;
use think\console\Input;
use think\console\Output;

class TestQueue extends Command
{
    protected function configure()
    {
        $this->setName('test_queue')->setDescription('Test queue');
    }

    protected function execute(Input $input, Output $output)
    {
        $user = User::get(1);
        queue('app\index\job\TestJob', $user, 0, QueueConst::QUEUE_NAME_USER);
    }
}