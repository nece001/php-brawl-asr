<?php

namespace Nece\Brawl\Asr;

use Nece\Brawl\ResultAbstract;

/**
 * 语音识别任务查询结果
 *
 * @Author nece001@163.com
 * @DateTime 2023-07-30
 */
class AsrTaskResult extends ResultAbstract
{
    private $task_id;

    /**
     * 转为数组
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-30
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'request_id' => $this->request_id,
            'task_id' => $this->task_id,
        );
    }

    /**
     * 获取任务ID
     */
    public function getTaskId()
    {
        return $this->task_id;
    }

    /**
     * 设置任务ID
     *
     * @return self
     */
    public function setTaskId($task_id)
    {
        $this->task_id = $task_id;

        return $this;
    }
}
