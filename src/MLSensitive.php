<?php
/**
 * Name
 * Created by WML
 * Created on 2022/1/17
 */

function sensitive($list, $string){
//    $count = 0; //违规词的个数
    $sensitiveWord = '';  //违规词
    $stringAfter = $string;  //替换后的内容
    $pattern = "/".implode("|",$list)."/i"; //定义正则表达式
    if(preg_match_all($pattern, $string, $matches)){ //匹配到了结果
        $patternList = $matches[0];  //匹配到的数组
//        $count = count($patternList);
        $sensitiveWord = implode(',', $patternList); //敏感词数组转字符串
        $replaceArray = array_combine($patternList,array_fill(0,count($patternList),'*')); //把匹配到的数组进行合并，替换使用
        $stringAfter = strtr($string, $replaceArray); //结果替换
    }
    return [
        'old' => $string,
        'sensitive_word' => $sensitiveWord,
        'new' => $stringAfter
    ];
}
