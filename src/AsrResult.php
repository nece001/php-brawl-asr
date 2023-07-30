<?php

namespace Nece\Brawl\Asr;

use Nece\Brawl\ResultAbstract;

/**
 * 语音识别结果
 *
 * @Author nece001@163.com
 * @DateTime 2023-07-30
 */
class AsrResult extends ResultAbstract
{
    private $text;
    private $duration;
    private $word_list = array();

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
            'text' => $this->text,
            'duration' => $this->duration,
            'word_list' => $this->word_list,
            'word_count' => $this->getWordCount(),
        );
    }

    /**
     * 获取识别结果文本
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * 识别结果文本
     *
     * @return self
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * 获取请求的音频时长，单位为ms
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * 设置请求的音频时长
     *
     * @return self
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * 获取词时间戳列表的长度
     */
    public function getWordCount()
    {
        return count($this->word_list);
    }

    /**
     * 获取词时间戳列表
     */
    public function getWordList()
    {
        return $this->word_list;
    }

    /**
     * 添加词时间戳列表
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-30
     *
     * @param string $word 词结果
     * @param integer $start_time 词在音频中的开始时间，单位为ms
     * @param integer $end_time 词在音频中的结束时间，单位为ms
     *
     * @return self
     */
    public function addWord($word, $start_time, $end_time)
    {
        $this->word_list[] = array(
            'word' => $word,
            'start_time' => $start_time,
            'end_time' => $end_time,
        );

        return $this;
    }
}
