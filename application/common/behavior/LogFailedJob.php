<?php

namespace app\common\behavior;

use think\queue\Job;

class LogFailedJob {

    public function run(Job $job) {
        $failedJobLog = [
            'handlerClassName' => $job->getName(),
            'queue'            => $job->getQueue(),
            'jobData'          => $job->getRawBody(),
            'attempts'         => $job->attempts(),
        ];
        trace(json_encode($failedJobLog), 'failed_job');
    }
}