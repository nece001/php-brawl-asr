<?php

namespace Nece\Brawl\Asr;

/**
 * ASR接口定义
 *
 * @Author nece001@163.com
 * @DateTime 2023-07-30
 */
interface AsrInterface
{
    /**
     * 语音数据短语音识别（一句话识别）
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-30
     *
     * @param string $data
     * @param string $format
     *
     * @return AsrResult
     */
    public function shortAudioFromData(string $data, string $format): AsrResult;

    /**
     * 语音 URL短语音识别（一句话识别）
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-30
     *
     * @param string $audio_url
     *
     * @return AsrResult
     */
    public function shortAudioFromUrl(string $audio_url): AsrResult;

    /**
     * 创建识别任务（录音文件识别请求）
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-30
     *
     * @param string $audio_url
     *
     * @return AsrTaskResult 任务结果
     */
    public function createTask(string $audio_url): AsrTaskResult;

    /**
     * 识别任务结果查询
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-30
     *
     * @param string $task_id
     *
     * @return DescribeTaskResult
     */
    public function describeTask($task_id): DescribeTaskResult;
}
