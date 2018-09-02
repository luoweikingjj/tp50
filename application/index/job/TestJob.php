<?php

namespace app\index\job;

use think\queue\Job;

class TestJob {

    public function fire(Job $job, $data) {
        $isJobDone = $this->doTheJob($data);
        if (!$isJobDone) {
            if ($job->attempts() > 3) {
                //通过这个方法可以检查这个任务已经重试了几次了
                trace("Job has been retried more than 3 times!", 'queue');
                //$job->delete();
            }

            //未执行成功，任务未被删除，自动会进行消息重发
        } else {
            //如果任务执行成功， 记得删除任务
            $job->delete();
            trace("Job has been deleted", 'queue');
        }
    }

    protected function doTheJob($data) {
        return false;
        // 根据消息中的数据进行实际的业务处理...
        trace("Job Started. job Data is: ".json_encode($data), 'queue');
        trace("Job is Fired at " . date('Y-m-d H:i:s'), 'queue');
        trace("Job is Done!", 'queue');

        return true;
    }

    public function failed($data) {
        trace("Job is Failed at " . date('Y-m-d H:i:s'), 'queue');
        trace("Job Failed. job Data is: ".json_encode($data), 'queue');
    }
}