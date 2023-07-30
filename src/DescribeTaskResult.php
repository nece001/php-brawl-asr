<?php

namespace Nece\Brawl\Asr;

use Nece\Brawl\ResultAbstract;

class DescribeTaskResult extends ResultAbstract
{

    // 任务状态码，0：任务等待，1：任务执行中，2：任务成功，3：任务失败。
    const STATUS_WAITING = 0;
    const STATUS_DOING = 1;
    const STATUS_SUCCESS = 2;
    const STATUS_FAILED = 3;

    private $task_id;
    private $status;
    private $error;
    private $duration;
    private $result;
    private $detail = array();

    /**
     * 转数组
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
            'status' => $this->status,
            'error' => $this->error,
            'duration' => $this->duration,
            'result' => $this->result,
            'detail' => $this->detail,
        );
    }

    /**
     * 获取任务ID
     * 
     * @return string
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

    /**
     * 获取状态码
     * 
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * 设置状态码
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * 获取错误信息
     * 
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * 设置错误信息
     *
     * @return self
     */
    public function setError($error)
    {
        $this->error = $error;

        return $this;
    }

    /**
     * 获取音频时长(秒)
     * 
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * 设置音频时长(秒)
     *
     * @return self
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * 获取识别结果
     * 
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * 设置识别结果
     *
     * @return self
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * 获取识别结果详情
     * 
     * @return array
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * 添加识别结果详情
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-30
     *
     * @param string $FinalSentence 单句最终识别结果
     * @param string $SliceSentence 单句中间识别结果，使用空格拆分为多个词
     * @param integer $StartMs 单句开始时间（毫秒）
     * @param integer $EndMs 单句结束时间（毫秒）
     * @param float $SpeechSpeed 单句语速，单位：字数/秒
     * @param integer $SpeakerId 声道或说话人 Id
     * @param integer $SilenceTime 本句与上一句之间的静音时长
     * @param array $Words 单句中词详情
     * @param float $EmotionalEnergy 情绪能量值
     * @param array $EmotionType 情绪类型
     *
     * @return void
     */
    public function addDetail(string $FinalSentence, string $SliceSentence, int $StartMs, int $EndMs, float $SpeechSpeed, int $SpeakerId, int $SilenceTime, array $Words, float $EmotionalEnergy, array $EmotionType)
    {
        $this->detail[] = array(
            'final_sentence' => $FinalSentence,
            'slice_sentence' => $SliceSentence,
            'start_ms' => $StartMs,
            'end_ms' => $EndMs,
            'speech_speed' => $SpeechSpeed,
            'speaker_id' => $SpeakerId,
            'silence_time' => $SilenceTime,
            'words' => $Words,
            'emotional_energy' => $EmotionalEnergy,
            'emotion_type' => $EmotionType,
        );

        return $this;
    }

    /**
     * 构建词文本结构
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-30
     *
     * @param string $Word 词文本
     * @param integer $OffsetStartMs 在句子中的开始时间偏移量
     * @param integer $OffsetEndMs 在句子中的结束时间偏移量
     *
     * @return array
     */
    public function buildWordItem($Word, $OffsetStartMs, $OffsetEndMs)
    {
        return array(
            'word' => $Word,
            'offset_start_ms' => $OffsetStartMs,
            'offset_end_ms' => $OffsetEndMs,
        );
    }
}
